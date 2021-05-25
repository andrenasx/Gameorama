// Posts
let feedTab = document.getElementById('pills-feed-tab');
let trendingTab = document.getElementById('pills-trending-tab');
let latestTab = document.getElementById('pills-latest-tab');
let contentSection = document.getElementById('content');
let spinner = document.getElementById('spinner');

let content = 'trending';
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
    const current_content = content;
    const route = '/api/home/' + content + '/' + page;
    const data = {page: page};

    sendAjaxRequest('GET', route, data,
        (response) => {
            if (content !== current_content)
                return;

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


if (feedTab != null) {
    content = 'feed';
    feedTab.addEventListener('click', reset.bind(null, 'feed'));
}
trendingTab.addEventListener('click', reset.bind(null, 'trending'));
latestTab.addEventListener('click', reset.bind(null, 'latest'));

start();

window.addEventListener('scroll', () => {
    const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

    if ((scrollTop + clientHeight >= scrollHeight - 800) && querying) {
        loadContent();
    }
}, {
    passive: true
});
