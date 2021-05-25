const bodyL = document.body;


bodyL.addEventListener("click", (event)=>{


    const post_voting=event.target.closest(".post-voting");
    if(post_voting!=null){
        loginModal()
        return
    }

    const report = event.target.closest(".reportable");

    if(report!=null){
        loginModal()
        return
    }

    const comment_voting = event.target.closest(".comment-voting");

    if(comment_voting!=null){
        loginModal()
        return
    }

    const bookmark = event.target.closest(".bookmark-btn");

    if(bookmark!=null){
        loginModal()
        return
    }

})



function loginModal(){
    const login=document.getElementById("loginRequired")
    const modal=new bootstrap.Modal(login)
    modal.show()
}
