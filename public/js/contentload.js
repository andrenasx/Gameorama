function start() {
    spinner.classList.remove('d-none');
    spinner.classList.add('d-flex');
    loadContent.call(this);
}

function reset(c) {
    this.disabled = true;
    content = c;
    page = 1;
    querying = true;
    contentSection.innerHTML = "";
    start.call(this)
}

function removeSpinner() {
    spinner.classList.remove('d-flex');
    spinner.classList.add('d-none');
}
