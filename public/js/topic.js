const topic_name = document.getElementById('topic_name').innerText;

// Posts
let more_trending = document.getElementById('more-trending');
let more_latest = document.getElementById('more-latest');

window.onload = function () {
    loadContent('trending', more_trending);
    more_trending.addEventListener('click', loadContent.bind(null, 'trending', more_trending));
    loadContent('latest', more_latest);
    more_latest.addEventListener('click', loadContent.bind(null, 'latest', more_latest));
}

function loadContent(content, button) {
    let page = button.dataset.page;
    const route = '/api/topic/' + topic_name + '/posts/' + content + '/' + page;
    const data = {page: page};

    sendAjaxRequest('GET', route, data,
        (response) => {
            console.log(response);
            const data = JSON.parse(response);
            if (data.length < 15) {
                button.remove();
            }
            if (data.length === 0) return

            let new_div = document.createElement('div');
            new_div.innerHTML = data.join('');
            while (new_div.firstChild) {
                document.getElementById(content + '-posts').appendChild(new_div.firstChild)
            }
            button.dataset.page = (parseInt(page) + 1).toString();
        },
        (response) => {
            console.error(response)
        }
    )
}
