const topic_name = document.getElementById('topic_name').innerText;

// Posts
let trendingTab = document.getElementById('pills-trending-tab');
let latestTab = document.getElementById('pills-latest-tab');
let contentSection = document.getElementById('content');
let spinner = document.getElementById('spinner');

let content = 'trending';
let page = 1;
let querying = false;


function loadContent() {
    querying = false;
    const current_content = content;
    const route = '/api/topic/' + topic_name + '/posts/' + content;
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


trendingTab.addEventListener('click', reset.bind(trendingTab, 'trending'));
latestTab.addEventListener('click', reset.bind(latestTab, 'latest'));

start.call(trendingTab);

window.addEventListener('scroll', () => {
    const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

    if ((scrollTop + clientHeight >= scrollHeight - 800) && querying) {
        loadContent();
    }
}, {
    passive: true
});
