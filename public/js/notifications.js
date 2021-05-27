document.querySelector("#notifications-button").addEventListener("click", function(event) {
    handleNotificationsClick();

});



function handleNotificationsClick(){
    const route = "/api/notifications";
    let request = {};
    sendAjaxRequest("GET", route, request, (response) => {
        // console.log(response);
        const json_data = JSON.parse(response)["html"];
        let modal_notifications = document.querySelector(".notifications-body");
        console.log(modal_notifications);
        
    }, loadError);
}
