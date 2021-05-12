
const report = document.querySelector(".reportable");

report.addEventListener("click", function(event){

    let profile_report = event.target.closest(".report-profile");

    if(profile_report !=null)
        reportProfile(profile_report);
    
    let topic_report = event.target.closest(".report-topic");

    if(topic_report != null)
        reportTopic(topic_report);

    let comment_report = event.target.closest(".report-comment");

    if(comment_report != null)
        reportComment(comment_report);

    let post_report = event.target.closest(".report-post");

    if(post_report != null)
        reportPost(post_report);


})


function reportProfile(profile_report){
    const member_id=profile_report.getAttribute("data-id");
    const report_form = profile_report.querySelector(".reportForm");
    const route = "/api/member/" + member_id + "/report"
    let content = report_form.querySelector('input[name="option"]:checked').value;
    sendAjaxRequest("POST", route, content, function(){}, loadError)
}
function reportTopic(topic_report){
    const topic_id=topic_report.getAttribute("data-id");
    const report_form = topic_report.querySelector(".reportForm");
    const route = "/api/topic/" + topic_id + "/report"
    let content = report_form.querySelector('input[name="option"]:checked').value;
    sendAjaxRequest("POST", route, content, function(){}, loadError)
}
function reportComment(comment_report){
    const comment_id=comment_report.getAttribute("data-id");
    const report_form = comment_report.querySelector(".reportForm");
    const route = "/api/comment/" + comment_id + "/report"
    let content = report_form.querySelector('input[name="option"]:checked').value;
    sendAjaxRequest("POST", route, content, function(){}, loadError)
}
function reportPost( post_report){
    const post_id=post_report.getAttribute("data-id");
    const report_form = post_report.querySelector(".reportForm");
    const route = "/api/post/" + post_id + "/report"
    let content = report_form.querySelector('input[name="option"]:checked').value;
    sendAjaxRequest("POST", route, content, function(){}, loadError)
}


function loadError(response) {
    console.error(response);
}
