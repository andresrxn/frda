function createNews() {
    const form = document.getElementById('form-news');
    const formData = new FormData(form);
    const xhttp = new XMLHttpRequest();



    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector(".input-img").classList.remove("error");
            document.querySelector(".input-title").classList.remove("error");

            document.querySelector(".input-reading").classList.remove("error");

            document.querySelector(".input-img").classList.add("success");
            document.querySelector(".input-title").classList.add("success");
            document.querySelector(".input-place").classList.add("success");

            document.querySelector(".input-reading").classList.add("success");

            document.getElementById('smallTitle').innerHTML = "";

            document.getElementById('smallImg').innerHTML = "";

            document.getElementById('smallPlace').innerHTML = "";

            document.getElementById('smallReading').innerHTML = "";

            document.getElementById('response').innerHTML = this.responseText;

        }

        if (xhttp.responseText.indexOf("<script>") > -1) {
            var x = xhttp.responseText.indexOf("<script>") + "<script>".length;
            var y = xhttp.responseText.indexOf("</script>") - x;
            eval(xhttp.responseText.substr(x, y));
        }
    };


    xhttp.open('POST', 'php/new-news.php');

    xhttp.send(formData);

}
document.getElementById('btnNews').addEventListener('click', (e) => {
    e.preventDefault();
    document.getElementById('btnNews').innerHTML = '<i class="fas fa-spinner icon loading"></i>';
    createNews();
});


let inputPhoto = document.getElementById('img');

img.addEventListener('change', () => {

    let files = document.getElementById('img').files;
    let navigator = window.URL || window.webkitURL;

    document.getElementById('preview-container').innerHTML = "";

    for (let i = 0; i < files.length; i++) {
        const type = files[i].type;
        if (type == 'image/jpeg' || type == 'image/jpg' || type == 'image/png') {
            let object = navigator.createObjectURL(files[i]);
            let preview = document.getElementById('preview-container');


            let img = document.createElement('img');
            img.src = object;
            img.classList.add('preview-img');
            preview.appendChild(img);

        }

    }
});