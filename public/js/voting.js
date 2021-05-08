let post_voting_list = document.querySelectorAll(".post-voting");

post_voting_list.forEach(post_voting => {
    let score = post_voting.querySelector(".score")
    let upvote = post_voting.querySelector(".upvote")
    let downvote = post_voting.querySelector(".downvote")

    upvote.addEventListener("click", function (event) {
        event.preventDefault();
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
    })

    downvote.addEventListener("click", function (event) {
        event.preventDefault();
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
    })
});