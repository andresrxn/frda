document.addEventListener('DOMContentLoaded', () => {


    let progressAmounts = document.querySelectorAll('.progress-amount');
    progressAmounts.forEach(progressAmount => {

        let initial = progressAmount.querySelector('.initial-amount').lastElementChild.textContent.replace(/,/g, "");
        let final = progressAmount.querySelector('.final-amount').lastElementChild.textContent.replace(/,/g, "");

        let progressBar = progressAmount.parentElement.children[1].firstChild.nextSibling;

        let widthBar = parseInt(initial) / parseInt(final);

        progressBar.style.width = Math.round(widthBar * 100) + "%";
        let percent = progressAmount.parentElement.firstElementChild;
        percent.style.left = Math.round(widthBar * 100) + "%";
        percent.innerHTML = Math.round(widthBar * 100) + "%";


        if (Math.round(widthBar * 100) >= 100) {
            progressBar.style.width = "100%";
            progressBar.style.background = "#2ecc71";
            percent.style.left = "93%"
            percent.innerHTML = "100% <i class='fas fa-check icon' style='color: #21c512'></i>"
        }
    });

});

function guardarProyecto(value, el) {

    const formData = value;
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('responseProyect').innerHTML = this.responseText;
            if (el.classList.contains('saved')) {
                el.innerHTML = '<i class="fas fa-bookmark icon"></i>';
                el.setAttribute("title", "Proyecto Guardado");
            } else {
                el.innerHTML = '<i class="far fa-bookmark icon"></i>';
                el.setAttribute("title", "Guardar Proyecto");
            }
        }

        if (xhttp.responseText.indexOf("<script>") > -1) {
            var x = xhttp.responseText.indexOf("<script>") + "<script>".length;
            var y = xhttp.responseText.indexOf("</script>") - x;
            eval(xhttp.responseText.substr(x, y));
        }
    };

    xhttp.open('POST', '../php/save-proyect-two.php');

    xhttp.send(formData);

}


let saveProyects = document.querySelectorAll('.save-proyect');
saveProyects.forEach(saveProyect => {
    saveProyect.addEventListener('click', (e) => {
        e.preventDefault();
        saveProyect.innerHTML = '<i class="fas fa-spinner icon loading"></i>';
        let form = saveProyect.parentElement;
        let formData = new FormData(form);
        guardarProyecto(formData, saveProyect);


    });
});