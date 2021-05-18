let follow_list = document.querySelectorAll(".member-follow-button");
follow_list.forEach(follow => {
    follow.addEventListener("click", memberFollowHandler);
});


function memberFollowHandler() {
    const username_follow_button = this.getAttribute("data-id");
    let follower_count = document.querySelector(".button-followers");
    let following_count = document.querySelector(".button-following");

    const route = "/api/member/" + username_follow_button + "/follow";
    let request = {};
    request = { username: username_follow_button, userProfile: follower_count.getAttribute("data-id")};
    sendAjaxRequest("POST", route, request, (response) => {
        const json_data = JSON.parse(response);
        const following = json_data['following'];
        const followers = json_data['followers'];
        const htmlFollowing = json_data['htmlFollowing'];
        const htmlFollowers = json_data['htmlFollowers'];
        

        if (this.classList.contains("follow-button")) {
            this.classList.remove("follow-button");
            this.classList.add("following-button");
        }
        else {
            this.classList.remove("following-button");
            this.classList.add("follow-button");
        }

        let modal_follower = document.querySelector(".container-follower");
        let modal_following = document.querySelector(".container-following");
        following_count.innerHTML = following + " Following";
        follower_count.innerHTML = followers + " Followers";
        modal_follower.innerHTML = '';
        modal_following.innerHTML = '';
        htmlFollowing.forEach(element => {
            modal_following.innerHTML += element;
        });
        htmlFollowers.forEach(element => {
            modal_follower.innerHTML += element;
        });
        


        follow_list = document.querySelectorAll(".member-follow-button");
        follow_list.forEach(follow => {
            follow.addEventListener("click", memberFollowHandler);
        });
    }, loadError);
}

function loadError(response) {
    console.error(response)
}