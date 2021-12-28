document.addEventListener('DOMContentLoaded', () => {

    window.scrollTo({
        top: 0,

    });

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
if (document.getElementById('donate-proyect')) {

    document.getElementById('donate-proyect').addEventListener('click', () => {
        document.querySelector('.step-one').classList.add('active');
        document.getElementById('cookie-shadow').classList.add('active');
        document.getElementById('donation-container').classList.add('active');
        document.getElementById('close-donation').classList.add('active');

    });
}

function loadFlag() {

    let flagContainer = document.querySelector('.flag');


    let flagName = document.getElementById('country').value;
    flagContainer.title = flagName;
    flagContainer.src = `https://flagcdn.com/48x36/${flagName.toLowerCase()}.png`;


}
document.getElementById('country').addEventListener('change', loadFlag);

function cancelCard() {
    document.getElementById('share-container').classList.remove('active');
    document.getElementById('donation-container').classList.remove('active');
    document.getElementById('close-donation').classList.remove('active');
    document.getElementById('cookie-shadow').classList.remove('active');

    document.querySelector('.step-one').classList.remove('active');
    document.querySelector('.step-two').classList.remove('active');
    document.querySelector('.step-three').classList.remove('active');

    let formControls = document.querySelectorAll('#donation-container .form-control');

    formControls.forEach(formControl => {
        formControl.classList.remove('error');
        formControl.classList.remove('success');
    });

    let formSmalls = document.querySelectorAll('#donation-container small');

    formSmalls.forEach(formSmall => {
        formSmall.innerHTML = "";
    });

    let formInputs = document.querySelectorAll('#donation-container input');

    formInputs.forEach(formInput => {
        formInput.value = "";
    });

    validateQuantity.innerHTML = 'Siguiente';
    validatePersonal.innerHTML = 'Continuar';
    validateCredit.innerHTML = 'Donar Ahora';

}
document.getElementById('close-donation').addEventListener('click', cancelCard);
document.getElementById('cookie-shadow').addEventListener('click', cancelCard);

document.addEventListener("scroll", () => {
    const checkpoint = 350;
    const currentScroll = window.pageYOffset;
    let animation;
    let scale;
    if (currentScroll < checkpoint) {
        animation = 0 + currentScroll / 100 + 0.05;

    }
    if (currentScroll < checkpoint) {
        scale = 1 + currentScroll / 1200;

    }
    document.getElementById("p-img").style.filter = `blur(${animation + 'px'})`;
    document.getElementById("p-img").style.transform = `scale(${scale})`;


    if (currentScroll >= 250) {
        // document.querySelector('.state').style.opacity = 0;
        document.querySelector('.save-proyect').classList.add('hide');
    } else {
        // document.querySelector('.state').style.opacity = 1;
        document.querySelector('.save-proyect').classList.remove('hide');
    }

});


//aparecer la cantidad personalizada
const otherAmount = document.getElementById('other-amount');
const amountContainer = document.getElementById('input-radio');
const personalizedAmount = document.getElementById('personalized-amount');
const radioLabels = document.querySelectorAll('#input-radio .option input');

function inputRadio() {


    if (!otherAmount.checked) {
        personalizedAmount.parentElement.classList.remove('active');

        const formControl = document.querySelector('.form-control.input-radio');
        const small = formControl.querySelector('small');
        formControl.classList.remove('error');
        formControl.classList.remove('success');
        small.innerText = "";
        personalizedAmount.value = "";
    } else {
        personalizedAmount.parentElement.classList.add('active');
        personalizedAmount.focus();
    }

}
inputRadio();



amountContainer.addEventListener('change', inputRadio);
amountContainer.addEventListener('click', inputRadio);


radioLabels.forEach(radioLabel => {
    radioLabel.addEventListener('click', () => {

        let totalAmount = document.getElementById('total-amount');
        totalAmount.innerText = radioLabel.value;

    });

});



//cambiar de quetzales a dolares
let currency = document.getElementById("currency");
let frequency = document.getElementById("frequency");


currency.addEventListener('change', showCurrency);
document.addEventListener('DOMContentLoaded', showCurrency);


frequency.addEventListener('change', showFrequency);
document.addEventListener('DOMContentLoaded', showFrequency);


function showCurrency() {
    let currencyV = document.getElementById("currency").value;

    let currencySymbols = document.querySelectorAll('.option label b');
    let pCurrency = document.querySelector('.option.personalized-amount b');
    let totalCurrency = document.getElementById('total-currency');
    currencySymbols.forEach(currencySymbol => {
        if (currencyV == "GTQ") {
            currencySymbol.innerHTML = "Q";
            pCurrency.innerHTML = "Q";
            totalCurrency.innerText = "GTQ"
        } else if (currencyV == "USD") {
            currencySymbol.innerHTML = "$";
            pCurrency.innerHTML = "$";
            totalCurrency.innerText = "US$"
        }
    });

}
showCurrency();

function showFrequency() {
    let frequencyValue = document.getElementById("frequency").value;

    let totalFrequency = document.getElementById('total-frequency');
    let newFrequency;
    if (frequencyValue == "once") {
        newFrequency = "Donación Única"
    } else if (frequencyValue == "monthly") {
        newFrequency = "Mensualmente"
        document.getElementById('info-frequency').innerHTML = "cada mes "
    } else if (frequencyValue == "anual") {
        newFrequency = "Anualmente";
        document.getElementById('info-frequency').innerHTML = "cada año "
    }
    if (frequencyValue != "once") {
        document.getElementById('current-info').classList.add('active');
    } else {
        document.getElementById('current-info').classList.remove('active');
    }
    totalFrequency.innerText = newFrequency;


}
showFrequency();

personalizedAmount.addEventListener('keyup', (e) => {
    let valorInput = e.target.value;

    personalizedAmount.value = valorInput
        // Eliminamos espacios en blanco
        .replace(/\s/g, '')
        // Eliminar las letras
        .replace(/\D/g, '')
        // Ponemos espacio cada cuatro numeros
        .replace(/\D/g, "")


    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")
        // Elimina el ultimo espaciado
        .trim();

    let totalDonation = document.getElementById('total-amount');

    totalDonation.innerText = personalizedAmount.value;

});


//validaciones de tarjeta
const validateQuantity = document.getElementById('validate-quantity');
const validatePersonal = document.getElementById('validate-personal');
const validateCredit = document.getElementById('validate-credit-card');

//validation-form
const form = document.getElementById('donation-form');

const inputNumberCard = document.getElementById('inputNumberCard');
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

    if (valorInput[0] == 4) {
        smallImg.classList.add('opacity');
        smallImg.classList.add('animated');
        smallImg.src = '../img/svg/small-visa.svg';


    } else if (valorInput[0] == 5) {
        smallImg.classList.add('opacity');
        smallImg.classList.add('animated');
        smallImg.src = '../img/svg/small-mastercard.svg';

    } else {
        smallImg.classList.add('opacity');
        smallImg.classList.add('animated');
        smallImg.src = '../img/svg/small-card-error.svg';

    }
    if (valorInput == '') {
        smallImg.classList.remove('opacity');
        smallImg.classList.remove('animated');
        smallImg.src = '../img/svg/small-card.svg';
    }


});

//last-info
const id = document.getElementById('inputId');
const nombre = document.getElementById('inputName');
const lastname = document.getElementById('inputLastname');
const email = document.getElementById('inputEmail');
const phone = document.getElementById('inputPhone');
// const adress = document.getElementById('inputAdress');
// const msg = document.getElementById('inputMsg');

let stepOne = document.querySelector('.step-one');
let stepTwo = document.querySelector('.step-two');
let stepThree = document.querySelector('.step-three');

let backToOne = document.querySelector('.back-to-one');
let backToTwo = document.querySelector('.back-to-two');

backToOne.addEventListener('click', () => {
    stepOne.classList.add('active');
    stepTwo.classList.remove('active');
});

backToTwo.addEventListener('click', () => {

    stepTwo.classList.add('active');
    stepThree.classList.remove('active');

});


validateQuantity.addEventListener('click', (e) => {

    e.preventDefault();
    validateQuantity.innerHTML = '<i class="fas fa-spinner icon loading"></i>';

    const formData = new FormData(form);

    const xhttpQuantity = new XMLHttpRequest();

    xhttpQuantity.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById('input-radio').classList.remove('error');
            document.getElementById('input-radio').classList.add('success');

            document.getElementById('smallAmount').innerHTML = "";


            let response = document.getElementById('card-response');
            response.innerHTML = '';
            const script = document.createElement('script');
            script.innerHTML = this.responseText;
            response.appendChild(script);

        }

        if (xhttpQuantity.responseText.indexOf("<script>") > -1) {
            var x = xhttpQuantity.responseText.indexOf("<script>") + "<script>".length;
            var y = xhttpQuantity.responseText.indexOf("</script>") - x;
            eval(xhttpQuantity.responseText.substr(x, y));
        }
    };


    xhttpQuantity.open('POST', '../php/verifyAmount.php');

    xhttpQuantity.send(formData);


});


validatePersonal.addEventListener('click', (e) => {

    e.preventDefault();
    validatePersonal.innerHTML = '<i class="fas fa-spinner icon loading"></i>';

    const formDataP = new FormData(form);

    const xhttpPersonal = new XMLHttpRequest();

    xhttpPersonal.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            // id.parentElement.classList.remove('error');
            nombre.parentElement.classList.remove('error');
            lastname.parentElement.classList.remove('error');
            email.parentElement.classList.remove('error');
            phone.parentElement.classList.remove('error');

            // id.parentElement.classList.add('success');
            nombre.parentElement.classList.add('success');
            lastname.parentElement.classList.add('success');
            email.parentElement.classList.add('success');
            phone.parentElement.classList.add('success');


            document.getElementById('smallName').innerHTML = "";
            document.getElementById('smallLastname').innerHTML = "";
            document.getElementById('smallEmail').innerHTML = "";
            document.getElementById('smallPhone').innerHTML = "";
            // document.getElementById('smallId').innerHTML = "";

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


    xhttpPersonal.open('POST', '../php/verifyPersonal.php');

    xhttpPersonal.send(formDataP);


});

validateCredit.addEventListener('click', (e) => {

    e.preventDefault();
    validateCredit.innerHTML = '<i class="fas fa-spinner icon loading"></i>';

    const formDataP = new FormData(form);

    const xhttpPersonal = new XMLHttpRequest();

    xhttpPersonal.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            // inputNameCard.parentElement.classList.remove('error');
            inputNumberCard.parentElement.classList.remove('error');
            ccvCard.parentElement.classList.remove('error');


            // inputNameCard.parentElement.classList.add('success');
            inputNumberCard.parentElement.classList.add('success');
            ccvCard.parentElement.classList.add('success');




            // document.getElementById('smallNameCard').innerHTML = "";
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


    xhttpPersonal.open('POST', '../php/verifyCredit.php');

    xhttpPersonal.send(formDataP);


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
document.getElementById('copy-input').addEventListener('click', copyToClipBoard);

document.getElementById('share-proyect').addEventListener('click', () => {

    document.getElementById('cookie-shadow').classList.add('active');
    document.getElementById('share-container').classList.add('active');
    document.getElementById('close-donation').classList.add('active');

});