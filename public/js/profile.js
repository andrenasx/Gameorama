const username = document.getElementById('username').innerText;

// Member Content
let more_posts = document.getElementById('more-posts');
let more_comments = document.getElementById('more-comments');
let more_bookmarks = document.getElementById('more-bookmarked');

window.onload = function () {
    loadContent('posts', more_posts);
    loadContent('comments', more_comments);
    more_posts.addEventListener('click', loadContent.bind(null, 'posts', more_posts));
    more_comments.addEventListener('click', loadContent.bind(null, 'comments', more_comments));
    if (more_bookmarks != null) {
        loadContent('bookmarked', more_bookmarks);
        more_bookmarks.addEventListener('click', loadContent.bind(null, 'bookmarked', more_bookmarks));
    }
}

function loadContent(content, button) {
    let page = button.dataset.page;
    const route = '/api/member/' + username + '/' + content + '/' + page;
    const data = {username: username, page: page};

    sendAjaxRequest('GET', route, data,
        (response) => {
            const data = JSON.parse(response);
            if (data.length < 15) {
                button.remove();
            }
            if (data.length === 0) return

            let new_div = document.createElement('div');
            new_div.innerHTML = data.join('');
            while (new_div.firstChild) {
                document.getElementById('member-' + content).appendChild(new_div.firstChild)
            }
            button.dataset.page = (parseInt(page) + 1).toString();
        },
        (response) => {
            console.error(response)
        }
    )
}


document.querySelector(".comments-section").addEventListener("click", function (event) {
    let classList = event.target.classList
    let profile_comment = event.target.closest("div.profile-comment")
    if ( profile_comment === null) return

    else if (classList.contains("delete-comment")) {
        let id_comment = profile_comment.getAttribute("data-id")
        const route = "/api/comment/" + id_comment
        sendAjaxRequest("DELETE", route, null, deleteComment.bind(profile_comment), loadError)
    }

    if (classList.contains("edit-comment")) {
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