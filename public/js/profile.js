const username = document.getElementById('username').innerText;

// Member Content
let more_posts = document.getElementById('more-posts');
let more_comments = document.getElementById('more-comments');
let more_bookmarks = document.getElementById('more-bookmarked');
const bookmarks = more_bookmarks != null;

console.log(more_bookmarks)

window.onload = function () {
    loadContent('posts', more_posts);
    more_posts.addEventListener('click', loadContent.bind(null, 'posts', more_posts));
    loadContent('comments', more_comments);
    more_comments.addEventListener('click', loadContent.bind(null, 'comments', more_comments));
    if (bookmarks) {
        loadContent('bookmarked', more_bookmarks);
        more_bookmarks.addEventListener('click', loadContent.bind(null, 'bookmarked', more_bookmarks));
    }
}

function loadContent(content, button) {;
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
