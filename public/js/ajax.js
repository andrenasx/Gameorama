function encodeForAjax(data) {
    if (data == null) return null;
    return Object.keys(data).map(function (k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

function sendAjaxRequest(method, url, data, successHandler, failHandler) {
    let request = new XMLHttpRequest();

    if (method === "GET")
        url = url + `?${encodeForAjax(data)}`

    request.open(method, url, true);
    request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.onreadystatechange = function () {
        if (request.readyState === XMLHttpRequest.DONE) {
            if (request.status === 200 || request.status === 201) {
                successHandler.call(request.response, request.response);
            }
            else {
                failHandler.call(request.response, request.response);
            }
        }
    }

    if (method === "GET")
        request.send()
    else
        request.send(encodeForAjax(data));
}


function createToast(text, success, element) {
    let textClass = success ? "text-success" : "text-danger"
    let toast = document.createElement("div")

    toast.setAttribute("class", "toast bg-white")
    toast.setAttribute("aria-live", "assertive")
    toast.setAttribute("role", "alert")
    toast.setAttribute("aria-atomic", "true")
    toast.setAttribute("data-bs-animation", "true")
    toast.setAttribute("data-bs-autohide", "true")
    toast.setAttribute("data-bs-delay", "5000")

    let toastHeader = document.createElement("div")
    toastHeader.className = "toast-header d-flex justify-content-between"
    let toastBody = document.createElement("div")

    let header_div = document.createElement("div")
    let header_span = document.createElement("span")
    header_span.className = "material-icons-round me-2"

    header_span.innerHTML = success ? "check_circle" : "error"

    let header = document.createElement("strong")
    header.setAttribute("class", textClass)
    header.innerText = success ? "Success" : "Error"
    header_div.appendChild(header_span)
    header_div.appendChild(header)


    header_div.className = "d-flex align-items-center toast-header-" + success

    let closeButton = document.createElement("button")
    closeButton.setAttribute("class", "btn-close")
    closeButton.setAttribute("type", "button")
    closeButton.setAttribute("data-bs-dismiss", "toast")
    closeButton.setAttribute("aria-label", "Close")

    toastHeader.appendChild(header_div)
    toastHeader.appendChild(closeButton)

    toast.appendChild(toastHeader)

    toastBody.className = "toast-body"
    toastText = document.createElement("p")
    toastText.innerText = text

    toastBody.appendChild(toastText)

    toast.appendChild(toastBody)

    element = document.querySelector(".toast-container")

    element.appendChild(toast)

    toast = new bootstrap.Toast(toast)
    toast.show()
}

function loadError(error) {
    createToast("Internal error", false)
}

