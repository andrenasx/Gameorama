let posts = document.querySelector(".posts");
posts.addEventListener("click", function(event){
    let bookmarkClassList = event.target.classList
    if (bookmarkClassList.contains("bookmark-btn")) {
        bookmarkButtonHandler(event.target)
    }

    if (bookmarkClassList.contains("bookmarked-btn")) {
        bookmarkedButtonHandler(event.target)
    }
})

posts.addEventListener("mouseover", function(event){
    let bookmarkHoverClassList = event.target.classList
    if (bookmarkHoverClassList.contains("bookmarked-btn")) {
        let bookmark_hover_button = event.target.closest(".bookmarked");
        let hover_count = 0;
        bookmark_hover_button.querySelectorAll(".bookmarked-btn").forEach(element => {
            if (hover_count == 0){
                element.innerHTML = "bookmark_remove";
            }

            if (hover_count == 1){
                element.innerHTML = "Remove Bookmark";
            }
            hover_count++;
        });
    }
})

posts.addEventListener("mouseout", function(event){
    let bookmarkHoverClassList = event.target.classList
    if (bookmarkHoverClassList.contains("bookmarked-btn")) {
        let bookmark_hover_button = event.target.closest(".bookmarked");
        let hover_count = 0;
        bookmark_hover_button.querySelectorAll(".bookmarked-btn").forEach(element => {
            if (hover_count == 0){
                element.innerHTML = "bookmark_added";
            }

            if (hover_count == 1){
                element.innerHTML = "Bookmarked";
            }
            hover_count++;
        });
    }
})



function bookmarkButtonHandler(button) {
    let bookmark_button = button.closest(".bookmark");
    let bookmark_id_post = bookmark_button.getAttribute("data-id");
    const route = '/api/post/' + bookmark_id_post + '/bookmark';
    let request = {};


    sendAjaxRequest("POST", route, request, (response) => {
        let count = 0
        bookmark_button.querySelectorAll(".bookmark-btn").forEach(element => {
            element.classList.remove("bookmark-btn");
            element.classList.add("bookmarked-btn");
            if (count == 0){
                element.innerHTML = "bookmark_added";
                element.classList.remove("material-icons-outlined");
                element.classList.add("material-icons-round")
            }

            if (count == 1){
                element.innerHTML = "Bookmarked";
            }
            count++;

        });
        bookmark_button.classList.remove("bookmark-btn");
        bookmark_button.classList.add("bookmarked-btn");
        bookmark_button.classList.remove("bookmark");
        bookmark_button.classList.add("bookmarked");

    }, loadError)
}



function bookmarkedButtonHandler(button){
    let bookmark_button = button.closest(".bookmarked");
    let bookmark_id_post = bookmark_button.getAttribute("data-id")
    const route = '/api/post/' + bookmark_id_post + '/bookmark';
    let request = {};
    sendAjaxRequest("DELETE", route, request, (response) => {
        let count = 0
        bookmark_button.querySelectorAll(".bookmarked-btn").forEach(element => {
            element.classList.remove("bookmarked-btn");
            element.classList.add("bookmark-btn");
            if (count == 0){
                element.innerHTML = "bookmark_add";
                element.classList.remove("material-icons-round");
                element.classList.add("material-icons-outlined");
            }

            if (count == 1){
                element.innerHTML = "Bookmark";
            }
            count++;

        });
        bookmark_button.classList.remove("bookmarked-btn");
        bookmark_button.classList.add("bookmark-btn");
        bookmark_button.classList.remove("bookmarked");
        bookmark_button.classList.add("bookmark");

    }, loadError)
}

function loadError(response) {
    console.error(response)
}
