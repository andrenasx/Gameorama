document.querySelector(".modal-notifications").addEventListener("click", function(event) {
    handleNotificationsClick();
});

document.querySelector(".notifications-body").addEventListener("click", function(event) {
        let classList = event.target.classList
        if (classList.contains("delete-notification-button")) {
            deleteNotification(event.target)
        }
});


function handleNotificationsClick(){
    const route = "/api/notifications";
    let request = {};
    sendAjaxRequest("GET", route, request, (response) => {
        const json_data = JSON.parse(response);
        let modal_notifications = document.querySelector(".notifications-body");
        modal_notifications.innerHTML = "";
        json_data.forEach((element) => {
            modal_notifications.innerHTML += element;
        })
        if (modal_notifications.innerHTML.trim() === ""){
            modal_notifications.innerHTML = "<div class=\"text-center\">Looks like there's nothing new yet!</div>";
        }
        else{
            readUnreadNotifications();
        }

    }, loadError);
}



function readUnreadNotifications(){
    const route = "/api/notifications/read";
    let request = {};
    sendAjaxRequest("PATCH", route, request, (response) => {
        const json_data = JSON.parse(response);
        let number_notifications = document.querySelector(".badge-notification");
        number_notifications.innerHTML = json_data;
    }, loadError);
}


function deleteNotification(button){
    const notification_id = button.getAttribute("data-id");
    const route = "/api/notification/" + notification_id + "/delete";
    let request = {};
    sendAjaxRequest("DELETE", route, request, (response) => {
        const json_data = JSON.parse(response);
        let cards = document.querySelectorAll(".delete-notification-button");

        cards.forEach((element) => {
           if (element.getAttribute("data-id") == json_data){
               element.closest(".card").remove();
           }
        });
        console.log(document.querySelector(".notifications-body").innerHTML)
        if (document.querySelector(".notifications-body").innerHTML.trim() === ""){
            document.querySelector(".notifications-body").innerHTML = "<div class=\"text-center\">Looks like there's nothing new yet!</div>";
        }
    });

}
