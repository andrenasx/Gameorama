d_b = document.getElementById('delete-this');
if (d_b != null) {
    d_b.addEventListener("click", function() {
        sendAjaxRequest("DELETE", "/api/post/" + d_b.getAttribute("data-id"), {}, function (){window.location='/home'}, loadError)
    })
}
