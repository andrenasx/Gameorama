const posts = document.querySelector(".posts")
const comments = document.querySelector(".comments")
const topics = document.querySelector(".topics")
const members = document.querySelector(".members")

posts.addEventListener("click", function (event) {
    let classList = event.target.classList;

    if (classList.contains("delete")) {
        event.preventDefault();
        const id_post = event.target.closest(".news-card").getAttribute("data-id");
        const route = "/api/post/" + id_post
        sendAjaxRequest("DELETE", route, {}, postResponse.bind(event.target.closest(".news-card")), loadError)
    }

    else if (classList.contains("dismiss")) {
        event.preventDefault();
        const id_post = event.target.closest(".news-card").getAttribute("data-id");
        const route = "/api/post/" + id_post + "/dismiss"
        sendAjaxRequest("DELETE", route, {}, postDismiss.bind(event.target.closest(".news-card")), loadError)
    }
})

comments.addEventListener("click", function (event) {
    let classList = event.target.classList;

    if (classList.contains("delete")) {
        event.preventDefault();
        const id_comment = event.target.closest(".comment-card").getAttribute("data-id");
        const route = "/api/comment/" + id_comment
        sendAjaxRequest("DELETE", route, {}, commentResponse.bind(event.target.closest(".comment-card")), loadError)
    }

    else if (classList.contains("dismiss")) {
        event.preventDefault();
        const id_comment = event.target.closest(".comment-card").getAttribute("data-id");
        const route = "/api/comment/" + id_comment + "/dismiss"
        sendAjaxRequest("DELETE", route, {}, commentDismiss.bind(event.target.closest(".comment-card")), loadError)
    }

})

topics.addEventListener("click", function (event) {
    let classList = event.target.classList;

    if (classList.contains("delete")) {
        const id_topic = event.target.closest(".topic-card").getAttribute("data-id");
        const route = "/api/comment/" + id_topic
        sendAjaxRequest("DELETE", route, {}, topicResponse.bind(event.target.closest(".topic-card")), loadError)
    }

    else if (classList.contains("dismiss")) {
        const id_topic = event.target.closest(".topic-card").getAttribute("data-id");
        const route = "/api/topic/" + id_topic + "/dismiss"
        sendAjaxRequest("DELETE", route, {}, topicDismiss.bind(event.target.closest(".topic-card")), loadError)
    }
})

members.addEventListener("click", function (event) {
    let classList = event.target.classList;

    if (classList.contains("delete")) {
        const username = event.target.closest(".member-card").getAttribute("data-id");
        const route = "/api/member/" + username
        sendAjaxRequest("DELETE", route, {}, memberResponse.bind(event.target.closest(".member-card")), loadError)
    }

    else if (classList.contains("dismiss")) {
        const username = event.target.closest(".member-card").getAttribute("data-id");
        const route = "/api/member/" + username + "/dismiss"
        sendAjaxRequest("DELETE", route, {}, dismissMember.bind(event.target.closest(".member-card")), loadError)
    }
})


function postDismiss() {
    createToast("Reports dismissed for post", true)
    this.remove()
}

function postResponse() {
    createToast("Successfully banned post", true)
    this.remove()
}

function commentDismiss() {
    createToast("Reports dismissed for comment", true)
    this.remove()
}

function commentResponse() {
    createToast("Successfully banned comment", true)
    this.remove()
}

function topicDismiss() {
    let topicName = this.querySelector("h4 a").innerText
    createToast("Reports dismissed for topic " + topicName, true)
    this.remove()
}

function topicResponse() {
    let topicName = this.querySelector("h4 a").innerText
    createToast("Successfully banned topic " + topicName, true)
    this.remove()
}

function dismissMember() {
    let username = this.getAttribute("data-id")
    createToast("Dismissed reports for member " + username, true)
    members.removeChild(this)
}

function memberResponse() {
    let username = this.getAttribute("data-id")
    createToast("Successfully banned member " + username, true)
    members.removeChild(this)
}
