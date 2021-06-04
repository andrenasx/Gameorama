const bodyL = document.body;


bodyL.addEventListener("click", (event)=>{


    const upvoting=event.target.closest(".upvote");
    if(upvoting!=null){
        loginModal()
        return
    }
    const downvoting=event.target.closest(".downvote");
    if(downvoting!=null){
        loginModal()
        return
    }

    const report = event.target.closest(".report-b");

    if(report!=null){
        loginModal()
        return
    }

    const bookmark = event.target.closest(".bookmark-btn");

    if(bookmark!=null){
        loginModal()
        return
    }

    const follow_member = event.target.closest(".member-follow-button");

    if(follow_member!=null){
        loginModal()
        return
    }

    const followTopic = event.target.closest(".topic-follow-button");

    if(followTopic!=null){
        loginModal()
        return
    }


    const replyComment = event.target.closest(".reply-comment-button");

    if(replyComment!=null){
        loginModal()
        return
    }


    const postComment = event.target.closest("#new-comment-section");

    if(postComment!=null){
        loginModal()
        return
    }

})



function loginModal(){
    const login=document.getElementById("loginRequired")
    const modal=new bootstrap.Modal(login)
    modal.show()
}
