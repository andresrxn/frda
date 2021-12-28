function menu() {

    const menuBtn = document.querySelector('.header-btn');
    let menuOpen = false;
    menuBtn.addEventListener('click', () => {
        menuOpen = true;

        let nav = document.getElementById('nav');
        nav.classList.add("active");
        let shadow = document.getElementById('cookie-shadow');
        shadow.classList.add("active");
    });

}
menu();
document.getElementById('mode').addEventListener('click', () => {

    document.querySelector('main').classList.toggle('dark');
    if (document.querySelector('main').classList.contains('dark')) {

        document.getElementById('mode').innerHTML = '<img src="../img/svg/noche.svg" class="title-img popup animated" id="mode-img"></img>';
        document.getElementById('menu-img').innerHTML = '<img src="../img/logos/redes-de-ayuda-completo-b&w.svg"></img>';
        localStorage.setItem('darkMode', 'true');
    } else {

        document.getElementById('mode').innerHTML = '<img src="../img/svg/dia.svg"  class="title-img popup animated" id="mode-img"></img>';
        document.getElementById('menu-img').innerHTML = '<img src="../img/logos/redes-de-ayuda-completo.svg"></img>';
        localStorage.setItem('darkMode', 'false');
    }

});

if (localStorage.getItem('darkMode') === 'true') {
    document.querySelector('main').classList.add('dark');
    document.getElementById('mode').innerHTML = '<img src="../img/svg/noche.svg" class="title-img popup animated" id="mode-img"></img>';
    document.getElementById('menu-img').innerHTML = '<img src="../img/logos/redes-de-ayuda-completo-b&w.svg"></img>';
    localStorage.setItem('darkMode', 'true');
} else {
    document.querySelector('main').classList.remove('dark');
    document.getElementById('mode').innerHTML = '<img src="../img/svg/dia.svg"  class="title-img popup animated" id="mode-img"></img>';
    document.getElementById('menu-img').innerHTML = '<img src="../img/logos/redes-de-ayuda-completo.svg"></img>';
    localStorage.setItem('darkMode', 'false');
}


const navLinks = document.querySelectorAll(".nav-li");

navLinks.forEach(navLink => {
    navLink.addEventListener('click', () => {
        let nav = document.getElementById('nav');
        nav.classList.remove("active");
        let shadow = document.getElementById('cookie-shadow');
        shadow.classList.remove("active");
    });
});

let shadow = document.getElementById('cookie-shadow');
shadow.addEventListener('click', () => {
    let nav = document.getElementById('nav');
    nav.classList.remove("active");
    let shadow = document.getElementById('cookie-shadow');
    shadow.classList.remove("active");
});
let list = document.querySelectorAll('.nav-li');

for (let [i, cv] of list.entries()) {
    cv.addEventListener('click', (e) => {
        resetFocus();
        cv.classList.toggle("active")
    })
}

function resetFocus() {
    list.forEach(el => el.classList.remove("active"));
}
document.addEventListener('DOMEventListener', () => {
    mostrarSaludo();

});

function mostrarSaludo() {

    let fecha = new Date();
    let hora = fecha.getHours();

    if (hora >= 0 && hora < 12) {
        texto = "Buenos Días,";
    }
    if (hora >= 12 && hora < 18) {
        texto = "Buenas Tardes,";
    }
    if (hora >= 18 && hora < 24) {
        texto = "Buenas Noches,";

    }
    document.getElementById('salute').innerHTML = texto;
}

let dashPrincipal = document.getElementById('dashPrincipal');
let dashDonations = document.getElementById('dashDonations');
let dashProyects = document.getElementById('dashProyects');
let dashNews = document.getElementById('dashNews');
let dashSponsors = document.getElementById('dashSponsors');
let dashUsers = document.getElementById('dashUsers');
let dashContact = document.getElementById('dashContact');
let dashHelp = document.getElementById('dashHelp');
let dashConfig = document.getElementById('dashConfig');
let dashSavedProyects = document.getElementById('dashSavedProyects');
let dashFavoritedNews = document.getElementById('dashFavoritedNews');
let dashSuscriptions = document.getElementById('dashSuscriptions');
let dashHistory = document.getElementById('dashHistory');
let nav = document.getElementById('nav');

nav.addEventListener('click', (e) => {
    if (e.target == dashPrincipal) {
        link("principal");

    } else if (e.target == dashDonations) {
        link("donations");
    } else if (e.target == dashProyects) {
        link("proyects");
    } else if (e.target == dashNews) {
        link("news");
    } else if (e.target == dashUsers) {
        link("users");
    } else if (e.target == dashSponsors) {
        link("sponsors");
    } else if (e.target == dashContact) {
        link("contact");
    } else if (e.target == dashHelp) {
        link("help");
    } else if (e.target == dashConfig) {
        link("account");
    } else if (e.target == dashHistory) {
        link("history");
    } else if (e.target == dashSuscriptions) {
        link("suscriptions");
    } else if (e.target == dashSavedProyects) {
        link("saved-proyects");
    } else if (e.target == dashFavoritedNews) {
        link("favorited-news");
    }
});


function link(url) {
    goTo(url + ".php");
}

function goTo(page) {
    document.getElementById('response-dash').innerHTML = "";

    const xhttpAccount = new XMLHttpRequest();

    document.getElementById('response-dash').classList.remove('mostrarArriba');
    document.getElementById('response-dash').classList.remove('animated');
    xhttpAccount.onload = function() {


        document.getElementById('response-dash').innerHTML = this.responseText;
        document.getElementById('response-dash').classList.add('mostrarArriba');
        document.getElementById('response-dash').classList.add('animated');

        if (document.getElementById('principal')) {

            principalContent();
        } else if (document.getElementById('donations')) {
            donationContent();
        } else if (document.getElementById('proyects')) {
            proyectsContent();
        }

    }

    xhttpAccount.open('GET', page);
    xhttpAccount.send();

}

function principalContent() {

    if (document.getElementById('principal')) {

        let valorInputs = document.querySelectorAll('.quantity b');
        let amounts = document.querySelectorAll('.table-list-amount span');

        amounts.forEach(amount => {
            valorInputValue = amount.innerText;

            amount.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();
        });
        valorInputs.forEach(valorInput => {
            valorInputValue = valorInput.innerText;


            valorInput.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();


        });

        let delayed;
        Chart.defaults.color = "#888";
        Chart.defaults.borderColor = "#bbbbbb50";
        Chart.defaults.datasets.bar.barPercentage = 0.5;

        let donationsChart = document.getElementById('donationChart').getContext('2d');

        let donationLabels = ['Ene.', 'Feb.', 'Mar.', 'Abr.', 'Myo.', 'Jun.', 'Jul.', 'Ago.', 'Sep.', 'Oct.', 'Nov.', 'Dic.'];

        let gradient = donationsChart.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, "#ff950080");
        gradient.addColorStop(1, "#ff950000");

        let donationsData = {

            label: 'Donaciones del 2021',
            data: [8, 12, 17, 7, 9, 19, 7, 4, 13, 10, 9, 17],
            fill: true,
            backgroundColor: gradient,
            pointBackgroundColor: "#ffaa00",
            borderColor: [
                '#ff7b00'
            ],
            radius: 4,
            hitRadius: 20,
            hoverRadius: 7,
            tension: 0.5,
            options: {

                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        }

        let chartOne = new Chart(donationsChart, {

            type: 'line',
            data: {
                labels: donationLabels,
                datasets: [

                    donationsData,


                ]
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true,

                    }
                },

                animation: {

                    onComplete: () => {
                        delayed = true;
                        donationsChart.fillStyle = "#fff"
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === 'data' && context.mode === 'default' && !delayed) {
                            delay = context.dataIndex * 50 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                },
                plugins: {
                    legend: {
                        display: false
                    },

                }
            },


        });


        let frequencyChart = document.getElementById('frequencyDonation').getContext('2d');

        let frequencyLabels = ['GT', 'US', 'SP', 'MX', 'CH'];
        let frequencyData = {

            data: [2500, 200, 550, 1050, 100],
            backgroundColor: [
                '#ff7b00',
                '#ff9500',
                '#ffaa00',
                '#ffc300',
                '#ffdd00',
            ],
            borderWidth: 0,
            hoverOffset: 3,

        };

        let chartTwo = new Chart(frequencyChart, {
            type: 'pie',
            data: {
                labels: frequencyLabels,
                datasets: [
                    frequencyData,
                ],

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }

            },

        });

        let otherChart = document.getElementById('other').getContext('2d');

        let gradientTwo = otherChart.createLinearGradient(0, 0, 0, 400);
        gradientTwo.addColorStop(0, "#ff950080");
        gradientTwo.addColorStop(1, "#ff950000");

        let otherLabels = ['Ene.', 'Feb.', 'Mar.', 'Abr.', 'Myo.', 'Jun.', 'Jul.', 'Ago.', 'Sep.', 'Oct.', 'Nov.', 'Dic.'];
        let otherData = {

            data: [50, 32, 57, 67, 99, 69, 72, 44, 138, 100, 150, 175],
            fill: true,
            backgroundColor: gradientTwo,
            borderColor: [
                '#ff7b00'
            ],
            pointBackgroundColor: "#ffaa00",
            radius: 4,
            hitRadius: 20,
            hoverRadius: 7,
            tension: 0.5,
            options: {

                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },



        };

        let chartThree = new Chart(otherChart, {
            type: 'line',
            data: {
                labels: otherLabels,
                datasets: [
                    otherData,
                ],

            },

            options: {


                scales: {
                    y: {
                        beginAtZero: true
                    }
                },

                animation: {

                    onComplete: () => {
                        delayed = true;
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === 'data' && context.mode === 'default' && !delayed) {
                            delay = context.dataIndex * 50 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            },

        });

        let proyectsChart = document.getElementById('proyects').getContext('2d');

        let proyectsLabels = ['Proyecto 1', 'Proyecto 2', 'Proyecto 3'];
        let proyectsData = {

            data: [30000, 50000, 120000],
            backgroundColor: [
                '#ff7b00',
                // '#ff9500',
                '#ffaa00',
                '#ffc300',
                // '#ffdd00',

            ],
            borderWidth: 0,
            hoverOffset: 3,

        };

        let chartFour = new Chart(proyectsChart, {
            type: 'doughnut',
            data: {
                labels: proyectsLabels,
                datasets: [
                    proyectsData,
                ],

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }

            },

        });


        function loadFlag(element) {
            let imgTag = document.createElement('img');
            imgTag.title = element.innerHTML;
            imgTag.src = `https://flagcdn.com/48x36/${element.innerHTML.toLowerCase()}.png`;

            element.innerHTML = "";
            element.appendChild(imgTag);
        }
        let flagContainers = document.querySelectorAll('.flag');
        flagContainers.forEach(flagContainer => {
            loadFlag(flagContainer);
        });

        let topSelect = document.getElementById('topSelect');
        topSelect.addEventListener('change', () => {
            if (topSelect.value == 'indv') {
                document.getElementById('tableIndividual').classList.add('active');
                document.getElementById('tableConstant').classList.remove('active');
            } else if (topSelect.value == 'const') {
                document.getElementById('tableIndividual').classList.remove('active');
                document.getElementById('tableConstant').classList.add('active');
            }
        });

        let recentSelect = document.getElementById('recentSelect');
        recentSelect.addEventListener('change', () => {
            if (recentSelect.value == 'dnt') {
                document.getElementById('recentDonations').classList.add('active');
                document.getElementById('recentUsers').classList.remove('active');
                document.getElementById('recentSponsors').classList.remove('active');
                document.getElementById('recentContact').classList.remove('active');
                document.getElementById('recentHelp').classList.remove('active');
            } else if (recentSelect.value == 'usr') {
                document.getElementById('recentDonations').classList.remove('active');
                document.getElementById('recentUsers').classList.add('active');
                document.getElementById('recentSponsors').classList.remove('active');
                document.getElementById('recentContact').classList.remove('active');
                document.getElementById('recentHelp').classList.remove('active');
            } else if (recentSelect.value == 'spn') {
                document.getElementById('recentDonations').classList.remove('active');
                document.getElementById('recentUsers').classList.remove('active');
                document.getElementById('recentSponsors').classList.add('active');
                document.getElementById('recentContact').classList.remove('active');
                document.getElementById('recentHelp').classList.remove('active');
            } else if (recentSelect.value == 'cnt') {
                document.getElementById('recentDonations').classList.remove('active');
                document.getElementById('recentUsers').classList.remove('active');
                document.getElementById('recentSponsors').classList.remove('active');
                document.getElementById('recentContact').classList.add('active');
                document.getElementById('recentHelp').classList.remove('active');
            } else if (recentSelect.value == 'hlp') {
                document.getElementById('recentDonations').classList.remove('active');
                document.getElementById('recentUsers').classList.remove('active');
                document.getElementById('recentSponsors').classList.remove('active');
                document.getElementById('recentContact').classList.remove('active');
                document.getElementById('recentHelp').classList.add('active');
            }
        });


    }
}

function donationContent() {
    if (document.getElementById('donations')) {
        let valorInputs = document.querySelectorAll('.quantity b');
        let titleNumbers = document.querySelectorAll('.title-number');
        let amounts = document.querySelectorAll('.table-list-amount .list-quantity');

        amounts.forEach(amount => {
            valorInputValue = amount.innerText;

            amount.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();
        });
        titleNumbers.forEach(titleNumber => {
            valorInputValue = titleNumber.innerText;

            titleNumber.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();
        });
        valorInputs.forEach(valorInput => {
            valorInputValue = valorInput.innerText;


            valorInput.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();


        });

        $(document).ready(function() {

            $('#table').DataTable({
                "responsive": true,
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "_MENU_",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Registros _START_ al _END_, total: _TOTAL_",
                    "sInfoEmpty": "Registros del 0 al 0",
                    "sInfoFiltered": "(filtrado del total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "ajax": {
                    "url": "donations-table.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "id" },
                    { "data": "titulo" },
                    { "data": "descripcion" },
                    { "data": "moneda" },
                    { "data": "cantidad_inicial" },
                    { "data": "cantidad_final" },
                    { "data": "estado" },
                    { "data": "fecha" },

                ],
                "dom": 'Bfrtilp',
                "buttons": [{
                    "extend": 'excelHtml5',
                    "text": '<i class="fas fa-file-excel"></i> Exportar a Excel',
                    "titleAttr": 'Exportar tabla a Excel',
                    "className": 'btn-export',
                    "exportOptions": {
                        "modifier": {
                            "page": 'current'
                        }
                    },
                    "excelStyles": {
                        "template": "blue_medium",
                    }
                }]

            });
        });
        let delayed;
        Chart.defaults.color = "#888";
        Chart.defaults.borderColor = "#bbbbbb50";
        Chart.defaults.datasets.bar.barPercentage = 0.5;

        let donationsChart = document.getElementById('donationChart').getContext('2d');

        let donationLabels = ['Ene.', 'Feb.', 'Mar.', 'Abr.', 'Myo.', 'Jun.', 'Jul.', 'Ago.', 'Sep.', 'Oct.', 'Nov.', 'Dic.'];

        let donationsData = {

            label: 'Únicas',
            data: [58, 32, 67, 47, 39, 52, 57, 44, 23, 70, 59, 37],
            backgroundColor: [

                '#ff7b00'
            ],
            radius: 4,
            hitRadius: 20,
            hoverRadius: 7,
            options: {

                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        }
        let monthlyDonationsData = {

            label: 'Mensuales',
            data: [48, 32, 27, 73, 55, 19, 37, 24, 13, 10, 19, 47],
            backgroundColor: [

                '#ff9500'
            ],
            radius: 4,
            hitRadius: 20,
            hoverRadius: 7,
            options: {

                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        }
        let anualDonationsData = {

            label: 'Anuales',
            data: [8, 3, 7, 7, 5, 9, 7, 4, 3, 10, 9, 7],
            backgroundColor: [

                '#ffc300'
            ],

            radius: 4,
            hitRadius: 20,
            hoverRadius: 7,
            options: {

                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        }


        let chartOne = new Chart(donationsChart, {

            type: 'bar',
            data: {
                labels: donationLabels,
                datasets: [

                    donationsData, monthlyDonationsData, anualDonationsData

                ]
            },

            options: {
                scales: {

                    x: {
                        stacked: true,

                    },


                    y: {
                        beginAtZero: true,
                        stacked: true,


                    }
                },

                animation: {

                    onComplete: () => {
                        delayed = true;
                        donationsChart.fillStyle = "#fff"
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === 'data' && context.mode === 'default' && !delayed) {
                            delay = context.dataIndex * 50 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                },

            },


        });
        let frequencyChart = document.getElementById('frequencyDonation').getContext('2d');

        let frequencyLabels = ['Únicas', 'Mensuales', 'Anuales'];
        let frequencyData = {

            data: [2000, 600, 150],
            backgroundColor: [
                '#ff7b00',
                // '#ff9500',
                '#ffaa00',
                '#ffc300',
                // '#ffdd00',
            ],
            borderWidth: 0,
            hoverOffset: 3,

        };

        let chartTwo = new Chart(frequencyChart, {
            type: 'pie',
            data: {
                labels: frequencyLabels,
                datasets: [
                    frequencyData,
                ],

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }

            },

        });

        function loadFlag(element) {
            let imgTag = document.createElement('img');
            imgTag.title = element.innerHTML;
            imgTag.src = `https://flagcdn.com/48x36/${element.innerHTML.toLowerCase()}.png`;

            element.innerHTML = "";
            element.appendChild(imgTag);
        }
        let flagContainers = document.querySelectorAll('.flag');
        flagContainers.forEach(flagContainer => {
            loadFlag(flagContainer);
        });

        listNumbers = document.querySelectorAll('.table-list-number');
        listNumbers.forEach(listNumber => {
            if (listNumber.innerText == "1") {
                img = document.createElement('img');
                img.src = "../img/medal-1.png";
                listNumber.innerHTML = "";
                listNumber.appendChild(img);
            } else if (listNumber.innerText == "2") {
                img = document.createElement('img');
                img.src = "../img/medal-2.png";
                listNumber.innerHTML = "";
                listNumber.appendChild(img);
            } else if (listNumber.innerText == "3") {
                img = document.createElement('img');
                img.src = "../img/medal-3.png";
                listNumber.innerHTML = "";
                listNumber.appendChild(img);
            }
        });
        document.getElementById('topSelect').addEventListener('change', () => {
            if (document.getElementById('topSelect').value == "monthly") {
                document.getElementById('constantDonations').classList.add('active');
                document.getElementById('individualDonations').classList.remove('active');
            } else if (document.getElementById('topSelect').value == "once") {
                document.getElementById('constantDonations').classList.remove('active');
                document.getElementById('individualDonations').classList.add('active');
            }
        });

        document.getElementById('analyticsSelect').addEventListener('change', () => {
            if (document.getElementById('analyticsSelect').value == "months") {
                document.getElementById('permonth').classList.add('active');
                document.getElementById('percountry').classList.remove('active');
            } else if (document.getElementById('analyticsSelect').value == "countrys") {
                document.getElementById('permonth').classList.remove('active');
                document.getElementById('percountry').classList.add('active');
            }
        });


        let tablelists = document.querySelectorAll('.table-list');
        tablelists.forEach(tableList => {

            tableList.addEventListener('scroll', () => {
                if (tableList.offsetHeight + tableList.scrollTop >= tableList.scrollHeight) {
                    tableList.parentElement.parentElement.classList.remove('after');
                } else {
                    tableList.parentElement.parentElement.classList.add('after');

                }
            });


        });


    }
}

function proyectsContent() {
    if (document.getElementById('proyects')) {
        let valorInputs = document.querySelectorAll('.quantity b');
        let titleNumbers = document.querySelectorAll('.title-number');
        let amounts = document.querySelectorAll('.table-list-amount .list-quantity');

        amounts.forEach(amount => {
            valorInputValue = amount.innerText;

            amount.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();
        });
        titleNumbers.forEach(titleNumber => {
            valorInputValue = titleNumber.innerText;

            titleNumber.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();
        });
        valorInputs.forEach(valorInput => {
            valorInputValue = valorInput.innerText;


            valorInput.innerText = valorInputValue
                .replace(/\s/g, '')

            .replace(/\D/g, '')

            .replace(/\D/g, "")

            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                .trim();


        });

        var data = {
            labels: ["Chocolate", "Vanilla", "Strawberry"],
            datasets: [{
                label: "Blue",
                backgroundColor: "blue",
                data: [3, 7, 4]
            }, {
                label: "Red",
                backgroundColor: "red",
                data: [4, 3, 5]
            }, {
                label: "Green",
                backgroundColor: "green",
                data: [7, 2, 6]
            }]
        };
        let delayed;
        Chart.defaults.color = "#888";
        Chart.defaults.borderColor = "#bbbbbb50";
        Chart.defaults.datasets.bar.barPercentage = 0.7;
        Chart.defaults.datasets.bar.categoryPercentage = 0.5;
        Chart.defaults.elements.bar.borderRadius = 5;



        let donationsChart = document.getElementById('proyectsChart').getContext('2d');

        let proyectsLabels = ['Proyecto 1', 'Proyecto 2', 'Proyecto 3'];

        let chartOne = new Chart(donationsChart, {

            type: 'bar',
            data: {
                labels: proyectsLabels,
                datasets: [

                    {
                        label: 'Recaudado',
                        data: [12065, 32332, 67443],
                        backgroundColor: [

                            '#ff700f'
                        ],
                        radius: 4,
                        hitRadius: 20,
                        hoverRadius: 7,
                        options: {

                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    }, {
                        label: 'Meta',
                        data: [80554, 35632, 97455],
                        backgroundColor: [

                            '#ff9500'
                        ],
                        radius: 4,
                        hitRadius: 20,
                        hoverRadius: 7,
                        options: {

                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    },

                ]
            },

            options: {
                barValueSpacing: 5,
                scales: {

                    y: {
                        beginAtZero: true,
                    }
                },

                animation: {

                    onComplete: () => {
                        delayed = true;
                        donationsChart.fillStyle = "#fff"
                    },
                    delay: (context) => {
                        let delay = 0;
                        if (context.type === 'data' && context.mode === 'default' && !delayed) {
                            delay = context.dataIndex * 50 + context.datasetIndex * 100;
                        }
                        return delay;
                    },
                },

            },


        });

        $(document).ready(function() {

            $('#table').DataTable({
                "responsive": true,
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "_MENU_",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Registros _START_ al _END_, total: _TOTAL_",
                    "sInfoEmpty": "Registros del 0 al 0",
                    "sInfoFiltered": "(filtrado del total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                "ajax": {
                    "url": "donations-table.php",
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "id" },
                    { "data": "titulo" },
                    { "data": "descripcion" },
                    { "data": "moneda" },
                    { "data": "cantidad_inicial" },
                    { "data": "cantidad_final" },
                    { "data": "estado" },
                    { "data": "fecha" },

                ],
                "dom": 'Bfrtilp',
                "buttons": [{
                    "extend": 'excelHtml5',
                    "text": '<i class="fas fa-file-excel"></i> Exportar a Excel',
                    "titleAttr": 'Exportar tabla a Excel',
                    "className": 'btn-export',
                    "exportOptions": {
                        "modifier": {
                            "page": 'current'
                        }
                    },
                    "excelStyles": {
                        "template": "blue_medium",
                    }
                }]

            });
        });

        function createProyect() {
            const form = document.getElementById('form-proyect');
            const formData = new FormData(form);
            const xhttp = new XMLHttpRequest();



            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector(".input-img").classList.remove("error");
                    document.querySelector(".input-title").classList.remove("error");
                    document.querySelector(".input-description").classList.remove("error");
                    document.querySelector(".input-initial").classList.remove("error");
                    document.querySelector(".input-final").classList.remove("error");

                    document.querySelector(".input-img").classList.add("success");
                    document.querySelector(".input-title").classList.add("success");
                    document.querySelector(".input-description").classList.add("success");
                    document.querySelector(".input-initial").classList.add("success");
                    document.querySelector(".input-final").classList.add("success");

                    document.getElementById('smallTitle').innerHTML = "";
                    document.getElementById('smallDescription').innerHTML = "";
                    document.getElementById('smallImg').innerHTML = "";
                    document.getElementById('smallInitial').innerHTML = "";
                    document.getElementById('smallFinal').innerHTML = "";

                    document.getElementById('response').innerHTML = this.responseText;

                }

                if (xhttp.responseText.indexOf("<script>") > -1) {
                    var x = xhttp.responseText.indexOf("<script>") + "<script>".length;
                    var y = xhttp.responseText.indexOf("</script>") - x;
                    eval(xhttp.responseText.substr(x, y));
                }
            };


            xhttp.open('POST', '../php/new-proyect.php');

            xhttp.send(formData);

        }
        document.getElementById('btnProyect').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('btnProyect').innerHTML = '<i class="fas fa-spinner icon loading"></i>';
            createProyect();
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


        let initial = document.getElementById('initial');
        initial.addEventListener('keyup', (e) => {
            let valorInput = e.target.value;

            initial.value = valorInput
                // Eliminamos espacios en blanco
                .replace(/\s/g, '')
                // Eliminar las letras
                .replace(/\D/g, '')
                // Ponemos espacio cada cuatro numeros
                .replace(/\D/g, "")


            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                // Elimina el ultimo espaciado
                .trim();

        });
        let final = document.getElementById('final');
        final.addEventListener('keyup', (e) => {
            let valorInput = e.target.value;

            final.value = valorInput
                // Eliminamos espacios en blanco
                .replace(/\s/g, '')
                // Eliminar las letras
                .replace(/\D/g, '')
                // Ponemos espacio cada cuatro numeros
                .replace(/\D/g, "")


            .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                // Elimina el ultimo espaciado
                .trim();

        });

        document.getElementById('close-donation').addEventListener('click', () => {
            document.getElementById('cookie-shadow').classList.remove('active');
            document.getElementById('close-donation').classList.remove('active');
            document.querySelector('.banner-create').classList.remove('active');
        });
        document.getElementById('create-proyect').addEventListener('click', () => {
            document.getElementById('cookie-shadow').classList.add('active');
            document.getElementById('close-donation').classList.add('active');
            document.querySelector('.banner-create').classList.add('active');
        });
    }
}
proyectsContent();