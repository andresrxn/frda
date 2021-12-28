let btnSent = document.getElementById('btnSent');
btnSent.addEventListener('click', () => {
    document.getElementById('email-sent').classList.remove("active");
    document.getElementById('cookie-shadow').classList.remove("active");


});

const typed = new Typed('.typed', {

    strings: [
        '<span class="option">Preguntas</span>',
        '<span class="option">Dudas</span>',
        '<span class="option">Comentarios</span>',
        '<span class="option">Preguntas</span>',
        '<span class="option">Dudas</span>',
        '<span class="option">Comentarios</span>'
    ],


    typeSpeed: 80,
    startDelay: 800,
    backSpeed: 60,
    smartBackspace: true,
    shuffle: false,
    backDelay: 350,
    loop: true,
    loopCount: true,
    showCursor: true,
    cursorChar: '|',
    contentType: 'html',
});

var map = L.map('map', {
    scrollWheelZoom: false,

    zoom: 14.5,
}).panTo(new L.LatLng(14.65591134435727, -90.46476381161676));




L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

L.marker([14.65291134435727, -90.46476381161676]).addTo(map)
    .bindPopup('Fundación Redes de Ayuda | Oficinas Centrales')
    .openPopup();