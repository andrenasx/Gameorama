let follow_topic_list = document.querySelectorAll(".topic-follow-button");
console.log(follow_topic_list);
follow_topic_list.forEach(follow_topic => {
    follow_topic.addEventListener("click", topicFollowHandler);
});

function topicFollowHandler() {
    const topic_follow_button = this.getAttribute("data-id");
    let followed_topics_count= document.querySelector(".button-topics");
    console.log("HERE")
    const route = '/api/topic/' + topic_follow_button + '/follow';
    let request = {};
    let sent;

    if (followed_topics_count == null){
        sent = "-1";
    }
    else{
        sent = followed_topics_count.getAttribute("data-id");
    }

    request = {userProfile: sent};

    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const htmlFollowedTopics = json_data['htmlFollowedTopics'];
        const followers = json_data['followers']
        const followedTopics = json_data['followedTopics']

        if (this.classList.contains("follow-button")) {
            this.classList.remove("follow-button");
            this.classList.add("following-button");
        }
        else {
            this.classList.remove("following-button");
            this.classList.add("follow-button");
        }

        if (followed_topics_count == null){
            let topic_followers = document.querySelector("#topic_followers")
            topic_followers.innerHTML = followers + " Followers";
        }
        else{
            let modal_followed_topics = document.querySelector(".container-topic");
            modal_followed_topics.innerHTML = '';
            htmlFollowedTopics.forEach(element => {
                modal_followed_topics.innerHTML += element;
            });
            followed_topics_count.innerHTML = followedTopics + " Followed Topics"
        }
        
        
        follow_topic_list = document.querySelectorAll(".topic-follow-button");
        console.log(follow_topic_list);
        follow_topic_list.forEach(follow_topic => {
            follow_topic.addEventListener("click", topicFollowHandler);
        });
    }, loadError);
}

function loadError(response) {
    console.error(response)
}