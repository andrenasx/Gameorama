function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function sendAjaxRequest(method, url, data, successHandler, failHandler) {
    let request = new XMLHttpRequest();

    if(method === "GET")
        url = url + `?${encodeForAjax(data)}`

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

    if(method === "GET")
        request.send()
    else
        request.send(encodeForAjax(data));
}


function createToast(text, success, element) {
    console.log("Creating toast")


    let toast =  document.createElement("div")
    
    toast.setAttribute("class", "toast show")
    toast.setAttribute("aria-live", "assertive")
    toast.setAttribute("role", "alert")
    toast.setAttribute("aria-atomic", "true")

    let toastHeader = document.createElement("div")
    toastHeader.className = "toast-header"
    let toastBody = document.createElement("div")

    let header = document.createElement("strong")
    header.setAttribute("class", "text-muted")
    header.innerText = success ? "Success" : "Error"

    let closeButton = document.createElement("button")
    closeButton.setAttribute("class", "btn-close")
    closeButton.setAttribute("type", "button")
    closeButton.setAttribute("data-bs-dismiss", "toast")
    closeButton.setAttribute("aria-label", "Close")

    toastHeader.appendChild(header)
    toastHeader.appendChild(closeButton)

    toast.appendChild(toastHeader)

    toastBody.className = "toast-body"
    toastText = document.createElement("p")
    toastText.innerText = text

    toastBody.appendChild(toastText)

    toast.appendChild(toastBody)

    // toastContainer.appendChild(toast)

    // console.log(toastContainer)
    element.appendChild(toast)

}

