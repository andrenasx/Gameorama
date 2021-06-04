document.querySelector(".comments-section").addEventListener("click", function (event) {
    let classList = event.target.classList
    let profile_comment = event.target.closest("div.profile-comment")

    if (classList.contains("upvote")) {
        if (profile_comment === null) return
        let id_comment = event.target.closest(".comment-voting").getAttribute("data-id")
        const route = "/api/comment/" + id_comment + "/vote"
        sendAjaxRequest("POST", route, {vote: true}, upvoteResponse.bind(event.target.closest(".comment-voting")), loadError)
    }

    else if (classList.contains("downvote")) {
        if (profile_comment === null) return
        let id_comment = event.target.closest(".comment-voting").getAttribute("data-id")
        const route = "/api/comment/" + id_comment + "/vote"

        sendAjaxRequest("POST", route, {vote: false}, downvoteResponse.bind(event.target.closest(".comment-voting")), loadError)
    }

    else if (classList.contains("delete-comment")) {
        let id_comment = profile_comment.getAttribute("data-id")
        const route = "/api/comment/" + id_comment
        sendAjaxRequest("DELETE", route, null, deleteComment.bind(profile_comment), loadError)
    }

    else if (classList.contains("edit-comment")) {
        let textarea = profile_comment.querySelector(".edit-textarea")
        profile_comment.querySelector(".dropdown-menu").hidden = true
        profile_comment.querySelector(".edit_button").hidden = false
        profile_comment.querySelector(".cancel_button").hidden = false
        textarea.hidden = false
        textarea.focus()
        profile_comment.querySelector(".comment_body").hidden = true
    }

    else if (classList.contains("cancel_button")) {
        let textarea = profile_comment.querySelector(".edit-textarea")
        profile_comment.querySelector(".dropdown-menu").hidden = false
        profile_comment.querySelector(".edit_button").hidden = true
        profile_comment.querySelector(".cancel_button").hidden = true
        textarea.hidden = true
        profile_comment.querySelector(".comment_body").hidden = false
    }

    else if (classList.contains("edit_button")) {
        let comment_card = event.target.closest("div.profile-comment")
        let textarea = profile_comment.querySelector(".edit-textarea")
        let id_comment = event.target.closest(".edit_button_div").getAttribute("data-id")
        const route = "/api/comment/" + id_comment

        sendAjaxRequest("PATCH", route, {body: textarea.value}, editComment.bind(comment_card), loadError)
    }
})


function deleteComment() {
    let parent = this.parentNode
    parent.removeChild(this)
    createToast("Successfully deleted comment", true)
}

function editComment(response) {
    let json_data = JSON.parse(response)
    let textarea = this.querySelector(".edit-textarea")
    this.querySelector(".dropdown-menu").hidden = false
    this.querySelector(".edit_button").hidden = true
    this.querySelector(".cancel_button").hidden = true
    textarea.hidden = true
    this.querySelector(".comment_body").hidden = false
    this.querySelector(".comment_body").innerText = json_data['body']

}
