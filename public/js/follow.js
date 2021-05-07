let follow_list = document.querySelectorAll(".follow-button");
let following_list = document.querySelectorAll(".following-button");
console.log(follow_list)
console.log(following_list)
follow_list.forEach(follow => {
    const username_follow_button = follow.getAttribute("data-id")
    const route = "/api/member/" + username_follow_button + "/follow"
    let request = {};
    follow.addEventListener("click", function (event) {
        event.preventDefault();
        console.log("HERE")
        request = {username: username_follow_button}

        sendAjaxRequest("POST", route, request, ()=>{
            if (follow.classList.contains("follow-button")) {
                follow.classList.remove("follow-button");
                follow.classList.add("following-button");
                return
            }
        }, loadError)
    })
});

following_list.forEach(following => {
    const username_following_button = following.getAttribute("data-id")
    const route = "/api/member/" + username_following_button + "/follow"
    let request = {};
    following.addEventListener("click", function (event) {
        event.preventDefault();
        
        request = {username: username_following_button}

        sendAjaxRequest("POST", route, request, ()=>{
            if (following.classList.contains("following-button")) {
                following.classList.remove("following-button");
                following.classList.add("follow-button");
                return
            }
        }, loadError)
    })
});


function loadError(response) {
    console.error(response)
}