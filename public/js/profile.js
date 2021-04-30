const username = document.getElementById('username').innerText;

// Member's posts
let posts = document.getElementById('pills-posts');
let more_posts = document.getElementById('more-posts');
window.onload = loadPosts;
more_posts.addEventListener('click', loadPosts);

function loadPosts() {
    let page = more_posts.dataset.page;
    const route = '/api/member/' + username + '/posts/' + page;
    const data = {username: username, page: page};

    sendAjaxRequest('GET', route, data,
        (response) => {
            const data = JSON.parse(response);
            if (data === "") {
                more_posts.remove();
            } else {
                let new_posts = document.createElement('div');
                new_posts.innerHTML = data;
                while (new_posts.firstChild) {
                    document.getElementById('member-posts').appendChild(new_posts.firstChild)
                }
                more_posts.dataset.page = (parseInt(page) + 1).toString();
            }
        },
        (response) => {
            console.error(response)
        }
    )
}
