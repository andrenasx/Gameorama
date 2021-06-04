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


function loadContent() {
    querying = false;
    const current_content = content;
    const route = '/api/member/' + username + '/' + content;
    const data = {page: page};

    sendAjaxRequest('GET', route, data,
        (response) => {
            if (content !== current_content) {
                this.disabled = false;
                return;
            }

            const data = JSON.parse(response);

            contentSection.innerHTML += data.join('');

            if (data.length < 15) {
                removeSpinner();
            }
            else {
                page += 1;
                querying = true;
            }
            this.disabled = false;
        },
        loadError
    )
}


postsTab.addEventListener('click', reset.bind(postsTab, 'posts'));
commentsTab.addEventListener('click', reset.bind(commentsTab, 'comments'));
if (bookmarkedsTab != null) {
    bookmarkedsTab.addEventListener('click', reset.bind(bookmarkedsTab, 'bookmarked'));
}

start.call(postsTab);

window.addEventListener('scroll', () => {
    const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

    if ((scrollTop + clientHeight >= scrollHeight - 800) && querying) {
        loadContent();
    }
}, {
    passive: true
});

