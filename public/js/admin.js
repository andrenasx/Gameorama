const posts = document.querySelector(".posts")
const comments = document.querySelector(".comments")
const topics = document.querySelector(".topics")
const members = document.querySelector(".members")
const reported_posts = document.getElementById("pills-posts-tab")
const reported_comments = document.getElementById("pills-comments-tab")
const reported_topics = document.getElementById("pills-topics-tab")
const reported_members = document.getElementById("pills-members-tab")


reported_comments.addEventListener("click", function(event) {
    const route = "api/admin/comments"
    sendAjaxRequest("GET", route, {}, loadContent.bind(event.target), loadError)
})

reported_posts.addEventListener("click", function(event) {
    const route = "api/admin/posts"
    sendAjaxRequest("GET", route, {}, loadContent.bind(event.target), loadError)
})

reported_topics.addEventListener("click", function(event) {
    const route = "api/admin/topics"
    sendAjaxRequest("GET", route, {}, loadContent.bind(event.target), loadError)
})

reported_members.addEventListener("click", function(event) {
    const route = "api/admin/members"
    sendAjaxRequest("GET", route, {}, loadContent.bind(event.target), loadError)
})


function loadContent(response) {
    let data = JSON.parse(response)
    let element_selector = this.getAttribute("data-bs-target")
    let element = document.querySelector(element_selector)
    element.innerHTML = data.join('')
}

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
        const route = "/api/topic/" + id_topic
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

reported_posts.click()


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
