document.querySelectorAll(".container-member").forEach((element) => {
    element.addEventListener("click", function(event) {
        let classList = event.target.classList
        if (classList.contains("follow-button")) {
            memberFollowHandler(event.target)
        }

        if (classList.contains("following-button")) {
            memberUnfollowHandler(event.target)
        }
    });

});

document.querySelectorAll(".details").forEach((element) => {
    element.addEventListener("click", function(event) {
        let classList = event.target.classList
        if (classList.contains("follow-button")) {
            memberFollowHandler(event.target)
        }

        if (classList.contains("following-button")) {
            memberUnfollowHandler(event.target)
        }
    });
});

document.querySelectorAll(".follow_stats").forEach((element) => {
    element.addEventListener("click", function(event) {
        let classList = event.target.classList
        if (classList.contains("button-followers")) {
            handleFollowersClick(event.target)
        }

        if (classList.contains("button-following")) {
            handleFollowingClick(event.target)
        }

        if (classList.contains("button-topics")) {
            handleFollowedTopicsClick(event.target)
        }
    });

});


function memberFollowHandler(button) {
    const username_follow_button = button.getAttribute("data-id");
    let follower_count = document.querySelector(".button-followers");
    let following_count = document.querySelector(".button-following");

    const route = "/api/member/" + username_follow_button + "/follow";
    let request = {};
    request = {userProfile: follower_count.getAttribute("data-id")};
    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const following = json_data['following'];
        const followers = json_data['followers'];
        createToast("Successfully followed " + username_follow_button, true)

        if (button.classList.contains("follow-button")) {
            button.classList.remove("follow-button");
            button.classList.add("following-button");
        }

        follower_count.innerHTML = followers + " Followers";
        following_count.innerHTML = following + " Following";
    }, loadError);
}

function memberUnfollowHandler(button) {
    const username_follow_button = button.getAttribute("data-id");
    let follower_count = document.querySelector(".button-followers");
    let following_count = document.querySelector(".button-following");

    const route = "/api/member/" + username_follow_button + "/follow";
    let request = {userProfile: follower_count.getAttribute("data-id")};
    sendAjaxRequest("DELETE", route, request, (response) => {
        const json_data = JSON.parse(response);
        const following = json_data['following'];
        const followers = json_data['followers'];


        if (button.classList.contains("following-button")) {
            button.classList.remove("following-button");
            button.classList.add("follow-button");
        }

        follower_count.innerHTML = followers + " Followers";
        following_count.innerHTML = following + " Following";
    }, loadError);
}

function handleFollowingClick(button){
    const route = "/api/member/" + button.getAttribute("data-id") + "/following";
    let request = {};
    sendAjaxRequest("GET", route, request, (response) => {
        const json_data = JSON.parse(response)
        let modal_following = document.querySelector(".container-following");
        let htmlFollowing = json_data;
        modal_following.innerHTML = '';
        htmlFollowing.forEach(element => {
            modal_following.innerHTML += element;
        });
    })
}


function handleFollowersClick(button){
    const route = "/api/member/" + button.getAttribute("data-id") + "/followers";
    let request = {};
    sendAjaxRequest("GET", route, request, (response) => {
        const json_data = JSON.parse(response)
        let modal_follower = document.querySelector(".container-follower");
        let htmlFollowers = json_data;
        modal_follower.innerHTML = '';
        htmlFollowers.forEach(element => {
            modal_follower.innerHTML += element;
        });
    })
}

function handleFollowedTopicsClick(button){
    const route = "/api/member/" + button.getAttribute("data-id") + "/followedTopics";
    let request = {};
    sendAjaxRequest("GET", route, request, (response) => {
        const json_data = JSON.parse(response)
        let modal_followedTopics = document.querySelector(".container-topic");
        let htmlFollowedTopics = json_data;
        modal_followedTopics.innerHTML = '';
        htmlFollowedTopics.forEach(element => {
            modal_followedTopics.innerHTML += element;
        });
    })
}
