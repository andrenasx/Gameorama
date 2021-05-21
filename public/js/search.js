const query = document.getElementById("query").innerText;


let postsTab = document.getElementById('pills-posts-tab');
let topicsTab = document.getElementById('pills-topics-tab');
let membersTab = document.getElementById('pills-members-tab');
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
    const route = '/api/' + content;
    const data = {query: query};

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

            if(content === 'posts') {
                const titles = Array.from(document.getElementsByClassName('post-title'));
                const bodies = Array.from(document.getElementsByClassName('post-body'));
                const array = titles.concat(bodies);
                array.forEach(element => {
                    element.innerHTML = element.innerHTML.replaceAll(new RegExp(query, "gi"),"<span class='highlight'>"+'$&'+"</span>");
                });
            }
        },
        (response) => {
            console.error(response)
        }
    )
}


postsTab.addEventListener('click', reset.bind(null, 'posts'));
topicsTab.addEventListener('click', reset.bind(null, 'topics'));
membersTab.addEventListener('click', reset.bind(null, 'members'));

start();

window.addEventListener('scroll', () => {
    const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

    if ((scrollTop + clientHeight >= scrollHeight - 800) && querying) {
        loadContent();
    }
}, {
    passive: true
});
