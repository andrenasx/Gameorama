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

