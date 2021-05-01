// Change email
let change_email_form = document.getElementById('change-email');
change_email_form.addEventListener('submit', submitNewEmail);

function submitNewEmail(event) {
    event.preventDefault();

    let input_new_email = change_email_form.inputNewEmail;
    let input_conf_email = change_email_form.inputConfEmail;
    let input_pass = change_email_form.inputPass;
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
