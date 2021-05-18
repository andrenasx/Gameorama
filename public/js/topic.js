const topic_name = document.getElementById('topic_name').innerText;

// Posts
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
    const route = '/api/topic/' + topic_name + '/posts/' + content + '/' + page;
    const data = {page: page};

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


trendingTab.addEventListener('click', reset.bind(null, 'trending'));
latestTab.addEventListener('click', reset.bind(null, 'latest'));

start();

window.addEventListener('scroll', () => {
    const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

    if ((scrollTop + clientHeight >= scrollHeight - 600) && querying) {
        loadContent();
    }
}, {
    passive: true
});