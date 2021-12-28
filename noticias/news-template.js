document.addEventListener('DOMContentLoaded', () => {
    let categorys = document.querySelectorAll('.category');
    categorys.forEach(category => {
        if (category.innerHTML == "Categoria 1") {
            category.classList.add("category1");
        } else if (category.innerHTML == "Categoria 2") {
            category.classList.add("category2");
        } else if (category.innerHTML == "Categoria 3") {
            category.classList.add("category3");
        } else if (category.innerHTML == "Categoria 4") {
            category.classList.add("category4");
        } else if (category.innerHTML == "Categoria 5") {
            category.classList.add("category5");
        } else if (category.innerHTML == "Categoria 6") {
            category.classList.add("category6");
        }
    });

    document.getElementById('input-url').value = document.getElementById('input-url').value

});

function copyToClipBoard() {

    var content = document.getElementById('input-url');

    content.select();
    document.execCommand('copy');

    document.getElementById('copy-input').innerHTML = "Copiado!";
    setTimeout(() => {
        document.getElementById('copy-input').innerHTML = "Copiar";

    }, 1500);
}

let shareNews = document.querySelectorAll('.share-news');
shareNews.forEach(shareNew => {

    shareNew.addEventListener('click', () => {

        document.getElementById('cookie-shadow').classList.add('active');
        document.getElementById('share-container').classList.add('active');
        document.getElementById('close-donation').classList.add('active');

    });
});
document.getElementById('copy-input').addEventListener('click', copyToClipBoard);

function guardarNoticia(value, el) {

    const formData = value;
    const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('response-news').innerHTML = this.responseText;
            if (el.classList.contains('saved')) {
                el.innerHTML = '<i class="fas fa-heart icon"></i>';
                el.setAttribute("title", "Guardada en Favoritos");
            } else {
                el.innerHTML = '<i class="far fa-heart icon"></i>';
                el.setAttribute("title", "Marcar como Favorita");
            }
        }

        if (xhttp.responseText.indexOf("<script>") > -1) {
            var x = xhttp.responseText.indexOf("<script>") + "<script>".length;
            var y = xhttp.responseText.indexOf("</script>") - x;
            eval(xhttp.responseText.substr(x, y));
        }
    };

    xhttp.open('POST', '../../php/save-news.php');

    xhttp.send(formData);

}


let saveNews = document.querySelectorAll('.save-news');
saveNews.forEach(saveNew => {
    saveNew.addEventListener('click', (e) => {
        e.preventDefault();
        saveNew.innerHTML = '<i class="fas fa-spinner icon loading"></i>';
        let form = saveNew.parentElement;
        let formData = new FormData(form);
        guardarNoticia(formData, saveNew);


    });
});

function closeNews() {
    document.getElementById('cookie-shadow').classList.remove('active');

    document.getElementById('close-donation').classList.remove('active');
    document.getElementById('share-container').classList.remove('active');

}
document.getElementById('close-donation').addEventListener('click', closeNews);
document.getElementById('cookie-shadow').addEventListener('click', closeNews);