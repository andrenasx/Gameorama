const query = document.getElementById("query").innerText;

let postsTab = document.getElementById('pills-posts-tab');
let topicsTab = document.getElementById('pills-topics-tab');
let membersTab = document.getElementById('pills-members-tab');
let contentSection = document.getElementById('content');
let spinner = document.getElementById('spinner');


let content = 'posts';
let page = 1;
let querying = false;


function loadContent() {
    querying = false;
    const current_content = content;
    const route = '/api/' + content;
    const data = {query: query, page: page};


    sendAjaxRequest('GET', route, data,
        (response) => {
            if (content !== current_content) {
                this.disabled = false;
                return;
            }

            const data = JSON.parse(response);

            contentSection.innerHTML += data.join('');

            if(content === 'posts') {
                const titles = Array.from(document.getElementsByClassName('post-title'));
                const bodies = Array.from(document.getElementsByClassName('post-body'));
                const array = titles.concat(bodies);
                array.forEach(element => {
                    element.innerHTML = element.innerHTML.replaceAll(new RegExp(query, "gi"),"<span class='highlight'>"+'$&'+"</span>");
                });
            }

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
topicsTab.addEventListener('click', reset.bind(topicsTab, 'topics'));
membersTab.addEventListener('click', reset.bind(membersTab, 'members'));

start.call(postsTab);

window.addEventListener('scroll', () => {
    const {scrollTop, scrollHeight, clientHeight} = document.documentElement;

    if ((scrollTop + clientHeight >= scrollHeight - 800) && querying) {
        loadContent();
    }
}, {
    passive: true
});
