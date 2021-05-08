function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function sendAjaxRequest(method, url, data, successHandler, failHandler) {
    let request = new XMLHttpRequest();
    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {
        if (request.readyState === XMLHttpRequest.DONE) {
            console.log(request.status)
            if (request.status === 200) {
                successHandler.call(request.response, request.response);
            }
            else {
                failHandler.call(request.response, request.response);
            }
        }
    }
    request.send(encodeForAjax(data));
}