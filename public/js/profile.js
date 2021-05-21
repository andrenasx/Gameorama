const username = document.getElementById('username').innerText;

// Member Content
let postsTab = document.getElementById('pills-posts-tab');
let commentsTab = document.getElementById('pills-comments-tab');
let bookmarkedsTab = document.getElementById('pills-bookmarked-tab');
let contentSection = document.getElementById('content');
let spinner = document.getElementById('spinner');


let content = 'posts';
let page = 1;
let querying = false;


function start() {
    spinner.classList.remove('d-none');
    spinner.classList.add('d-flex');
    loadContent();
}

function reset(c) {
    content = c;
    page = 1;
    querying = true;
    contentSection.innerHTML = "";
    start(contentSection)
}

function removeSpinner() {
    spinner.classList.remove('d-flex');
    spinner.classList.add('d-none');
}

function loadContent() {
    querying = false;
    const route = '/api/member/' + username + '/' + content + '/' + page;
    const data = {username: username, page: page};

    sendAjaxRequest('GET', route, data,
        (response) => {
            const data = JSON.parse(response);

            if (page === 1 && data.length === 0) {
                removeSpinner();
                contentSection.innerHTML = "No content to show";
                return;
            }

            if (data.length < 15) {
                removeSpinner();
            }

            console.log(data.join(''))

            let new_div = document.createElement('div');
            new_div.innerHTML = data.join('');
            while (new_div.firstChild) {
                contentSection.appendChild(new_div.firstChild)
            }

            page += 1;
            querying = true;
        },
        (response) => {
            console.error(response)
        }
    )
}


postsTab.addEventListener('click', reset.bind(null, 'posts'));
commentsTab.addEventListener('click', reset.bind(null, 'comments'));
if (bookmarkedsTab != null) {
    bookmarkedsTab.addEventListener('click', reset.bind(null, 'bookmarked'));
}

start();

window.addEventListener('scroll', () => {
    const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

    if ((scrollTop + clientHeight >= scrollHeight - 800) && querying) {
        loadContent();
    }
}, {
    passive: true
});



document.querySelector(".comments-section").addEventListener("click", function (event) {
    let classList = event.target.classList
    let profile_comment = event.target.closest("div.profile-comment")
    console.log(profile_comment)

    if (classList.contains("upvote")) {
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
