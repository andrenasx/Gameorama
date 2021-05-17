let posts = document.querySelector(".posts");
console.log(posts);
posts.addEventListener("click", function(event){
    let bookmarkClassList = event.target.classList
    if (bookmarkClassList.contains("bookmark-btn")) {
        console.log("BOOKMARK")
        bookmarkButtonHandler(event.target)
        
    }

    if (bookmarkClassList.contains("bookmarked-btn")) {
        console.log("BOOKMARKED")
        bookmarkedButtonHandler(event.target)
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
                element.innerHTML = "bookmark_remove";
            }
            
            if (count == 1){
                element.innerHTML = "Remove Bookmark";
            }
            count++;

        });
        bookmark_button.classList.remove("bookmark-btn");
        bookmark_button.classList.add("bookmarked-btn");
        bookmark_button.classList.remove("bookmark");
        bookmark_button.classList.add("bookmarked");
        
    }, loadError)
    
    console.log(bookmark_id_post)
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