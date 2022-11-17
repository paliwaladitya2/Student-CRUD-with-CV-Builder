let print = document.getElementById('print');

print.addEventListener('click', function () {
    window.print();
});

let copy = document.getElementById('copy');

copy.addEventListener('click', function () {
    const url = window.location.href;
    navigator.clipboard.writeText(url);
    alert("Copied CV Link: " + url);
});

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
