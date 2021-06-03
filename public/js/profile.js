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
    loadContent.call(this);
}

function reset(c) {
    this.disabled = true;
    content = c;
    page = 1;
    querying = true;
    contentSection.innerHTML = "";
    start.call(this)
}

function removeSpinner() {
    spinner.classList.remove('d-flex');
    spinner.classList.add('d-none');
}

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

            if (page === 1 && data.length === 0) {
                removeSpinner();
                contentSection.innerHTML = "No content to show";
                this.disabled = false;
                return;
            }

            if (data.length < 15) {
                removeSpinner();
            }

            contentSection.innerHTML += data.join('');

            page += 1;
            querying = true;
            this.disabled = false;
        },
        (response) => {
            console.error(response)
        }
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

