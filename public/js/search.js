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
            const data = JSON.parse(response);

            let new_div = document.createElement('div');
            new_div.innerHTML = data.join('');
            while (new_div.firstChild) {
                document.getElementById(content).appendChild(new_div.firstChild)
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
