const query = document.getElementById("query").innerText;

window.onload = function () {
    loadContent('posts')
    loadContent('topics');
    loadContent('members');
}

function loadContent(content) {
    const route = '/api/' + content;
    const data = {query: query};

    sendAjaxRequest('GET', route, data,
        (response) => {
            console.log(response);
            const data = JSON.parse(response);

            let new_div = document.createElement('div');
            new_div.innerHTML = data.join('');
            while (new_div.firstChild) {
                document.getElementById(content).appendChild(new_div.firstChild)
            }
        },
        (response) => {
            console.error(response)
        }
    )
}
