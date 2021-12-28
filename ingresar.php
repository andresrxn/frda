<?php

session_start();
if(!isset($_SERVER['HTTP_REFERER'])){

    $_SESSION["url"] = "/";
}else{
    $origin = $_SERVER['HTTP_REFERER'];
    $_SESSION["url"] = $origin;
    // echo $origin;
}


if(isset($_SESSION['user'])){
    
    
    header("location: cuenta.php");
    die();

}
if(isset($_COOKIE["login"])){

    include('php/db.php');

    $cookie = $_COOKIE["login"];

    $verificarUsuario = mysqli_query($connection, "SELECT * FROM usuarios WHERE tokenId='$cookie'");
    
    if(mysqli_num_rows($verificarUsuario) > 0){
        $verificar = $verificarUsuario->fetch_array();
        $tokenId = $verificar['tokenId'];
        $privilegio = $verificar['privilegio'];

        $_SESSION["user"] = $tokenId;
        $_SESSION["priv"] = $privilegio;
        header("location: cuenta.php");
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--About-->
    <title>Ingresar | Fundación Redes de Ayuda</title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">
    <meta name="keywords" content="Fundacion, ayuda, Guatemala, necesidad, financiamiento, trabajo">
    <meta name="description"
        content="¡Inicia Sesión o Registrate para guardar tu información de forma completamente segura!">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/enter.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>


    <script defer src="js/cookies.js "></script>
    <script defer src="js/main.js"></script>


    <script defer src="js/enter.js"></script>
    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PJ3MVCK');
    </script>
    <!-- End Google Tag Manager -->


    <meta property="og:url" content="https://www.fundacionredesdeayuda.org">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Ingresar | Fundación Redes de Ayuda" />
    <meta property="og:description"
        content="¡Inicia Sesión o Registrate para guardar tu información de forma completamente segura!">
    <meta property="og:image" content="img/logos/redes-de-ayuda-completo.svg">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Ingresar | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="¡Inicia Sesión o Registrate para guardar tu información de forma completamente segura!">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda-completo.svg">

    <!--favicon-->

    <link rel="icon" href="favicon.ico" type="image/x-icon" />


</head>


<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include("php/header.php") ?>


    <main>
        <section class="banner">
            <div class="banner-container">
                <div class="banner-img">
                    <img src="img/svg/account.svg" alt="">
                </div>
                <div class="banner-step">
                    <div class="banner-step-container">

                        <div class="banner-step-account active" id="step-two">

                            <h2>Iniciar Sesión</h2>
                            <div class="question">
                                <p>¿No tienes una cuenta? <span id="loginSpan">Regístrate</span></p>
                            </div>

                            <div class="continue">
                                <div class="continue-container">
                                    <div class="continue-card gg">
                                        <div class="continue-icon">
                                            <i class="fab fa-google icon"></i>
                                        </div>
                                        <div class="continue-title">
                                            <p>Continuar con Google</p>
                                        </div>
                                    </div>
                                    <div class="continue-card fb">
                                        <div class="continue-icon">
                                            <i class="fab fa-facebook icon"></i>
                                        </div>
                                        <div class="continue-title">
                                            <p>Continuar con Facebook</p>
                                        </div>
                                    </div>
                                    <div class="continue-email">
                                        o continua con tu correo
                                    </div>
                                </div>
                            </div>
                            <div id="mensajeLogin"></div>
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="loginForm"
                                class="form login-form">

                                <div class="form-container opacity">
                                    <div class="form-control input-login-email">
                                        <label for="loginEmail">Correo Electrónico</label>
                                        <input type="text" id="loginEmail" name="loginEmail" />
                                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                        <small id="loginSmallEmail"></small>
                                    </div>
                                    <div class="form-control input-login-password">
                                        <label for="">Contraseña

                                            <div class="forgot-pass" id="forgot-pass">
                                                <p>
                                                    ¿Olvidaste tu Contraseña?
                                                </p>

                                            </div>
                                        </label>
                                        <input type="password" id="loginPassword" name="loginPassword"
                                            autocomplete="off" class="password" />
                                        <div class="show-pass show-login-pass">
                                            <i class="far fa-eye-slash icon"></i>
                                        </div>
                                        <small id="loginSmallPassword"></small>
                                    </div>

                                    <div class="form-control input-terms session-open">

                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">
                                            <p> Mantener la sesión abierta</p>
                                        </label>

                                    </div>

                                    <input type="hidden" name="loginAjax">

                                    <button id="loginSubmit" name="loginSubmit">Iniciar Sesión</button>




                                </div>

                            </form>

                        </div>
                        <div class="banner-step-account" id="step-three">

                            <h2>Registrarse</h2>
                            <div class="question">
                                <p>¿Ya tienes una cuenta? <span id="registerSpan">Inicia Sesión</span></p>
                            </div>

                            <div class="continue">
                                <div class="continue-container register">
                                    <div class="continue-card gg">
                                        <div class="continue-icon">
                                            <i class="fab fa-google icon"></i>
                                        </div>
                                        <div class="continue-title">
                                            <p>Registrarse con Google</p>
                                        </div>
                                    </div>
                                    <div class="continue-card fb">
                                        <div class="continue-icon">
                                            <i class="fab fa-facebook icon"></i>
                                        </div>
                                        <div class="continue-title">
                                            <p>Registrarse con Facebook</p>
                                        </div>
                                    </div>
                                    <div class="continue-email">
                                        o registrate con tu correo
                                    </div>
                                </div>
                            </div>
                            <div id="mensaje"></div>

                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="registerForm"
                                class="form">


                                <div class="form-container opacity">


                                    <div class="name-group">
                                        <div class="form-control input-register-name">
                                            <label for="name">Nombre(s)</label>
                                            <input type="text" id="registerName" name="registerName"
                                                autocomplete="off" />
                                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                            <small id="smallName"></small>
                                        </div>
                                        <div class="form-control input-register-lastname">
                                            <label for="lastname">Apellido(s)</label>
                                            <input type="text" id="registerLastname" name="registerLastname"
                                                autocomplete="off" />
                                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                            <small id="smallLastname"></small>
                                        </div>
                                    </div>

                                    <div class="form-control input-register-mail">
                                        <label for="registerEmail">Correo Electrónico</label>
                                        <input type="text" id="registerEmail" name="registerEmail" autocomplete="off" />
                                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                        <small id="smallEmail">- Con este correo iniciarás sesión</small>
                                    </div>
                                    <div class="form-control input-register-password">
                                        <label for="registerPassword">Contraseña</label>
                                        <input type="password" id="registerPassword" name="registerPassword"
                                            autocomplete="off" class="password" />
                                        <div class="show-pass show-register-pass">
                                            <i class="far fa-eye-slash icon"></i>
                                        </div>
                                        <small id="smallPassword">- Incluye al menos 8 caracteres, una mayúscula y un número</small>
                                    </div>
                                    <div class="flex-country">

                                        <div class="form-control disable input-subject input-country">
                                            <label for="adress">País</label>
                                            
                                       
                                            <select name="adress" id="country">

                                                
                                                <?php
                                                
                                                // $ip = $_SERVER["REMOTE_ADDR"];

                                                // $ip = '74.125.224.72';
                                                // $informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);

                                                // $dataSolicitud = json_decode($informacionSolicitud, true);

                                                // $countryCode = $dataSolicitud["geoplugin_countryCode"];
                                                // $timeZone = $dataSolicitud["geoplugin_timezone"];


                                                // echo '
                                                // <script>
                                                // document.addEventListener("DOMContentLoaded", ()=>{
                                                // document.querySelector("#country #'.$countryCode .'").setAttribute("selected", true);
                                                // });
                                                // </script>
                                                // ';
                                                ?>
                                                <option selected disabled>Selecciona tu país</option>
                                                <option value="AF" id="AF">Afganistán</option>
                                                <option value="AL" id="AL">Albania</option>
                                                <option value="DE" id="DE">Alemania</option>
                                                <option value="AD" id="AD">Andorra</option>
                                                <option value="AO" id="AO">Angola</option>
                                                <option value="AI" id="AI">Anguila</option>
                                                <option value="AQ" id="AQ">Antártida</option>
                                                <option value="AG" id="AG">Antigua y Barbuda</option>
                                            
                                                <option value="SA" id="SA">Arabia Saudí</option>
                                                <option value="DZ" id="DZ">Argelia</option>
                                                <option value="AR" id="AR">Argentina</option>
                                                <option value="AM" id="AM">Armenia</option>
                                                <option value="AW" id="AW">Aruba</option>
                                                <option value="AU" id="AU">Australia</option>
                                                <option value="AT" id="AT">Austria</option>
                                                <option value="AZ" id="AZ">Azerbaiyán</option>
                                                <option value="BS" id="BS">Bahamas</option>
                                                <option value="BH" id="BH">Bahrein</option>
                                                <option value="BD" id="BD">Bangladesh</option>
                                                <option value="BB" id="BB">Barbados</option>
                                                <option value="BE" id="BE">Bélgica</option>
                                                <option value="BZ" id="BZ">Belice</option>
                                                <option value="BJ" id="BJ">Benín</option>
                                                <option value="BM" id="BM">Bermudas</option>
                                                <option value="BT" id="BT">Bhután</option>
                                                <option value="BY" id="BY">Bielorrusia</option>
                                                <option value="MM" id="MM">Birmania</option>
                                                <option value="BO" id="BO">Bolivia</option>
                                                <option value="BA" id="BA">Bosnia y Herzegovina</option>
                                                <option value="BW" id="BW">Botsuana</option>
                                                <option value="BR" id="BR">Brasil</option>
                                                <option value="BN" id="BN">Brunei</option>
                                                <option value="BG" id="BG">Bulgaria</option>
                                                <option value="BF" id="BF">Burkina Faso</option>
                                                <option value="BI" id="BI">Burundi</option>
                                                <option value="CV" id="CV">Cabo Verde</option>
                                                <option value="KH" id="KH">Camboya</option>
                                                <option value="CM" id="CM">Camerún</option>
                                                <option value="CA" id="CA">Canadá</option>
                                                <option value="TD" id="TD">Chad</option>
                                                <option value="CL" id="CL">Chile</option>
                                                <option value="CN" id="CN">China</option>
                                                <option value="CY" id="CY">Chipre</option>
                                                <option value="VA" id="VA">Ciudad estado del Vaticano</option>
                                                <option value="CO" id="CO">Colombia</option>
                                                <option value="KM" id="KM">Comores</option>
                                                <option value="CG" id="CG">Congo</option>
                                                <option value="KR" id="KR">Corea</option>
                                                <option value="KP" id="KP">Corea del Norte</option>
                                                <option value="CI" id="CI">Costa del Marfíl</option>
                                                <option value="CR" id="CR">Costa Rica</option>
                                                <option value="HR" id="HR">Croacia</option>
                                                <option value="CU" id="CU">Cuba</option>
                                                <option value="DK" id="DK">Dinamarca</option>
                                                <option value="DJ" id="DJ">Djibouri</option>
                                                <option value="DM" id="DM">Dominica</option>
                                                <option value="EC" id="EC">Ecuador</option>
                                                <option value="EG" id="EG">Egipto</option>
                                                <option value="SV" id="SV">El Salvador</option>
                                                <option value="AE" id="AE">Emiratos Arabes Unidos</option>
                                                <option value="ER" id="ER">Eritrea</option>
                                                <option value="SK" id="SK">Eslovaquia</option>
                                                <option value="SI" id="SI">Eslovenia</option>
                                                <option value="ES" id="ES">España</option>
                                                <option value="US" id="US">Estados Unidos</option>
                                                <option value="EE" id="EE">Estonia</option>
                                                <option value="ET" id="ET">Etiopía</option>
                                                <option value="MK" id="MK">Yugoslava Macedonia</option>
                                                <option value="PH" id="PH">Filipinas</option>
                                                <option value="FI" id="FI">Finlandia</option>
                                                <option value="FR" id="FR">Francia</option>
                                                <option value="GA" id="GA">Gabón</option>
                                                <option value="GM" id="GM">Gambia</option>
                                                <option value="GE" id="GE">Georgia</option>
                                                <option value="GS" id="GS">Georgia del Sur</option>
                                                <option value="GH" id="GH">Ghana</option>
                                                <option value="GI" id="GI">Gibraltar</option>
                                                <option value="GD" id="GD">Granada</option>
                                                <option value="GR" id="GR">Grecia</option>
                                                <option value="GL" id="GL">Groenlandia</option>
                                                <option value="GP" id="GP">Guadalupe</option>
                                                <option value="GU" id="GU">Guam</option>
                                                <option value="GT" id="GT">Guatemala</option>
                                                <option value="GY" id="GY">Guayana</option>
                                                <option value="GF" id="GF">Guayana francesa</option>
                                                <option value="GN" id="GN">Guinea</option>
                                                <option value="GQ" id="GQ">Guinea Ecuatorial</option>
                                                <option value="GW" id="GW">Guinea-Bissau</option>
                                                <option value="HT" id="HT">Haití</option>
                                                <option value="NL" id="NL">Holanda</option>
                                                <option value="HN" id="HN">Honduras</option>
                                                <option value="HK" id="HK">Hong Kong R. A. E</option>
                                                <option value="HU" id="HU">Hungría</option>
                                                <option value="IN" id="IN">India</option>
                                                <option value="ID" id="ID">Indonesia</option>
                                                <option value="IQ" id="IQ">Irak</option>
                                                <option value="IR" id="IR">Irán</option>
                                                <option value="IE" id="IE">Irlanda</option>
                                                <option value="BV" id="BV">Isla Bouvet</option>
                                                <option value="CX" id="CX">Isla Christmas</option>
                                                <option value="HM" id="HM">Isla Heard y McDonald</option>
                                                <option value="IS" id="IS">Islandia</option>
                                                <option value="KY" id="KY">Islas Caimán</option>
                                                <option value="CK" id="CK">Islas Cook</option>
                                                <option value="CC" id="CC">Islas de Cocos o Keeling</option>
                                                <option value="FO" id="FO">Islas Faroe</option>
                                                <option value="FJ" id="FJ">Islas Fiyi</option>
                                                <option value="FK" id="FK">Islas Malvinas (Falkland)</option>
                                                <option value="MP" id="MP">Islas Marianas del norte</option>
                                                <option value="MH" id="MH">Islas Marshall</option>
                                                <option value="UM" id="UM">Islas menores de E.E.U.U</option>
                                                <option value="PW" id="PW">Islas Palau</option>
                                                <option value="SB" id="SB">Islas Salomón</option>
                                                <option value="TK" id="TK">Islas Tokelau</option>
                                                <option value="TC" id="TC">Islas Turks y Caicos</option>
                                                <option value="VI" id="VI">Islas Vírgenes E.E.U.U.</option>
                                                <option value="VG" id="VG">Islas Vírgenes UK</option>
                                                <option value="IL" id="IL">Israel</option>
                                                <option value="IT" id="IT">Italia</option>
                                                <option value="JM" id="JM">Jamaica</option>
                                                <option value="JP" id="JP">Japón</option>
                                                <option value="JO" id="JO">Jordania</option>
                                                <option value="KZ" id="KZ">Kazajistán</option>
                                                <option value="KE" id="KE">Kenia</option>
                                                <option value="KG" id="KG">Kirguizistán</option>
                                                <option value="KI" id="KI">Kiribati</option>
                                                <option value="KW" id="KW">Kuwait</option>
                                                <option value="LA" id="LA">Laos</option>
                                                <option value="LS" id="LS">Lesoto</option>
                                                <option value="LV" id="LV">Letonia</option>
                                                <option value="LB" id="LB">Líbano</option>
                                                <option value="LR" id="LR">Liberia</option>
                                                <option value="LY" id="LY">Libia</option>
                                                <option value="LI" id="LI">Liechtenstein</option>
                                                <option value="LT" id="LT">Lituania</option>
                                                <option value="LU" id="LU">Luxemburgo</option>
                                                <option value="MO" id="MO">Macao R. A. E</option>
                                                <option value="MG" id="MG">Madagascar</option>
                                                <option value="MY" id="MY">Malasia</option>
                                                <option value="MW" id="MW">Malawi</option>
                                                <option value="MV" id="MV">Maldivas</option>
                                                <option value="ML" id="ML">Malí</option>
                                                <option value="MT" id="MT">Malta</option>
                                                <option value="MA" id="MA">Marruecos</option>
                                                <option value="MQ" id="MQ">Martinica</option>
                                                <option value="MU" id="MU">Mauricio</option>
                                                <option value="MR" id="MR">Mauritania</option>
                                                <option value="YT" id="YT">Mayotte</option>
                                                <option value="MX" id="MX">México</option>
                                                <option value="FM" id="FM">Micronesia</option>
                                                <option value="MD" id="MD">Moldavia</option>
                                                <option value="MC" id="MC">Mónaco</option>
                                                <option value="MN" id="MN">Mongolia</option>
                                                <option value="MS" id="MS">Montserrat</option>
                                                <option value="MZ" id="MZ">Mozambique</option>
                                                <option value="NA" id="NA">Namibia</option>
                                                <option value="NR" id="NR">Nauru</option>
                                                <option value="NP" id="NP">Nepal</option>
                                                <option value="NI" id="NI">Nicaragua</option>
                                                <option value="NE" id="NE">Níger</option>
                                                <option value="NG" id="NG">Nigeria</option>
                                                <option value="NU" id="NU">Niue</option>
                                                <option value="NF" id="NF">Norfolk</option>
                                                <option value="NO" id="NO">Noruega</option>
                                                <option value="NC" id="NC">Nueva Caledonia</option>
                                                <option value="NZ" id="NZ">Nueva Zelanda</option>
                                                <option value="OM" id="OM">Omán</option>
                                                <option value="PA" id="PA">Panamá</option>
                                                <option value="PG" id="PG">Papua Nueva Guinea</option>
                                                <option value="PK" id="PK">Paquistán</option>
                                                <option value="PY" id="PY">Paraguay</option>
                                                <option value="PE" id="PE">Perú</option>
                                                <option value="PN" id="PN">Pitcairn</option>
                                                <option value="PF" id="PF">Polinesia francesa</option>
                                                <option value="PL" id="PL">Polonia</option>
                                                <option value="PT" id="PT">Portugal</option>
                                                <option value="PR" id="PR">Puerto Rico</option>
                                                <option value="QA" id="QA">Qatar</option>
                                                <option value="UK" id="UK">Reino Unido</option>
                                                <option value="CF" id="CF">República Centroafricana</option>
                                                <option value="CZ" id="CZ">República Checa</option>
                                                <option value="ZA" id="ZA">República de Sudáfrica</option>
                                                <option value="CD" id="CD">República del Congo Zaire</option>
                                                <option value="DO" id="DO">República Dominicana</option>
                                                <option value="RE" id="RE">Reunión</option>
                                                <option value="RW" id="RW">Ruanda</option>
                                                <option value="RO" id="RO">Rumania</option>
                                                <option value="RU" id="RU">Rusia</option>
                                                <option value="WS" id="WS">Samoa</option>
                                                <option value="AS" id="AS">Samoa occidental</option>
                                                <option value="KN" id="KN">San Kitts y Nevis</option>
                                                <option value="SM" id="SM">San Marino</option>
                                                <option value="PM" id="PM">San Pierre y Miquelon</option>
                                                <option value="VC" id="VC">San V. e Islas Granadinas</option>
                                                <option value="SH" id="SH">Santa Helena</option>
                                                <option value="LC" id="LC">Santa Lucía</option>
                                                <option value="ST" id="ST">Santo Tomé y Príncipe</option>
                                                <option value="SN" id="SN">Senegal</option>
                                                <option value="YU" id="YU">Serbia y Montenegro</option>
                                                <option value="SC" id="SC">Seychelles</option>
                                                <option value="SL" id="SL">Sierra Leona</option>
                                                <option value="SG" id="SG">Singapur</option>
                                                <option value="SY" id="SY">Siria</option>
                                                <option value="SO" id="SO">Somalia</option>
                                                <option value="LK" id="LK">Sri Lanka</option>
                                                <option value="SZ" id="SZ">Suazilandia</option>
                                                <option value="SD" id="SD">Sudán</option>
                                                <option value="SE" id="SE">Suecia</option>
                                                <option value="CH" id="CH">Suiza</option>
                                                <option value="SR" id="SR">Surinam</option>
                                                <option value="SJ" id="SJ">Svalbard</option>
                                                <option value="TH" id="TH">Tailandia</option>
                                                <option value="TW" id="TW">Taiwán</option>
                                                <option value="TZ" id="TZ">Tanzania</option>
                                                <option value="TJ" id="TJ">Tayikistán</option>
                                                <option value="IO" id="IO">Territorios británicos O.I.</option>
                                                <option value="TF" id="TF">Territorios franceses sur</option>
                                                <option value="TP" id="TP">Timor Oriental</option>
                                                <option value="TG" id="TG">Togo</option>
                                                <option value="TO" id="TO">Tonga</option>
                                                <option value="TT" id="TT">Trinidad y Tobago</option>
                                                <option value="TN" id="TN">Túnez</option>
                                                <option value="TM" id="TM">Turkmenistán</option>
                                                <option value="TR" id="TR">Turquía</option>
                                                <option value="TV" id="TV">Tuvalu</option>
                                                <option value="UA" id="UA">Ucrania</option>
                                                <option value="UG" id="UG">Uganda</option>
                                                <option value="UY" id="UY">Uruguay</option>
                                                <option value="UZ" id="UZ">Uzbekistán</option>
                                                <option value="VU" id="VU">Vanuatu</option>
                                                <option value="VE" id="VE">Venezuela</option>
                                                <option value="VN" id="VN">Vietnam</option>
                                                <option value="WF" id="WF">Wallis y Futuna</option>
                                                <option value="YE" id="YE">Yemen</option>
                                                <option value="ZM" id="ZM">Zambia</option>
                                                <option value="ZW" id="ZW">Zimbabue</option>
                                            </select>
                                            <div class="arrow-icon">
                                                <i class="fas fa-chevron-down icon"></i>
                                            </div>

                                        </div>
                                        <div class="country-flag">
                                            <img src="" class="flag" alt="">
                                        </div>
                                    </div>
                                    <div class="form-control input-terms terms-register">

                                        <input type="checkbox" name="terms" id="check">
                                        <label for="check">
                                            
                                            <p> He leído y estoy de acuerdo con la <a href="legal/politica-de-privacidad">Política de Privacidad</a> y los <a href="legal/terminos-y-condiciones">Términos y Condiciones</a> de Fundación Redes de Ayuda.</p>
                                        </label>

                                    </div>
                                    

                                    <input type="hidden" name="ajax">

                                    <button id="registerSubmit" name="registerSubmit">Registrarse</button>


                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <div class="enter-email" id="enter-email">
        <div class="enter-email-container">
            <form action="" name="form-email" id="form-email" class="form">
                <div class="step one" id="step-email-one">
                    <h3>Restablecer Contraseña</h3>
                    <p>Ingresa el correo asociado a tu cuenta, recibirás un código para crear tu nueva contraseña.</p>

                    <div id="card-response"></div>

                    <div class="form-container">

                        <div class="form-control input-form-mail">

                            <input type="text" id="sendEmail" name="sendEmail" autocomplete="off" />

                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallFormEmail"></small>
                        </div>
                        <input type="hidden" name="emailAjax">
                        <button id="btnEmail" name="btnEmail">Enviar Código</button>
                    </div>
                </div>
                <div class="step two" id="step-email-two">

                    <h3>Enviado con Éxito <i class="fas fa-check icon"></i></h3>
                    <p>Revisa tu correo electrónico e ingresa el código que te hemos enviado.</p>


                    <div class="form-container">

                        <div class="form-control input-code">

                            <input type="number" id="code" name="code" autocomplete="off" max="999999" />

                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallCode"></small>
                        </div>
                        <input type="hidden" name="codeAjax">
                        <button id="btnCode" name="btnCode">Hecho</button>
                    </div>
                </div>
                <div class="step three" id="step-email-three">
                    <h3>Crea una Nueva Contraseña</h3>

                    <div class="form-container">

                        <div class="form-control input-new-pass">

                            
                            <input type="password" id="new-pass" name="new-pass"
                                autocomplete="off" class="password" placeholder="Nueva Contraseña"/>
                                <div class="show-pass show-new-pass">
                                <i class="far fa-eye-slash icon"></i>
                            </div>
                            <small id="smallNewPass"></small>
                        </div>

                        <div class="form-control input-confirm-pass">

                            
                            <input type="password" id="confirm-pass" name="confirm-pass"
                                autocomplete="off" class="password" placeholder="Confirma tu Contraseña"/>
                                <div class="show-pass show-confirm-pass">
                                <i class="far fa-eye-slash icon"></i>
                            </div>
                            <small id="smallConfirmPass"></small>
                        </div>
                        
                        <input type="hidden" name="passAjax">
                        <button id="btnPass" name="btnPass">Cambiar Contraseña</button>
                    </div>
                </div>
                <div class="step four" id="step-email-four">
                    <div class="step-img">
                        <img src="img/svg/success.svg" alt="">
                    </div>
                    <h3>Contraseña Restablecida</h3>
                    <p>Se ha actualizado con éxito, ya puedes ingresar tu nueva contraseña para iniciar sesión</p>

                    <button id="btnClose" name="btnClose">Aceptar</button>
                </div>

            </form>


        </div>

    </div>


    <div class="close-donation" id="close-donation">
        <i class="fas fa-times icon"></i>
    </div>

    <?php include_once("php/cookies.php"); ?>

    <?php include_once("php/footer.php"); ?>




    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>