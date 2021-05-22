document.querySelectorAll(".container-topic").forEach((element) => {
    element.addEventListener("click", function(event) {
        let classList = event.target.classList
        if (classList.contains("follow-button")) {
            topicFollowHandler(event.target)
        }

        if (classList.contains("following-button")) {
            topicUnfollowHandler(event.target)
        }
    });

});

let topic_info_page = document.querySelector("#topic-info")
if (topic_info_page != null){
    topic_info_page.addEventListener("click", function(event) {
        let classList = event.target.classList
        if (classList.contains("follow-button")) {
            topicFollowHandler(event.target)
        }
    
        if (classList.contains("following-button")) {
            topicUnfollowHandler(event.target)
        }
    });
}


function topicFollowHandler(button) {
    const topic_follow_button = button.getAttribute("data-id");
    let followed_topics_count= document.querySelector(".button-topics");
    const route = '/api/topic/' + topic_follow_button + '/follow';
    
    if (followed_topics_count != null){
        request = {userProfile: followed_topics_count.getAttribute("data-id")};
    }
    else{
        request = {userProfile: null};
    }

    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers']
        const followedTopics = json_data['followedTopics']

        if (button.classList.contains("follow-button")) {
            button.classList.remove("follow-button");
            button.classList.add("following-button");
        }

        document.querySelectorAll("#topic_followers").forEach((element) => {
            if (element.getAttribute("data_id") == topic_follow_button){
                element.innerHTML = followers + " Followers";
            }
        });

        if (followed_topics_count != null){
            followed_topics_count.innerHTML = followedTopics + " Followed Topics";
        }
    }, loadError);
}

function topicUnfollowHandler(button) {
    const topic_follow_button = button.getAttribute("data-id");
    let followed_topics_count= document.querySelector(".button-topics");
    const route = '/api/topic/' + topic_follow_button + '/follow';
    
    if (followed_topics_count != null){
        request = {userProfile: followed_topics_count.getAttribute("data-id")};
    }
    else{
        request = {userProfile: null};
    }
    
    sendAjaxRequest("DELETE", route, request, (response) => {
        const json_data = JSON.parse(response);
        const followers = json_data['followers']
        const followedTopics = json_data['followedTopics']

        if (button.classList.contains("following-button")) {
            button.classList.remove("following-button");
            button.classList.add("follow-button");
        }

        document.querySelectorAll("#topic_followers").forEach((element) => {
            if (element.getAttribute("data_id") == topic_follow_button){
                element.innerHTML = followers + " Followers";
            }
        });

        if (followed_topics_count != null){
            followed_topics_count.innerHTML = followedTopics + " Followed Topics";
        }
    }, loadError);
}

function loadError(response) {
    console.error(response)
}