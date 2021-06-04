document.querySelector("#content").addEventListener("click", function(event) {
    let classList = event.target.classList
    if (classList.contains("member-follow-button")) {
        memberSearchFollowHandler(event.target)
    }

    if (classList.contains("member-following-button")) {
        memberSearchUnfollowHandler(event.target)
    }

    if (classList.contains("topic-follow-button")) {
        topicSearchFollowHandler(event.target)
    }

    if (classList.contains("topic-following-button")) {
        topicSearchUnfollowHandler(event.target)
    }
})



function topicSearchFollowHandler(button) {
    const topic_follow_button = button.getAttribute("data-id");
    const route = '/api/topic/' + topic_follow_button + '/follow';
    let request = {};

    request = {userProfile: null};

    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers']

        if (button.classList.contains("topic-follow-button")) {
            button.classList.remove("follow-button");
            button.classList.remove("topic-follow-button");
            button.classList.add("following-button");
            button.classList.add("topic-following-button");
        }

        let topic_followers = document.querySelectorAll("#topic_followers")

        topic_followers.forEach(follower_indicator => {
            if (follower_indicator.getAttribute("data-id") == topic_follow_button){
                follower_indicator.innerHTML = followers + " Followers";
            }
        })
    }, loadError);
}

function topicSearchUnfollowHandler(button) {
    const topic_follow_button = button.getAttribute("data-id");
    const route = '/api/topic/' + topic_follow_button + '/follow';
    let request = {};

    request = {userProfile: null};

    sendAjaxRequest("DELETE", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers']

        if (button.classList.contains("topic-following-button")) {
            button.classList.remove("following-button");
            button.classList.remove("topic-following-button");
            button.classList.add("follow-button");
            button.classList.add("topic-follow-button");
        }

        let topic_followers = document.querySelectorAll("#topic_followers")

        topic_followers.forEach(follower_indicator => {
            if (follower_indicator.getAttribute("data-id") == topic_follow_button){
                follower_indicator.innerHTML = followers + " Followers";
            }
        })
    }, loadError);
}


function memberSearchFollowHandler(button) {
    const username_follow_button = button.getAttribute("data-id");
    const member_id = document.querySelector("#member-name-search").getAttribute("data-id")
    const route = "/api/member/" + username_follow_button + "/follow";
    let request = {};
    request = {userProfile: member_id};

    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers'];

        if (button.classList.contains("member-follow-button")) {
            button.classList.remove("member-follow-button");
            button.classList.remove("follow-button");
            button.classList.add("member-following-button");
            button.classList.add("following-button");
        }

        let member_followers = document.querySelectorAll("#member_followers")

        member_followers.forEach(follower_indicator => {
            if (follower_indicator.getAttribute("data-id") == username_follow_button){
                follower_indicator.innerHTML = followers + " Followers";
            }
        })
    }, loadError);
}

function memberSearchUnfollowHandler(button) {
    const username_follow_button = button.getAttribute("data-id");
    const member_id = document.querySelector("#member-name-search").getAttribute("data-id")
    const route = "/api/member/" + username_follow_button + "/follow";
    let request = {};
    request = {userProfile: member_id};

    sendAjaxRequest("DELETE", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers'];

        if (button.classList.contains("member-following-button")) {
            button.classList.remove("member-following-button");
            button.classList.remove("following-button");
            button.classList.add("member-follow-button");
            button.classList.add("follow-button")
        }

        let member_followers = document.querySelectorAll("#member_followers")

        member_followers.forEach(follower_indicator => {
            if (follower_indicator.getAttribute("data-id") == username_follow_button){
                follower_indicator.innerHTML = followers + " Followers";
            }
        })
    }, loadError);
}
