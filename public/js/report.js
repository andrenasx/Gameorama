const post_report_button = document.querySelector("#postReport");
const comment_report_button = document.querySelector("#commentReport");
const profile_report_button = document.querySelector("#profileReport");
const topic_report_button = document.querySelector("#topicReport");
const post_id = document.getElementById("postReport").getAttribute("data-id");
const comment_id = document.getElementById("commentReport").getAttribute("data-id");
const member_id = document.getElementById("profileReport").getAttribute("data-id");
const topic_id = document.getElementById("topicReport").getAttribute("data-id");
const report = document.getElementById("reportForm");


if(post_report_button != null)
    post_report_button.addEventListener("click", function(event) {
        event.preventDefault()
        const content = {comment: comment.value}
        const route = "/api/post/" + post_id + "/report"
        sendAjaxRequest("POST", route, content, loadComment, loadError)
        
    })
if(comment_report_button != null)
    comment_report_button.addEventListener("click", function(event) {
        event.preventDefault()
        const content = {comment: comment.value}
        const route = "/api/post/" + post_id + "/report"
        sendAjaxRequest("POST", route, content, loadComment, loadError)
        
    })
if(profile_report_button != null)
    profile_report_button.addEventListener("click", function(event) {
        event.preventDefault()
        const content = {comment: comment.value}
        const route = "/api/member/" + member_id + "/report"
        sendAjaxRequest("POST", route, content, loadComment, loadError)
        
    })
if(topic_report_button != null)
    topic_report_button.addEventListener("click", function(event) {
        event.preventDefault()
        const content = {comment: comment.value}
        const route = "/api/topic/" + topic_id + "/report"
        sendAjaxRequest("POST", route, content, loadComment, loadError)
        
    })


function loadError(response) {
    console.error(response);
}
