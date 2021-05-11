document.querySelector("#topics").addEventListener("click", function(event) {
    let classList = event.target.classList
    if (classList.contains("topic-follow-button")) {
        topicSearchFollowHandler(event.target)
    }
})

document.querySelector("#members").addEventListener("click", function(event) {
    let classList = event.target.classList
    if (classList.contains("member-follow-button")) {
        memberSearchFollowHandler(event.target)
    }
})



function topicSearchFollowHandler(button) {
    console.log(button)
    const topic_follow_button = button.getAttribute("data-id");
    const route = '/api/topic/' + topic_follow_button + '/follow';
    let request = {};
    let sent = -1;

    request = {userProfile: sent};

    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers']

        if (button.classList.contains("follow-button")) {
            button.classList.remove("follow-button");
            button.classList.add("following-button");
        }
        else {
            button.classList.remove("following-button");
            button.classList.add("follow-button");
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
    let follower_count = "-1";

    const route = "/api/member/" + username_follow_button + "/follow";
    let request = {};
    request = { username: username_follow_button, userProfile: follower_count};

    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers'];
        const auraScore = json_data['auraScore'];

        if (button.classList.contains("follow-button")) {
            button.classList.remove("follow-button");
            button.classList.add("following-button");
        }
        else {
            button.classList.remove("following-button");
            button.classList.add("follow-button");
        }

        let member_followers = document.querySelectorAll("#member_followers")

        member_followers.forEach(follower_indicator => {
            if (follower_indicator.getAttribute("data-id") == username_follow_button){
                follower_indicator.innerHTML = followers + " Followers";
            }
        })
    }, loadError);
}


function loadError(response) {
    console.error(response)
}