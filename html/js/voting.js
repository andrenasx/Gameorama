let score = document.querySelector("#post-container #score")

let upvote = document.querySelector("#post-voting ul span:nth-child(1)")
let downvote = document.querySelector("#post-voting ul span:nth-child(3)")

function clearVotes() {
    console.log(upvote.outerHTML)
    console.log(downvote.outerHTML)
    document.querySelectorAll("#post-voting ul span.material-icons-round").forEach(element => {
        element.setAttribute("class", "material-icons-round d-flex justify-content-center")
    });
}


upvote.addEventListener("click", function(event){
    event.preventDefault();
    if (upvote.getAttribute("class") == "material-icons-round d-flex justify-content-center voted") {
        score.innerHTML = parseInt(score.innerHTML) - 1;
        upvote.style.color = "darkgray";
        upvote.setAttribute("class", "material-icons-round d-flex justify-content-center")
        return
    }
    
    score.innerHTML = parseInt(score.innerHTML) + 1;
    if (downvote.getAttribute("class") == "material-icons-round d-flex justify-content-center voted") score.innerHTML = parseInt(score.innerHTML) + 1;
    clearVotes()
    upvote.style.color = "rgb(251,116,45)";
    upvote.setAttribute("class", "material-icons-round d-flex justify-content-center voted")
    downvote.style.color = "darkgray"

})

downvote.addEventListener("click", function(event){
    event.preventDefault();
    if (downvote.getAttribute("class") == "material-icons-round d-flex justify-content-center voted") {
        score.innerHTML = parseInt(score.innerHTML) + 1;
        downvote.style.color = "darkgray";
        downvote.setAttribute("class", "material-icons-round d-flex justify-content-center")
        return
    }

    score.innerHTML = parseInt(score.innerHTML) - 1;
    if (upvote.getAttribute("class") == "material-icons-round d-flex justify-content-center voted") score.innerHTML = parseInt(score.innerHTML) - 1;
    clearVotes()
    downvote.style.color = "#353cee";
    downvote.setAttribute("class", "material-icons-round d-flex justify-content-center voted")
    upvote.style.color = "darkgray"

})