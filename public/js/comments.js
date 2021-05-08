const make_comment_button = document.querySelector("#make_comment_button")
const post_id = document.getElementById("new-comment-section").getAttribute("data-id");
const comment = document.getElementById("comment_content")

make_comment_button.addEventListener("click", function(event) {
    event.preventDefault()
    const content = {comment: comment.value}
    const route = "/api/post/" + post_id + "/comment"
    sendAjaxRequest("POST", route, content, loadComment, loadError)
    
})

function loadComment(response) {
    const json_data = JSON.parse(response)
    const comments_section = document.querySelector(".comments-section")
    comment.value = null;
    comments_section.innerHTML = json_data + comments_section.innerHTML
}

function loadError(response) {
    console.error(response);
}
