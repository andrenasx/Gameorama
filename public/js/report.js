const make_report_button = document.querySelector("#reportPost")
const post_id = document.getElementById("new-comment-section").getAttribute("data-id");
const report = document.getElementById("comment_content")

make_report_button.addEventListener("click", function(event) {
    event.preventDefault()
    const content = {comment: comment.value}
    const route = "/api/post/" + post_id + "/report"
    sendAjaxRequest("POST", route, content, loadComment, loadError)
    
})

function loadComment(response) {
    const json_data = JSON.parse(response)
    const report = document.querySelector(".comments-section")
   
}

function loadError(response) {
    console.error(response);
}
