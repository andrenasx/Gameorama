
const reports = document.querySelectorAll(".reportable");

let member_id;
let post_id;
let topic_id;
let comment_id;
console.log(reports[0])
reports.forEach(report => {report.addEventListener("click", function(event){
    console.log("Ola")
    let report_b = event.target.closest(".report_b");
    if(report_b!=null){
        let profile_report = event.target.closest(".report-profile");

        if(profile_report !=null){
            selectProfile(profile_report);
            return;
        }
            
        let topic_report = event.target.closest(".report-topic");

        if(topic_report != null){
            selectTopic(topic_report);
            return;
        }

        let comment_report = event.target.closest(".report-comment");

        if(comment_report != null){
            selectComment(comment_report);
            return;
        }

        let post_report = event.target.closest(".report-post");

        if(post_report != null){
            selectPost(post_report);
            return;
        }
    }

    let report_submit = event.target.closest("report-submit");

    if(report_submit!=null){
        let profile_report = event.target.closest("#topicReport");

        if(profile_report !=null){
            reportProfile(profile_report);
            return;
        }
            
        let topic_report = event.target.closest("#topicReport");

        if(topic_report != null){
            reportTopic(topic_report);
            return;
        }

        let comment_report = event.target.closest("#topicReport");

        if(comment_report != null){
            reportComment(comment_report);
            return;
        }

        let post_report = event.target.closest("#topicReport");

        if(post_report != null){
            reportPost(post_report);
            return;
        }
    }

})
})


function selectPost(post){
    post_id=post.getAttribute("data-id");
    console.log(post_id)
}

function selectProfile(profile){
    member_id=profile.getAttribute("data-id");
    
    console.log(member_id)
}

function selectTopic(topic){
    topic_id=topic.getAttribute("data-id");
    console.log(topic_id)
}

function selectComment(comment){
    comment_id=comment.getAttribute("data-id");
    console.log(comment_id)
}

function reportProfile(profile_report){
    const report_form = profile_report.closest(".reportForm");
    const route = "/api/member/" + member_id + "/report";
    let content = report_form.querySelector('input[name="option"]:checked').value;
    console.log(content)
    console.log(member_id)
    //sendAjaxRequest("POST", route, content, function(){}, loadError)
}
function reportTopic(topic_report){
    const report_form = topic_report.closest(".reportForm");
    const route = "/api/topic/" + topic_id + "/report";
    let content = report_form.querySelector('input[name="option"]:checked').value;
    console.log(content)
    console.log(topic_id)
    //sendAjaxRequest("POST", route, content, function(){}, loadError)
}
function reportComment(comment_report){
    const report_form = comment_report.closest(".reportForm");
    const route = "/api/comment/" + comment_id + "/report";
    let content = report_form.querySelector('input[name="option"]:checked').value;
    console.log(content)
    console.log(comment_id)
   // sendAjaxRequest("POST", route, content, function(){}, loadError)
}
function reportPost( post_report){
    const report_form = post_report.closest(".reportForm");
    const route = "/api/post/" + post_id + "/report"
    let content = report_form.querySelector('input[name="option"]:checked').value;
    console.log(content)
    console.log(post_id)
    //sendAjaxRequest("POST", route, content, function(){}, loadError)
}


function loadError(response) {
    console.error(response);
}
