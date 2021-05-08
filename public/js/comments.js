//*comments
const make_comment_button = document.querySelector("#make_comment_button")
const post_id = document.getElementById("new-comment-section").getAttribute("data-id");
const comment = document.getElementById("comment_content")

//*replies
const replies = Array.from(document.querySelectorAll(".reply-fade"))
let comment_id = null


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


document.querySelectorAll(".reply-comment-button").forEach(button => {
    button.addEventListener("click", function(event) {
        event.preventDefault()
        comment_id = button.getAttribute("data-id")
    })
})


replies.forEach(reply => {
    let reply_button = reply.querySelector(".reply-button")

    reply_button.addEventListener("click", function (event) {
        event.preventDefault()
        console.log(this)
        const reply_content = reply.querySelector(".inputOldPass").value

        const route = "/api/post/" + post_id + "/comment/" + comment_id + "/reply"
        sendAjaxRequest("POST", route , {comment: reply_content}, loadReply, loadError)
    })
})


function loadReply(response) {
    const data = JSON.parse(response)
    const html_comment = data['html']
    const parent_id = data['parent_comment_id']
    console.log(parent_id)
    let comment_element = document.querySelector(".comment-" + parent_id)
    console.log(comment_element)
    comment_element.innerHTML = html_comment
}

