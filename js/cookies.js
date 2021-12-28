const btnCookies = document.getElementById('btn-cookies');
const btnCookiesSecond = document.getElementById('btn-cookies-second');

const cookieA = document.getElementById('cookie-a');
const cookieShadow = document.getElementById('cookie-shadow');


dataLayer = [];

if (!localStorage.getItem('cookies-accepted')) {

    cookieA.classList.add('active');
    cookieShadow.classList.add('active');

} else if (localStorage.getItem('only-necessary')) {
    cookieA.classList.remove('active');
    cookieShadow.classList.remove('active');
} else {
    dataLayer.push({ 'event': 'cookies-aceptadas' });
}

btnCookies.addEventListener('click', () => {

    cookieA.classList.remove('active');
    cookieShadow.classList.remove('active');


    localStorage.setItem('cookies-accepted', true);

    dataLayer.push({ 'event': 'cookies-aceptadas' });
});
btnCookiesSecond.addEventListener('click', () => {

    cookieA.classList.remove('active');
    cookieShadow.classList.remove('active');


    localStorage.setItem('only-necessary', true);

});