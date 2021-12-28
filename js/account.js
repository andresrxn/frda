document.addEventListener('DOMEventListener', mostrarSaludo);

function mostrarSaludo() {
    let titleImg = document.getElementById('title-img');
    let fecha = new Date();
    let hora = fecha.getHours();

    if (hora >= 0 && hora < 12) {
        texto = "Buenos Días";
        titleImg.src = "img/svg/dia.svg"
    }

    if (hora >= 12 && hora < 18) {
        texto = "Buenas Tardes";
        titleImg.src = "img/svg/tarde.svg"
    }

    if (hora >= 18 && hora < 24) {
        texto = "Buenas Noches";
        titleImg.src = "img/svg/noche.svg"
    }


    document.getElementById('salute').innerHTML = texto;

}

function accordionOptions() {

    const accordionItemHeaders = document.querySelectorAll(".menu-account-header");

    accordionItemHeaders.forEach(accordionItemHeader => {
        accordionItemHeader.addEventListener("click", event => {

            accordionItemHeader.classList.toggle("active");
            const accordionItemBody = accordionItemHeader.nextElementSibling;
            // if (accordionItemHeader.classList.contains("active")) {
            //     accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";

            // } else {
            //     accordionItemBody.style.maxHeight = 0;

            // }

        });
    });
}
accordionOptions();

const menuTitle = document.getElementById('menu-title');
let menuOptions = document.querySelectorAll('.menu-account-options-content');
menuOptions.forEach(menuOption => {
    menuOption.addEventListener('click', () => {
        menuTitle.innerHTML = menuOption.innerHTML;

        const accordionItemHeader = document.querySelector(".menu-account-header");

        accordionItemHeader.classList.remove('active');
        window.scrollTo({
            top: 0,

        });


    });
});

let profile = document.getElementById('profile');
let suscriptions = document.getElementById('suscriptions');
let history = document.getElementById('history');
let saved = document.getElementById('saved');
let favorited = document.getElementById('favorited');
let security = document.getElementById('security');

function link(url) {
    goTo("user/" + url + ".php");
}

function goTo(page) {
    document.getElementById('response-content').innerHTML = "";

    const xhttpAccount = new XMLHttpRequest();

    document.getElementById('response-content').classList.remove('mostrarArriba');
    document.getElementById('response-content').classList.remove('animated');
    xhttpAccount.onload = function() {


        document.getElementById('response-content').innerHTML = this.responseText;
        document.getElementById('response-content').classList.add('mostrarArriba');
        document.getElementById('response-content').classList.add('animated');

        if (document.getElementById('response-profile')) {
            profileContent();
        } else if (document.getElementById('response-history')) {
            historyContent();
        } else if (document.getElementById('response-suscriptions')) {
            suscriptionsContent();
        } else if (document.getElementById('response-saved-proyects')) {
            proyectContent();
        } else if (document.getElementById('response-favorited')) {
            newsContent();
        } else if (document.getElementById('response-security')) {
            securityContent();
        }

    }

    xhttpAccount.open('GET', page);
    xhttpAccount.send();

}
link('profile');


let menuOptionsContainer = document.querySelector('.menu-account-options');
menuOptionsContainer.addEventListener('click', (e) => {
    checkMenuOptions();

    if (e.target == profile) {
        link("profile");
    } else if (e.target == history) {
        link("history");
    } else if (e.target == suscriptions) {
        link("suscriptions");
    } else if (e.target == saved) {
        link("saved");
    } else if (e.target == favorited) {
        link("favorited");
    } else if (e.target == security) {
        link("security");
    }

});

let list = document.querySelectorAll('.menu-account-options-content');
for (let [i, cv] of list.entries()) {
    cv.addEventListener('click', (e) => {
        resetFocus();
        cv.classList.toggle("active");

    })
}

function resetFocus() {
    list.forEach(el => el.classList.remove("active"));
}

function checkMenuOptions() {
    let menuOptions = document.querySelectorAll('.menu-account-options-content');

    menuOptions.forEach(menuOption => {

        if (menuOption.innerText == menuTitle.innerText) {
            menuOption.style.display = "none";

        } else {
            menuOption.style.display = "block";


        }
    });
}
checkMenuOptions();


function profileContent() {
    if (document.getElementById('response-profile')) {


        let countryInitial = document.getElementById('responseCountry').innerText;
        document.querySelector("#country #" + countryInitial).setAttribute("selected", true);


        if (document.getElementById('card-empty')) {
            document.getElementById('card-empty').addEventListener('click', () => {
                document.getElementById('new-card').classList.add('active');
                document.getElementById('close-donation').classList.add('active');
                document.getElementById('shadow-content').classList.add('active');

            });

            function cancelCardEmpty() {
                document.getElementById('new-card').classList.remove('active');
                document.getElementById('form-new-card').reset();
                document.getElementById('close-donation').classList.remove('active');
                document.getElementById('shadow-content').classList.remove('active');

                let formControls = document.querySelectorAll('#form-new-card .form-control');

                formControls.forEach(formControl => {
                    formControl.classList.remove('error');
                    formControl.classList.remove('success');
                });

                let formSmalls = document.querySelectorAll('#form-new-card small');

                formSmalls.forEach(formSmall => {
                    formSmall.innerHTML = "";
                });

                let formInputs = document.querySelectorAll('#form-new-card input');

                formInputs.forEach(formInput => {
                    formInput.value = "";
                });
                let smallImg = document.querySelector('#small-card img');
                smallImg.src = 'img/svg/small-card.svg';

                document.getElementById('btn-new-card').innerHTML = 'Agregar';
            }
            document.getElementById('close-donation').addEventListener('click', cancelCardEmpty);
            document.getElementById('shadow-content').addEventListener('click', cancelCardEmpty);

            document.getElementById('btn-new-card').addEventListener('click', (e) => {
                e.preventDefault();
                document.getElementById('btn-new-card').classList.add('disabled');
                document.getElementById('btn-new-card').innerHTML = '<i class="fas fa-spinner icon loading"></i>';

                let form = document.getElementById('form-new-card');

                const formDataP = new FormData(form);

                const xhttpPersonal = new XMLHttpRequest();

                xhttpPersonal.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        inputNameCard.parentElement.classList.remove('error');
                        inputNumberCard.parentElement.classList.remove('error');
                        ccvCard.parentElement.classList.remove('error');


                        inputNameCard.parentElement.classList.add('success');
                        inputNumberCard.parentElement.classList.add('success');
                        ccvCard.parentElement.classList.add('success');


                        document.getElementById('smallNameCard').innerHTML = "";
                        document.getElementById('smallLastname').innerHTML = "";
                        document.getElementById('smallCcvCard').innerHTML = "";



                        let response = document.getElementById('card-response');
                        response.innerHTML = '';
                        const script = document.createElement('script');
                        script.innerHTML = this.responseText;
                        response.appendChild(script);



                    }

                    if (xhttpPersonal.responseText.indexOf("<script>") > -1) {
                        var x = xhttpPersonal.responseText.indexOf("<script>") + "<script>".length;
                        var y = xhttpPersonal.responseText.indexOf("</script>") - x;
                        eval(xhttpPersonal.responseText.substr(x, y));
                    }
                };


                xhttpPersonal.open('POST', './php/verifyNewCard.php');

                xhttpPersonal.send(formDataP);
            });
            inputNumberCard.addEventListener('keyup', (e) => {
                let valorInput = e.target.value;

                inputNumberCard.value = valorInput
                    // Eliminamos espacios en blanco
                    .replace(/\s/g, '')
                    // Eliminar las letras
                    .replace(/\D/g, '')
                    // Ponemos espacio cada cuatro numeros
                    .replace(/([0-9]{4})/g, '$1 ')
                    // Elimina el ultimo espaciado
                    .trim();

                let smallImg = document.querySelector('#small-card img');
                let visaPattern = /^4[0-9]{12}(?:[0-9]{3})?$/;
                let masterPattern = /^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/;

                let normalNumberCard = valorInput.replace(/ /g, "");

                if (normalNumberCard[0] == 4) {

                    if (normalNumberCard.match(visaPattern)) {
                        smallImg.classList.add('opacity');
                        smallImg.classList.add('animated');
                        smallImg.src = 'img/svg/small-visa.svg';


                    } else {
                        smallImg.classList.remove('opacity');
                        smallImg.classList.remove('animated');
                        smallImg.src = 'img/svg/small-card.svg';
                    }
                } else if (normalNumberCard[0] == 5) {

                    if (normalNumberCard.match(masterPattern)) {
                        smallImg.classList.add('opacity');
                        smallImg.classList.add('animated');
                        smallImg.src = 'img/svg/small-mastercard.svg';
                    } else {
                        smallImg.classList.remove('opacity');
                        smallImg.classList.remove('animated');
                        smallImg.src = 'img/svg/small-card.svg';
                    }

                } else {
                    smallImg.classList.add('opacity');
                    smallImg.classList.add('animated');
                    smallImg.src = 'img/svg/small-card-error.svg';

                }
                if (valorInput == '') {
                    smallImg.classList.remove('opacity');
                    smallImg.classList.remove('animated');
                    smallImg.src = 'img/svg/small-card.svg';
                }

            });


        }
        // let inputId = document.getElementById('inputId');
        let inputName = document.getElementById('inputName');
        let inputLastname = document.getElementById('inputLastname');
        let inputEmail = document.getElementById('inputEmail');
        let inputPhone = document.getElementById('inputPhone');
        let inputCountry = document.getElementById('country');
        let btnEditar = document.getElementById('btnEditar');
        let editInfo = document.getElementById('editInfo');



        function updatePersonal() {
            const personal = document.getElementById('form-account');
            const formDataPersonal = new FormData(personal);
            const xhttpPersonal = new XMLHttpRequest();



            xhttpPersonal.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    inputEmail.parentElement.classList.remove("error");
                    inputName.parentElement.classList.remove("error");
                    inputLastname.parentElement.classList.remove("error");
                    inputPhone.parentElement.classList.remove("error");

                    inputEmail.parentElement.classList.add("success");
                    inputName.parentElement.classList.add("success");
                    inputLastname.parentElement.classList.add("success");
                    inputPhone.parentElement.classList.add("success");

                    document.getElementById('smallEmail').innerHTML = "";
                    document.getElementById('smallName').innerHTML = "";
                    document.getElementById('smallLastname').innerHTML = "";
                    document.getElementById('smallPhone').innerHTML = "";


                    document.getElementById('responseAccount').innerHTML = this.responseText;

                }

                if (xhttpPersonal.responseText.indexOf("<script>") > -1) {
                    var x = xhttpPersonal.responseText.indexOf("<script>") + "<script>".length;
                    var y = xhttpPersonal.responseText.indexOf("</script>") - x;
                    eval(xhttpPersonal.responseText.substr(x, y));
                }
            };


            xhttpPersonal.open('POST', './user/update-account.php');

            xhttpPersonal.send(formDataPersonal);



        }
        btnEditar.addEventListener('click', (e) => {
            e.preventDefault();
            btnEditar.classList.add('disabled');
            btnEditar.innerHTML = '<i class="fas fa-spinner icon loading"></i>';
            updatePersonal();
        });

        editInfo.addEventListener('click', () => {
            // inputEmail.parentElement.classList.toggle('disable');
            inputName.parentElement.classList.toggle('disable');
            inputLastname.parentElement.classList.toggle('disable');
            inputPhone.parentElement.classList.toggle('disable');
            inputCountry.parentElement.classList.toggle('disable');
            inputEmail.parentElement.classList.toggle('disable');
            btnEditar.parentElement.classList.toggle('disable');


            if (editInfo.innerText == "[Editar]") {
                editInfo.innerText = "[Cancelar]";
                btnEditar.parentElement.classList.add('opacity');
                btnEditar.parentElement.classList.add('animated');
            } else {
                document.getElementById('form-account').reset();
                editInfo.innerText = "[Editar]";
                btnEditar.parentElement.classList.remove('opacity');
                btnEditar.parentElement.classList.remove('animated');

                inputName.parentElement.classList.remove('error');
                inputLastname.parentElement.classList.remove('error');
                inputPhone.parentElement.classList.remove('error');
                inputEmail.parentElement.classList.remove('error');

                inputName.parentElement.classList.remove('success');
                inputLastname.parentElement.classList.remove('success');
                inputPhone.parentElement.classList.remove('success');
                inputEmail.parentElement.classList.remove('success');
            }


        });

        function loadFlag() {

            let flagContainer = document.querySelector('#flex-country .flag');

            let flagName = document.querySelector('#form-account #flex-country .input-subject #country').value;
            flagContainer.title = flagName;
            flagContainer.src = `https://flagcdn.com/48x36/${flagName.toLowerCase()}.png`;
            console.log(flagContainer)


        }
        loadFlag();
        document.querySelector('#form-account #flex-country .input-subject #country').addEventListener('change', loadFlag);

    }
}

function historyContent() {
    if (document.getElementById('response-history')) {
        if (document.getElementById('history-container')) {
            let amounts = document.querySelectorAll('.history-amount span');


            amounts.forEach(amount => {
                valorInputValue = amount.innerText;

                amount.innerText = valorInputValue
                    .replace(/\s/g, '')

                .replace(/\D/g, '')

                .replace(/\D/g, "")

                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                    .trim();
            });

        }
        document.querySelector('#refund p').addEventListener('click', () => {
            document.getElementById('refund-content').classList.add('active');
            document.getElementById('shadow-content').classList.add('active');
            document.getElementById('close-donation').classList.add('active');
        })
        document.getElementById('close-donation').addEventListener('click', () => {
            document.getElementById('refund-content').classList.remove('active');
            document.getElementById('shadow-content').classList.remove('active');
            document.getElementById('close-donation').classList.remove('active');
            document.getElementById('recipe-history').classList.remove('active');
        })
        document.getElementById('shadow-content').addEventListener('click', () => {
            document.getElementById('refund-content').classList.remove('active');
            document.getElementById('shadow-content').classList.remove('active');
            document.getElementById('close-donation').classList.remove('active');
            document.getElementById('recipe-history').classList.remove('active');
        })
        let historyCards = document.querySelectorAll('.history-card');
        historyCards.forEach(historyCard => {
            historyCard.addEventListener('click', () => {
                document.getElementById('recipe-history').classList.add('active');
                document.getElementById('shadow-content').classList.add('active');
                document.getElementById('close-donation').classList.add('active');
            });
        });

        function loadFlag(element) {
            let imgTag = document.createElement('img');
            imgTag.title = element.innerHTML;
            imgTag.src = `https://flagcdn.com/48x36/${element.innerHTML.toLowerCase()}.png`;

            element.innerHTML = "";
            element.appendChild(imgTag);
        }
        let flagContainers = document.querySelectorAll('#recipe-history .flag');
        flagContainers.forEach(flagContainer => {

            if (flagContainer.innerText != "") {

                loadFlag(flagContainer);
            }
        });
    }
}

function suscriptionsContent() {
    if (document.getElementById('response-suscriptions')) {
        if (document.getElementById('suscriptions-container')) {
            let amounts = document.querySelectorAll('.suscriptions-amount span');

            let recipeAmounts = document.querySelectorAll('.recipe-amount span');
            recipeAmounts.forEach(amount => {
                valorInputValue = amount.innerText;

                amount.innerText = valorInputValue
                    .replace(/\s/g, '')

                .replace(/\D/g, '')

                .replace(/\D/g, "")

                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
                    .trim();
            });

            document.querySelector('#refund p').addEventListener('click', () => {
                document.getElementById('refund-content').classList.add('active');
                document.getElementById('shadow-content').classList.add('active');
                document.getElementById('close-donation').classList.add('active');
            })
            document.getElementById('close-donation').addEventListener('click', () => {
                document.getElementById('refund-content').classList.remove('active');
                document.getElementById('shadow-content').classList.remove('active');
                document.getElementById('close-donation').classList.remove('active');
                document.getElementById('recipe-suscriptions').classList.remove('active');
            })
            document.getElementById('shadow-content').addEventListener('click', () => {
                document.getElementById('refund-content').classList.remove('active');
                document.getElementById('shadow-content').classList.remove('active');
                document.getElementById('close-donation').classList.remove('active');
                document.getElementById('recipe-suscriptions').classList.remove('active');
            })
            let suscriptionsCards = document.querySelectorAll('.suscriptions-card');
            suscriptionsCards.forEach(suscriptionsCard => {
                suscriptionsCard.addEventListener('click', () => {
                    document.getElementById('recipe-suscriptions').classList.add('active');
                    document.getElementById('shadow-content').classList.add('active');
                    document.getElementById('close-donation').classList.add('active');
                });
            });

            function loadFlag(element) {
                let imgTag = document.createElement('img');
                imgTag.title = element.innerHTML;
                imgTag.src = `https://flagcdn.com/48x36/${element.innerHTML.toLowerCase()}.png`;

                element.innerHTML = "";
                element.appendChild(imgTag);
            }
            let flagContainers = document.querySelectorAll('.recipe-suscriptions .flag');
            flagContainers.forEach(flagContainer => {

                if (flagContainer.innerText != "") {

                    loadFlag(flagContainer);
                }
            });
        }
    }
}

function proyectContent() {
    if (document.getElementById('response-saved-proyects')) {

        if (document.querySelectorAll('.lazy-proyect')) {
            let images = document.querySelectorAll('.lazy-proyect');
            let options = {
                threshold: 0.15
            };

            let observer = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    const image = entry.target;
                    image.src = image.src.replace('preview-img', 'nuestros-proyectos/img');
                    observer.unobserve(image);
                });
            }, options);

            images.forEach((image) => {
                observer.observe(image);
            });
        }

        var progressElement = document.getElementsByClassName("progressAnimation");

        for (var i = 0; i < progressElement.length; i++) { // create a scene for each element
            new ScrollMagic.Scene({
                    triggerElement: progressElement[i], // 
                    reverse: false,
                    triggerHook: 0.95,
                })
                .setClassToggle(progressElement[i], "animated")

            .addTo(controller);
        }
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

            xhttp.open('POST', './php/save-proyect.php');

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
    }
}

function newsContent() {
    if (document.getElementById('response-favorited')) {
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

            xhttp.open('POST', './php/save-news.php');

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

        if (document.querySelectorAll('.lazy-news')) {
            let images = document.querySelectorAll('.lazy-news');
            let options = {
                threshold: 0.15
            };

            let observer = new IntersectionObserver((entries, observer) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    const image = entry.target;
                    image.src = image.src.replace('preview-img', 'noticias/img');
                    observer.unobserve(image);
                });
            }, options);

            images.forEach((image) => {
                observer.observe(image);
            });
        }
    }
}

function securityContent() {
    if (document.getElementById('response-security')) {
        let inputPassword = document.getElementById('inputPassword');
        let inputNewPassword = document.getElementById('inputNewPassword');
        let btnPass = document.querySelector('#form-pass button');
        let editPass = document.getElementById('editPass');
        let editFormControl = document.querySelector('#form-pass .input-submit');


        function cancelPass() {
            editPass.innerText = "[Cambiar]";

            let formControls = document.querySelectorAll('#form-pass .form-control');

            formControls.forEach(formControl => {
                formControl.classList.remove('error');
                formControl.classList.remove('success');
            });

            let formSmalls = document.querySelectorAll('#form-pass small');

            formSmalls.forEach(formSmall => {
                formSmall.innerHTML = "";
            });

            let formInputs = document.querySelectorAll('#form-pass input');

            formInputs.forEach(formInput => {
                formInput.value = "";
            });


            btnPass.innerHTML = 'Cambiar';
            btnPass.style.background = "var(--celeste-oscuro)";
            editFormControl.classList.add('disable');
            document.getElementById('form-pass').reset();
            editPass.innerText = "[Cambiar]";
            editFormControl.classList.remove('opacity');
            editFormControl.classList.remove('animated');

        }

        editPass.addEventListener('click', () => {

            inputPassword.parentElement.classList.toggle('disable');
            inputNewPassword.parentElement.classList.toggle('disable');
            // btnPass.parentElement.classList.toggle('disable');


            if (editPass.innerText == "[Cambiar]") {
                editPass.innerText = "[Cancelar]";
                editFormControl.classList.add('opacity');
                editFormControl.classList.add('animated');
                editFormControl.classList.remove('disable')


            } else {

                cancelPass();

            }


        });

        let showPass = document.querySelector('#form-pass .show-pass');
        let showNewPass = document.querySelector('.show-newpass');
        let showNewPassTwo = document.querySelector('.show-new-pass');
        let showConfirmPass = document.querySelector('.show-confirm-pass');

        showPass.addEventListener('click', () => {
            let inputPassword = document.getElementById('inputPassword');


            inputPassword.classList.toggle('show');

            if (inputPassword.classList.contains('show')) {
                inputPassword.type = 'text';
                showPass.innerHTML = ' <i class="far fa-eye icon"></i>'
            } else {
                inputPassword.type = 'password';
                showPass.innerHTML = ' <i class="far fa-eye-slash icon"></i>'
            }

        });

        showNewPass.addEventListener('click', () => {
            let inputNewPassword = document.getElementById('inputNewPassword');


            inputNewPassword.classList.toggle('show');

            if (inputNewPassword.classList.contains('show')) {
                inputNewPassword.type = 'text';
                showNewPass.innerHTML = ' <i class="far fa-eye icon"></i>'
            } else {
                inputNewPassword.type = 'password';
                showNewPass.innerHTML = ' <i class="far fa-eye-slash icon"></i>'
            }

        });

        showNewPassTwo.addEventListener('click', () => {
            let inputNewPasswordTwo = document.getElementById('new-pass');


            inputNewPasswordTwo.classList.toggle('show');

            if (inputNewPasswordTwo.classList.contains('show')) {
                inputNewPasswordTwo.type = 'text';
                showNewPassTwo.innerHTML = ' <i class="far fa-eye icon"></i>'
            } else {
                inputNewPasswordTwo.type = 'password';
                showNewPassTwo.innerHTML = ' <i class="far fa-eye-slash icon"></i>'
            }

        });

        showConfirmPass.addEventListener('click', () => {
            let inputConfirmPassword = document.getElementById('confirm-pass');


            inputConfirmPassword.classList.toggle('show');

            if (inputConfirmPassword.classList.contains('show')) {
                inputConfirmPassword.type = 'text';
                showConfirmPass.innerHTML = ' <i class="far fa-eye icon"></i>'
            } else {
                inputConfirmPassword.type = 'password';
                showConfirmPass.innerHTML = ' <i class="far fa-eye-slash icon"></i>'
            }

        });

        function updatePass() {
            const account = document.getElementById('form-pass');
            const formDataAccount = new FormData(account);
            const xhttpAccount = new XMLHttpRequest();



            xhttpAccount.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    inputPassword.parentElement.classList.remove("error");
                    inputNewPassword.parentElement.classList.remove("error");


                    inputPassword.parentElement.classList.add("success");
                    inputNewPassword.parentElement.classList.add("success");


                    document.getElementById('smallPassword').innerHTML = "";
                    document.getElementById('smallNewPassword').innerHTML = "";



                    document.getElementById('responseSecurity').innerHTML = this.responseText;

                }

                if (xhttpAccount.responseText.indexOf("<script>") > -1) {
                    var x = xhttpAccount.responseText.indexOf("<script>") + "<script>".length;
                    var y = xhttpAccount.responseText.indexOf("</script>") - x;
                    eval(xhttpAccount.responseText.substr(x, y));
                }
            };


            xhttpAccount.open('POST', './user/update-pass.php');

            xhttpAccount.send(formDataAccount);



        }
        btnPass.addEventListener('click', (e) => {
            e.preventDefault();
            btnPass.classList.add('disabled');
            btnPass.innerHTML = '<i class="fas fa-spinner icon loading"></i>';
            updatePass();
        });

        function sendCode() {
            const account = document.getElementById('form-forgot-pass');
            const formForgot = new FormData(account);
            const xhttpForgot = new XMLHttpRequest();


            xhttpForgot.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    // inputPassword.parentElement.classList.remove("error");
                    // inputNewPassword.parentElement.classList.remove("error");

                    // inputPassword.parentElement.classList.add("success");
                    // inputNewPassword.parentElement.classList.add("success");

                    // document.getElementById('smallPassword').innerHTML = "";
                    // document.getElementById('smallNewPassword').innerHTML = "";

                    document.getElementById('responseForgot').innerHTML = this.responseText;

                }

                if (xhttpForgot.responseText.indexOf("<script>") > -1) {
                    var x = xhttpForgot.responseText.indexOf("<script>") + "<script>".length;
                    var y = xhttpForgot.responseText.indexOf("</script>") - x;
                    eval(xhttpForgot.responseText.substr(x, y));
                }
            };

            xhttpForgot.open('POST', './user/send-email-password-user.php');

            xhttpForgot.send(formForgot);

        }

        function validarCodigo() {

            const emailForm = document.getElementById('form-email');
            const formDataCode = new FormData(emailForm);
            const xhttpCode = new XMLHttpRequest();

            xhttpCode.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    document.querySelector(".input-code").classList.remove("error");

                    document.querySelector(".input-code").classList.add("success");

                    document.getElementById('smallCode').innerHTML = "";

                }

                let response = document.getElementById('card-response');
                response.innerHTML = '';
                const script = document.createElement('script');
                script.innerHTML = this.responseText;
                response.appendChild(script);

                if (xhttpCode.responseText.indexOf("<script>") > -1) {
                    var x = xhttpCode.responseText.indexOf("<script>") + "<script>".length;
                    var y = xhttpCode.responseText.indexOf("</script>") - x;
                    eval(xhttpCode.responseText.substr(x, y));
                }
            };

            xhttpCode.open('POST', './user/enter-code-user.php');


            xhttpCode.send(formDataCode);

        }

        function cambiarContraseña() {

            const emailForm = document.getElementById('form-email');
            const formDataPass = new FormData(emailForm);
            const xhttpPass = new XMLHttpRequest();

            xhttpPass.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    document.querySelector(".input-new-pass").classList.remove("error");
                    document.querySelector(".input-confirm-pass").classList.remove("error");

                    document.querySelector(".input-new-pass").classList.add("success");
                    document.querySelector(".input-confirm-pass").classList.add("success");

                    document.getElementById('smallNewPass').innerHTML = "";
                    document.getElementById('smallConfirmPass').innerHTML = "";

                }

                let response = document.getElementById('card-response');
                response.innerHTML = '';
                const script = document.createElement('script');
                script.innerHTML = this.responseText;
                response.appendChild(script);

                if (xhttpPass.responseText.indexOf("<script>") > -1) {
                    var x = xhttpPass.responseText.indexOf("<script>") + "<script>".length;
                    var y = xhttpPass.responseText.indexOf("</script>") - x;
                    eval(xhttpPass.responseText.substr(x, y));
                }
            };

            xhttpPass.open('POST', './user/create-new-password-user.php');


            xhttpPass.send(formDataPass);

        }

        function deleteAccount() {

            const deleteForm = document.getElementById('form-delete-account');
            const formDataDelete = new FormData(deleteForm);
            const xhttpDelete = new XMLHttpRequest();

            xhttpDelete.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    document.querySelector(".input-new-pass").classList.remove("error");
                    document.querySelector(".input-confirm-pass").classList.remove("error");

                    document.querySelector(".input-new-pass").classList.add("success");
                    document.querySelector(".input-confirm-pass").classList.add("success");

                    document.getElementById('smallNewPass').innerHTML = "";
                    document.getElementById('smallConfirmPass').innerHTML = "";

                }

                let response = document.getElementById('responseDelete');
                response.innerHTML = '';
                const script = document.createElement('script');
                script.innerHTML = this.responseText;
                response.appendChild(script);

                if (xhttpDelete.responseText.indexOf("<script>") > -1) {
                    var x = xhttpDelete.responseText.indexOf("<script>") + "<script>".length;
                    var y = xhttpDelete.responseText.indexOf("</script>") - x;
                    eval(xhttpDelete.responseText.substr(x, y));
                }
            };

            xhttpDelete.open('POST', './user/delete-account.php');


            xhttpDelete.send(formDataDelete);

        }


        document.getElementById('btnSendCode').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('btnSendCode').classList.add('disabled');
            document.getElementById('btnSendCode').innerHTML = '<i class="fas fa-spinner icon loading"></i>';
            sendCode();
        });

        document.getElementById('btnCode').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('btnCode').innerHTML = '<i class="fas fa-spinner icon loading"></i>';

            validarCodigo();
        });
        document.getElementById('btnPass').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('btnPass').innerHTML = '<i class="fas fa-spinner icon loading"></i>';

            cambiarContraseña();
        });

        document.getElementById('btnClose').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('btnClose').innerHTML = '<i class="fas fa-spinner icon loading"></i>';

            cancelarForgot();
        });

        document.getElementById('btnDelete').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('delete-account').classList.add('active');
            document.getElementById('shadow-content').classList.add('active');

        });

        document.getElementById('btnCancelDelete').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('delete-account').classList.remove('active');
            document.getElementById('shadow-content').classList.remove('active');

        });

        document.getElementById('btnDeleteAccount').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('btnDeleteAccount').classList.add('disabled');
            document.getElementById('btnDeleteAccount').innerHTML = '<i class="fas fa-spinner icon loading"></i>';
            deleteAccount();
        });

        function cancelarForgot() {

            document.getElementById('enter-email').classList.remove('active');
            document.getElementById('step-email-two').classList.remove('active');
            document.getElementById('step-email-three').classList.remove('active');
            document.getElementById('step-email-four').classList.remove('active');

            let formControls = document.querySelectorAll('.enter-email .form-control');

            formControls.forEach(formControl => {
                formControl.classList.remove('error');
                formControl.classList.remove('success');
            });

            let formSmalls = document.querySelectorAll('.enter-email small');

            formSmalls.forEach(formSmall => {
                formSmall.innerHTML = "";
            });

            let formInputs = document.querySelectorAll('.enter-email input');

            formInputs.forEach(formInput => {
                formInput.value = "";
            });


            document.getElementById('btnCode').innerHTML = 'Hecho';
            document.getElementById('btnPass').innerHTML = 'Cambiar Contraseña';
            document.getElementById('btnClose').innerHTML = 'Aceptar';

            let cookieShadow = document.getElementById('shadow-content');

            if (document.getElementById('delete-account').classList.contains('active')) {
                cookieShadow.classList.add('active');

            } else {
                cookieShadow.classList.remove('active');

            }

            document.getElementById('close-donation').classList.remove('active');
        }

        document.getElementById('shadow-content').addEventListener('click', cancelarForgot);
        document.getElementById('close-donation').addEventListener('click', cancelarForgot);

    }
}