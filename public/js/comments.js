//*comments
const make_comment_button = document.querySelector("#make_comment_button")
let post_id = -1
if (document.getElementById("new-comment-section") !== null)
    post_id = document.getElementById("new-comment-section").getAttribute("data-id");
const comment = document.getElementById("comment_content")

//*replies
let comment_id = null

if (make_comment_button != null) {
    make_comment_button.addEventListener("click", function(event) {
        event.preventDefault()
        const content = {comment: comment.value}
        const route = "/api/post/" + post_id + "/comment"
        sendAjaxRequest("POST", route, content, loadComment, loadError)
        
    })
}


function loadComment(response) {
    const json_data = JSON.parse(response)
    const comments_section = document.querySelector(".comments-section")
    comment.value = null;
    comments_section.innerHTML = json_data + comments_section.innerHTML
}

function loadError(response) {
    console.error(response);
}


document.querySelector(".comments-section").addEventListener("click", function (event) {
    let classList = event.target.classList
    if (classList.contains("reply-comment-button")) {
        comment_id = event.target.getAttribute("data-id")
    }

    else if (classList.contains("reply-button")) {
        event.preventDefault()
        let form = event.target.closest("form")
        const reply_content = form.querySelector(".inputOldPass").value
        document.querySelector(".dismiss-modal").click()
        const route = "/api/post/" + post_id + "/comment/" + comment_id + "/reply"
        sendAjaxRequest("POST", route , {comment: reply_content}, loadReply, loadError)
    }

    else if (classList.contains("upvote")) {
        let id_comment = event.target.closest(".comment-voting").getAttribute("data-id")
        const route = "/api/comment/" + id_comment + "/vote"

        sendAjaxRequest("POST", route, {vote: true}, upvoteResponse.bind(event.target.closest(".comment-voting")), loadError)
    }

    else if (classList.contains("downvote")) {
        let id_comment = event.target.closest(".comment-voting").getAttribute("data-id")
        const route = "/api/comment/" + id_comment + "/vote"

        sendAjaxRequest("POST", route, {vote: false}, downvoteResponse.bind(event.target.closest(".comment-voting")), loadError)
    }

    else if (classList.contains("delete-comment")) {
        console.log(event.target)
        let id_comment = event.target.closest(".comment_options").getAttribute("data-id")
        console.log(id_comment)
        const route = "/api/comment/" + id_comment
        sendAjaxRequest("DELETE", route, null, loadReply, loadError)
    }
})


function loadReply(response) {
    const data = JSON.parse(response)
    const html_comment = data['html']
    //console.log(html_comment)
    let comment_element = document.querySelector(".comments-section")
    comment_element.innerHTML = ""
    for (let i = 0; i < html_comment.length; i++)
        comment_element.innerHTML += html_comment[i]
}

