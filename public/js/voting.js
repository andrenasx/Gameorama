let post_voting_list = document.querySelectorAll(".post-voting");
post_voting_list.forEach(post_voting => {
    
    let score = post_voting.querySelector(".score")
    let upvote = post_voting.querySelector(".upvote")
    let downvote = post_voting.querySelector(".downvote")
    const id_post = post_voting.getAttribute("data-id")
    const route = "/api/post/" + id_post + "/vote"
    
    let request = {};
    upvote.addEventListener("click", function (event) {
        event.preventDefault();
        
        request = {vote: true}

        sendAjaxRequest("POST", route, request, (response)=>{
            console.log(response)
            const json_data = JSON.parse(response)
            const aura = json_data['votes']
            
            if (upvote.classList.contains("voted")) {
                upvote.classList.remove("voted");
                upvote.style.color = "darkgray"
            }
    
            else {
                if (downvote.classList.contains("voted")) {
                    downvote.classList.remove("voted");
                    downvote.style.color = "darkgray"
                }

                upvote.style.color = "rgb(251,116,45)"
                upvote.classList.add("voted");
            }
            score.innerHTML = aura
        }, loadError)
    })

    downvote.addEventListener("click", function (event) {
        event.preventDefault();
        request = {vote: false}

        sendAjaxRequest("POST", route, request, (response)=>{
            const json_data = JSON.parse(response)
            const aura = json_data['votes']

            if (downvote.classList.contains("voted")) {
                downvote.classList.remove("voted");
                downvote.style.color = "darkgray"
            }
    
            else {
                if (upvote.classList.contains("voted")) {
                    upvote.classList.remove("voted");
                    upvote.style.color = "darkgray"
                }
                downvote.style.color = "#353cee"
                downvote.classList.add("voted");
            }
            score.innerHTML = aura
        }, loadError)
    })
});


function loadError(response) {
    console.error(response)
}