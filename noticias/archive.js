let lists = document.querySelectorAll('.filter-card');
let itemBox = document.querySelectorAll('.main-card');

for (let i = 0; i < lists.length; i++) {
    lists[i].addEventListener('click', () => {
        for (let j = 0; j < lists.length; j++) {
            lists[j].classList.remove('selected');

        }
        lists[i].classList.add('selected');
        document.querySelector('.news-main-container').classList.add('active');
        setTimeout(() => {
            document.querySelector('.news-main-container').classList.remove('active');
        }, 400);



        let dataFilter = lists[i].getAttribute('data-filter');

        for (let k = 0; k < itemBox.length; k++) {
            itemBox[k].classList.add('hide');
            itemBox[k].classList.remove('selected');

            if (itemBox[k].getAttribute('data-item') == dataFilter || dataFilter == "Todas") {
                itemBox[k].classList.add('selected');
                itemBox[k].classList.remove('hide');
            }
        }
    });

}

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

    xhttp.open('POST', '../php/save-news.php');

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