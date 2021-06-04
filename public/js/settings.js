// Reset Modal's forms
let modals = document.querySelectorAll('.modal');
for (let modal of modals) {
    modal.addEventListener('hidden.bs.modal', clearModalForm.bind(null, modal.querySelector('form')))
}

function clearModalForm(form) {
    form.reset();
    let inputs = form.querySelectorAll('input');
    for (let input of inputs) {
        input.classList.remove("is-valid");
        input.classList.remove("is-invalid");
    }
}


// Change email
let change_email_form = document.getElementById('change-email');
change_email_form.addEventListener('submit', submitNewEmail);

function submitNewEmail(event) {
    event.preventDefault();

    let input_new_email = change_email_form.inputNewEmail;
    let input_conf_email = change_email_form.inputConfEmail;
    let input_pass = change_email_form.inputPass;

    if (input_new_email.value !== input_conf_email.value) {
        change_email_form.getElementsByClassName("error-email_confirmation")[0].innerHTML = "The email confirmation and email must match.";
        input_conf_email.classList.remove("is-valid");
        input_conf_email.classList.add("is-invalid");
        return;
    }

    let inputMap = new Map();
    inputMap.set("email", input_new_email);
    inputMap.set("email_confirmation", input_conf_email);
    inputMap.set("password", input_pass);

    const route = '/api/change_email';
    const data = {_method: 'PATCH', email: input_new_email.value, email_confirmation: input_conf_email.value, password: input_pass.value};
    sendAjaxRequest('PATCH', route, data,
        () => {
            document.getElementById('member-email').innerHTML = input_new_email.value;

            // Reset modal and close
            input_new_email.value = "";
            input_conf_email.value = "";
            input_pass.value = "";
            let modal = document.getElementById('staticBackdropEmail');
            bootstrap.Modal.getInstance(modal).hide();
            createToast("Successfully changed email",true);
        },
        (response) => {
            const errorMap = new Map(Object.entries(JSON.parse(response)));
            for (const [key, value] of inputMap) {
                let error = errorMap.get(key);
                if (error != null) {
                    change_email_form.getElementsByClassName("error-" + key)[0].innerHTML = error;
                    inputMap.get(key).classList.remove("is-valid");
                    inputMap.get(key).classList.add("is-invalid");
                }
                else {
                    change_email_form.getElementsByClassName("error-" + key)[0].innerHTML = "";
                    inputMap.get(key).classList.remove("is-invalid");
                    inputMap.get(key).classList.add("is-valid");
                }
            }
        }
    )
}


// Change password
let change_pass_form = document.getElementById('change-password');
change_pass_form.addEventListener('submit', submitNewPassword);

function submitNewPassword(event) {
    event.preventDefault();

    let input_old_password = document.getElementById('inputOldPass');
    let input_new_password = document.getElementById('inputNewPass');
    let input_conf_password = document.getElementById('inputConfPass');

    if (input_new_password.value !== input_conf_password.value) {
        change_pass_form.getElementsByClassName("error-new_password_confirmation")[0].innerHTML = "The password confirmation and password must match.";
        input_conf_password.classList.remove("is-valid");
        input_conf_password.classList.add("is-invalid");
        return;
    }

    let inputMap = new Map();
    inputMap.set("old_password", input_old_password);
    inputMap.set("new_password", input_new_password);
    inputMap.set("new_password_confirmation", input_conf_password);

    const route = '/api/change_password';
    const data = {_method: 'PATCH', old_password: input_old_password.value, new_password: input_new_password.value, new_password_confirmation: input_conf_password.value};
    sendAjaxRequest('PATCH', route, data,
        () => {
            // Reset modal and close
            input_old_password.value = "";
            input_new_password.value = "";
            input_conf_password.value = "";
            let modal = document.getElementById('staticBackdropPassword');
            bootstrap.Modal.getInstance(modal).hide();
            createToast("Successfully changed password",true);
        },
        (response) => {
            const errorMap = new Map(Object.entries(JSON.parse(response)));
            for (const [key, value] of inputMap) {
                let error = errorMap.get(key);
                if (error != null) {
                    change_pass_form.getElementsByClassName("error-" + key)[0].innerHTML = error;
                    inputMap.get(key).classList.remove("is-valid");
                    inputMap.get(key).classList.add("is-invalid");
                }
                else {
                    change_pass_form.getElementsByClassName("error-" + key)[0].innerHTML = "";
                    inputMap.get(key).classList.remove("is-invalid");
                    inputMap.get(key).classList.add("is-valid");
                }
            }
        }
    )
}


// Delete account
let delete_acc_form = document.getElementById('delete-acc');
delete_acc_form.addEventListener('submit', deleteAccount);

function deleteAccount(event) {
    event.preventDefault();

    let input_password = document.getElementById('inputDeleteAccount');
    let user_name = delete_acc_form.getAttribute('data-username');

    const route = '/api/member/' + user_name;
    const data = {password: input_password.value};
    sendAjaxRequest('DELETE', route, data,
        () => {
            location.href = '/home';
        },
        (response) => {
            const error = JSON.parse(response);
            if (error != null) {
                delete_acc_form.getElementsByClassName("error-password")[0].innerHTML = error;
                input_password.classList.remove("is-valid");
                input_password.classList.add("is-invalid");
            }
            else {
                delete_acc_form.getElementsByClassName("error-password")[0].innerHTML = "";
                input_password.classList.remove("is-invalid");
                input_password.classList.add("is-valid");
            }
        }
    )
}
