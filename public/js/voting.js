let post_voting_list = document.querySelectorAll(".post-voting");
console.log(post_voting_list)
post_voting_list.forEach(post_voting => {
    
    let score = post_voting.querySelector(".score")
    let upvote = post_voting.querySelector(".upvote")
    let downvote = post_voting.querySelector(".downvote")
    const id_post = upvote.getAttribute("data-id")
    const route = "/api/post/" + id_post + "/vote"
    console.log(id_post)
    let request = {};
    upvote.addEventListener("click", function (event) {
        event.preventDefault();
        
        request = {vote: true}
        
        if (upvote.classList.contains("voted")) {
            score.innerHTML = parseInt(score.innerHTML)-1;
            upvote.style.color = "darkgray";
            upvote.classList.remove("voted");
            return
        }

        else {
            if (downvote.classList.contains("voted")) {
                score.innerHTML = parseInt(score.innerHTML)+2;
                downvote.style.color = "darkgray"
                downvote.classList.remove("voted");
            }
            else {
                score.innerHTML = parseInt(score.innerHTML)+1;
            }

            upvote.style.color = "rgb(251,116,45)";
            upvote.classList.add("voted");
        }
        sendAjaxRequest("POST", route, request, ()=>{}, loadError)
    })

    downvote.addEventListener("click", function (event) {
        event.preventDefault();
        request = {vote: "false"}
        if (downvote.classList.contains("voted")) {
            score.innerHTML = parseInt(score.innerHTML)+1;
            downvote.style.color = "darkgray";
            downvote.classList.remove("voted");
            return
        }

        else {
            if (upvote.classList.contains("voted")) {
                score.innerHTML = parseInt(score.innerHTML)-2;
                upvote.style.color = "darkgray"
                upvote.classList.remove("voted");
            }
            else {
                score.innerHTML = parseInt(score.innerHTML)-1;
            }

            downvote.style.color = "#353cee";
            downvote.classList.add("voted");
        }
        sendAjaxRequest("POST", route, request, ()=>{}, loadError)
    })
});


function loadError(response) {
    console.error(response)
}