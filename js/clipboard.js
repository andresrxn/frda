///////////////////////////////////////
let copys = document.querySelectorAll('.copy');
copys.forEach(copy => {
    copy.addEventListener('click', () => {

        document.getElementById('copy-msg').classList.add('copy-show');
        getlink();
        setTimeout(() => {
            document.getElementById('copy-msg').classList.remove('copy-show');
        }, 1500);
    });
});

function getlink() {
    var aux = document.createElement("input");
    aux.setAttribute("value", window.location.href);
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");
    document.body.removeChild(aux);
}