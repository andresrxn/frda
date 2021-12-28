<?php include_once("php/connection-user.php"); ?>
<!DOCTYPE html>

<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--About-->
    <title>Donaciones | Fundación Redes de Ayuda </title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">
    <meta name="keywords" content="Fundacion, contacto, Guatemala, necesidad, financiamiento, trabajo">
    <meta name="description"
        content="No dejes para mañana la ayuda que puedas dar hoy, ¡Toda Guatemala estará agradecida con tu donativo!">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--Styles-->
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/donate.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>

    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="js/cookies.js "></script>

    <script defer src="js/main.js "></script>
    <script defer src="js/donate.js "></script>

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
    <!--Social-->
    <meta property="og:url" content="https://fundacionredesdeayuda.org">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Donaciones | Fundación Redes de Ayuda" />
    <meta property="og:description"
        content="No dejes para mañana la ayuda que puedas dar hoy. ¡Toda Guatemala estará agradecida con tu donativo!">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Donaciones | Fundación Redes de Ayuda">
    <meta name="twitter:description"
        content="No dejes para mañana la ayuda que puedas dar hoy. ¡Toda Guatemala estará agradecida con tu donativo!">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">


    <!--favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include_once("php/header.php"); ?>


    <main>
        <section class="banner">

            <div class="banner-container">
                <div class="banner-video">
                    <!-- <video muted id="banner-video" poster="img/video/donation-video-poster.jpg">
                    <source src="img/video/Guatemala - 24668.mp4" type="Video/mp4" preload poster >
                </video> -->
                    <img src="img/guatemala-lago-azul.jpg" alt="">
                </div>
                <div class="banner-content">
                    <div class="banner-title">
                        <h1 class="banner-h1">
                            <span>Guatemala</span>
                            <span>Te Necesita</span>
                        </h1>
                        <span class="banner-division"></span>
                        <h2 class="banner-h2">Ayúdanos a Ayudar</h2>
                    </div>

                </div>

            </div>

        </section>


        <section class="methods">
            <div class="methods-container">
                <div class="method credit-card">
                    <div class="title">
                        <div class="icon-title">
                            <i class="fas fa-credit-card icon"></i> Donar con Tarjeta
                        </div>
                        <div class="cards">
                            <img src="img/svg/Visa_2021.svg" alt="Visa">
                            <img src="img/svg/mc_symbol.svg" alt="Mastercard">
                        </div>
                    </div>
                    <div id="card-response"></div>

                    <form action="" method="POST" id="donation-form" class="form">
                        <div class="content">
                            <div class="step step-one active">
                                <div class="select-group first-select">
                                    <div class="form-control currency input-subject">
                                        <label for="currency" id="currency-label">Moneda</label>

                                        <select name="currency" id="currency">
                                            <option value="GTQ">Quetzales GTQ</option>

                                            <option value="USD">Dólares USD</option>

                                        </select>
                                        <div class="arrow-icon">
                                            <i class="fas fa-chevron-down icon"></i>
                                        </div>
                                    </div>
                                    <div class="form-control frequency input-subject">
                                        <label for="frequency">Frecuencia</label>

                                        <select name="frequency" id="frequency">
                                            <option value="once">Una Vez</option>
                                            <option value="monthly">Mensual</option>
                                            <option value="anual">Anual</option>

                                        </select>
                                        <div class="arrow-icon">
                                            <i class="fas fa-chevron-down icon"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-control input-radio" id="input-radio">

                                    <div class="option">
                                        <input type="radio" name="amount" id="ten" value="10" checked>
                                        <label class="radio-label" for="ten">
                                            <span></span>
                                            <b></b> 10
                                        </label>
                                    </div>

                                    <div class="option">
                                        <input type="radio" name="amount" id="twenty" value="25">
                                        <label class="radio-label" for="twenty">
                                            <span></span>
                                            <b></b> 25
                                        </label>
                                    </div>

                                    <div class="option">
                                        <input type="radio" name="amount" id="fifty" value="50">
                                        <label class="radio-label" for="fifty">
                                            <span></span>
                                            <b></b> 50
                                        </label>
                                    </div>

                                    <div class="option">
                                        <input type="radio" name="amount" id="hundred" value="100">
                                        <label class="radio-label" for="hundred">
                                            <span></span>
                                            <b></b> 100
                                        </label>
                                    </div>

                                    <div class="option">
                                        <input type="radio" name="amount" id="twohundred" value="200">
                                        <label class="radio-label" for="twohundred">
                                            <span></span>
                                            <b></b> 200
                                        </label>
                                    </div>


                                    <div class="option other-amount">
                                        <input type="radio" name="amount" id="other-amount" value="other">

                                        <label class="radio-label" for="other-amount">
                                            <span></span>
                                            Otra Cantidad
                                        </label>
                                    </div>

                                    <div class="option personalized-amount">

                                        <input type="text" name="personalized-amount" id="personalized-amount"
                                            autocomplete="off" placeholder="¿Cuánto deseas donar?" maxlength="9">
                                        <b>Q</b>

                                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>



                                        <small id="smallAmount"></small>
                                    </div>

                                </div>


                                <input type="hidden" name="ajax-quantity">
                                <button id="validate-quantity" name="validate">
                                    Siguiente
                                </button>
                                <div class="current-info" id="current-info">
                                    <p><i class="fas fa-info-circle icon"></i> Con tu donación recurrente aceptas que Fundación Redes de Ayuda cobre la cantidad indicada <span id="info-frequency"></span>a partir de hoy. <span class="current-cancel"> ¡Puedes cancelar en cualquier momento!</span></p>
                                </div>


                            </div>
                            <div class="step step-two">
                                <p class="back back-to-one">
                                    <i class="fas fa-chevron-left icon"></i> Regresar
                                </p>

                                <div class="name-group">
                                    <div class="form-control input-name">
                                        <label for="name">Nombre(s)</label>
                                        <input type="text" id="inputName" name="name" autocomplete="off" value="" />


                                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                        <small id="smallName"></small>
                                    </div>
                                    <div class="form-control input-lastname">
                                        <label for="lastname">Apellido(s)</label>
                                        <input type="text" id="inputLastname" name="lastname" autocomplete="off"
                                            value="" />



                                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                        <small id="smallLastname"></small>
                                    </div>
                                </div>
                                <!-- <div class="form-control input-id">
                                <label for="identification">No. de Identificación <b> (Pasaporte, CUI, INE, IDE, etc.)</b></label>
                                <input type="text" id="inputId" name="identification" autocomplete="off" maxlength="25" value="" />


                                <i class="inputIcon  fas fa-check-circle iconCheck"></i>
                                <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                <small id="smallId"></small>
                                </div> -->
                                <div class="form-control input-mail">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="text" id="inputEmail" name="email" autocomplete="off" value="" />


                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallEmail"></small>
                                </div>
                                <div class="form-control input-phone">
                                    <label for="phone">Telefóno</label>
                                    <input type="number" id="inputPhone" name="phone" autocomplete="off" value="" />


                                    <i class="inputIcon inputIconPhone fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon inputIconPhone fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallPhone"></small>
                                </div>

                                <div class="flex-country" id="flex-country">
                                    <div class="form-control input-subject input-country">
                                        <label for="adress">País</label>
                                        <select name="adress" id="country">                        
                                            <?php
                                            if(isset($row["pais"]) && $row["pais"] != "" ){
                                                echo '
                                                <script>
                                                document.addEventListener("DOMContentLoaded", ()=>{
                                                document.querySelector("#country #'. $row["pais"] .'").setAttribute("selected", true);
                                                });
                                                </script>
                                                ';
                                            }else{
                                                    
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
                                                
                                                echo '<option disable selected >Selecciona tu país</option>';
                                                
                                            }
                                        
                                            ?>
                                        
                                            <option value="AF" id="AF">Afganistán</option>
                                            <option value="AL" id="AL">Albania</option>
                                            <option value="DE" id="DE">Alemania</option>
                                            <option value="AD" id="AD">Andorra</option>
                                            <option value="AO" id="AO">Angola</option>
                                            <option value="AI" id="AI">Anguila</option>
                                            <option value="AQ" id="AQ">Antártida</option>
                                            <option value="AG" id="AG">Antigua y Barbuda</option>
                                            <option value="AN" id="AN">Antillas holandesas</option>
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
                                            <option value="UM" id="UM">Islas menores de E.E.U.U.</option>
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

                                <input type="hidden" name="ajax-personal">

                                <button id="validate-personal" name="validate-personal">
                                    Continuar
                                </button>

                            </div>
                            <div class="step step-three">
                                <p class="back back-to-two">
                                    <i class="fas fa-chevron-left icon"></i> Regresar
                                </p>
                             
                                <div class="total-donation">
                                    <div class="total-img">
                                        <img src="img/svg/gift.svg" alt="">
                                    </div>
                                    <div class="total-content">
                                        <div id="total" class="total">
                                            <span id="total-currency" class="total-currency">Q</span>
                                            <span id="total-amount" class="total-amount">10</span>
                                            <div>

                                                <span id="total-frequency" class="total-frequency">Donación única</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-control input-credit input-number-card">
                                    <label for="numberCard">Número de la Tarjeta</label>
                                    <input type="text" id="inputNumberCard" name="numberCard" autocomplete="off"
                                        maxlength="19" />

                                    <small id="smallNumberCard"></small>

                                    <div class="small-card" id="small-card">
                                        <img src="img/svg/small-card.svg" alt="">
                                    </div>
                                </div>
                                <div class="form-control input-credit input-name-card">
                                    <label for="inputNameCard">Nombre de la Tarjeta</label>
                                    <input type="text" id="inputNameCard" name="nameCard" autocomplete="off" maxlength="20" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallNameCard"></small>
                                </div>



                                <div class="select-group card-group">
                                    <div class="form-control input-subject input-month">
                                        <label for="">Expiración</label>

                                        <select name="monthCard" id="selectMonth">
                                            <option disabled selected>Mes</option>
                                            <option value="01">1</option>
                                            <option value="02">2</option>
                                            <option value="03">3</option>
                                            <option value="04">4</option>
                                            <option value="05">5</option>
                                            <option value="06">6</option>
                                            <option value="07">7</option>
                                            <option value="08">8</option>
                                            <option value="09">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <div class="arrow-icon">
                                            <i class="fas fa-chevron-down icon"></i>
                                        </div>
                                    </div>
                                    <div class="form-control input-subject input-year">
                                        <select name="yearCard" id="selectYear">
                                            <option disabled selected>Año</option>
                                            <option value="21">2021</option>
                                            <option value="22">2022</option>
                                            <option value="23">2023</option>
                                            <option value="24">2024</option>
                                            <option value="25">2025</option>
                                            <option value="26">2026</option>
                                            <option value="27">2027</option>
                                            <option value="28">2028</option>
                                            <option value="29">2029</option>
                                        </select>
                                        <div class="arrow-icon">
                                            <i class="fas fa-chevron-down icon"></i>
                                        </div>
                                    </div>



                                    <div class="form-control input-credit  input-ccv-card">
                                        <label for="">CVV
                                            <div class="info-ccv">
                                                <i class="fas fa-question-circle icon"></i>
                                                <span>Código de 3 o 4 números situado en el reverso de la tarjeta de
                                                    crédito.</span>
                                            </div>
                                        </label>
                                        <input type="text" id="ccvCard" name="ccvCard" autocomplete="off"
                                            maxlength="4" />
                                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                        <small id="smallCcvCard"></small>
                                    </div>
                                </div>


                                <div class="form-control input-terms">

                                    <input type="checkbox" name="texes" id="taxes">
                                    <label for="taxes">
                                        
                                        <p> Deseo cubrir los gastos de transacción de mi donación.</p>
                                    </label>

                                </div>
                                <div class="form-control input-terms">

                                    <input type="checkbox" name="terms" id="check">
                                    <label for="check">
                                        
                                        <p> He leído y estoy de acuerdo con la <a
                                                href="legal/politica-de-privacidad">Política de Privacidad</a> y los <a
                                                href="legal/terminos-y-condiciones">Términos y Condiciones</a> de
                                            Fundación Redes de Ayuda.</p>
                                    </label>

                                </div>

                                <input type="hidden" name="ajax-credit">
                                <button id="validate-credit-card" name="validate-credit-card">
                                    Donar Ahora
                                </button>
                                <!-- <div class="safe"> -->
                                <!-- <img src="img/svg/safe.svg" alt=""> -->
                                <!-- </div> -->
                                <div class="safe">
                                    <i class="fas fa-lock icon"></i> SSL Donación Encriptada
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="method paypal">
                    <div class="title">
                        <div class="icon-title">
                            <i class="fab fa-paypal icon"></i> PayPal
                        </div>

                    </div>
                    <div class="content">
                        <p class="paragraph">Una donación totalmente segura desde cualquier parte del mundo. <span>
                                ¡Todo aporte que hagas siempre será bienvenido! </span> </p>
                        <!-- <div class="donate-paypal">
                            <a href="">Donar con PayPal</a>
                        </div> -->
                        <form action="https://www.paypal.com/donate" method="post" target="_top">
                            <input type="hidden" name="hosted_button_id" value="C9DR9SLLNK9E6" />
                            <input type="image" src="img/svg/paypal-donate.svg" border="0" name="submit"
                                title="PayPal - La forma más facil y segura de donar online!"
                                alt="Donar con Botón de PayPal" />
                            <img alt="" border="0" src="https://www.paypal.com/en_GT/i/scr/pixel.gif" width="1"
                                height="1" />
                        </form>


                    </div>

                </div>
                <div class="method banks mostrarArriba">
                    <div class="title">
                        <div class="icon-title">
                            <i class="fas fa-landmark icon"></i> Depósito Bancario
                        </div>

                    </div>
                    <div class="content">
                        <p class="paragraph">Puedes hacer tu donativo por medio de tu banca en línea o en tu agencia más
                            cercana a cualquiera de estas cuentas:</p>
                        <div class="bank">
                            <a href="https://www.bienlinea.bi.com.gt/InicioSesion/Inicio/Autenticar#!">
                                <span class="type">Monetaria</span>
                                <div class="bank-img">
                                    <img src="img/logos/bi.svg" alt="Banco Insutrial">
                                </div>
                                <div class="bank-number">
                                    <h3>Fundación Redes de Ayuda</h3>
                                    <p>120-33904-04340-023</p>
                                </div>
                            </a>
                        </div>
                        <div class="bank">
                            <a href="https://www2.baccredomatic.com/es-sv/tutoriales/banca-en-linea">
                                <span class="type">Monetaria</span>
                                <div class="bank-img">
                                    <img src="img/logos/bac.svg" alt="Banco Insutrial">
                                </div>
                                <div class="bank-number">
                                    <h3>Fundación Redes de Ayuda</h3>
                                    <p>120-33904-04340-023</p>
                                </div>
                            </a>
                        </div>
                        <div class="bank">
                            <a href="https://www.banrural.com.gt/cb/pages/jsp-ns/login-cons.jsp">
                                <span class="type">Monetaria</span>
                                <div class="bank-img">
                                    <img src="img/logos/banrural.svg" alt="Banco Insutrial">
                                </div>
                                <div class="bank-number">
                                    <h3>Fundación Redes de Ayuda</h3>
                                    <p>120-33904-04340-023</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="method product mostrarArriba">
                    <div class="title">
                        <div class="icon-title">
                            <i class="fas fa-people-carry icon"></i> Donación en Especie
                        </div>

                    </div>
                    <div class="content">
                        <p class="paragraph">¿Deseas donar algún bien que poseas? Será recibido con gusto, comunícate
                            con nosotros y te haremos saber qué procede, si te encuentras en la cuidad capitalina
                            nuestro equipo puede reunirse contigo en un lugar seguro.</p>
                        <div class="img">
                            <img src="img/svg/carry.svg" alt="">
                        </div>
                        <div class="button">
                            <a href="contacto">Contactar </a>
                        </div>
                    </div>

                </div>
                <div class="method sponsor mostrarArriba">
                    <div class="title">
                        <div class="icon-title">
                            <i class="fas fa-heart icon"></i> Patrocinar nuestra Fundación

                        </div>

                    </div>
                    <div class="content">
                        <p class="paragraph">Conviértete en patrocinador oficial de Fundación Redes de Ayuda mostrando
                            tu apoyo constantemente, ayudando al necesitado en Guatemala junto con nosotros.</p>
                        <div class="img">
                            <img src="img/svg/hands.svg" alt="">
                        </div>
                        <div class="button">
                            <a href="patrocinadores">Ser Patrocinador</a>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <section class="why-donate">

            <div class="why-container">
                <div class="why-card">
                    <h2>
                        Tu Aporte Hace la Diferencia
                    </h2>
                    <p>
                        Cada donación genera un impacto positivo en la vida de los guatemaltecos que lo necesitan ¡Cada
                        centavo cuenta!
                    </p>

                    <div id="response-news"></div>
                    <div class="why-content">
                        <!-- <h3 class="why-h3">Proyecto Reciente</h3> -->
                        <?php
                            include("php/db.php");

                            $query = "SELECT * FROM proyectos WHERE publicacion = 'publicado' ORDER BY id DESC LIMIT 1";
                            $result = $connection->query($query);
                            while($rowProyect = $result->fetch_assoc()){
                    
                        ?>
                        <div id="response"></div>
                        <div class="proyect">
                            <form action="" method="POST" class="form-save-proyect">


                                <?php

                                if(isset($_SESSION["user"])){
                                    $tokenId = $_SESSION["user"];
                                
                                    $idProyect = $rowProyect["id"];

                                    $verify = mysqli_query($connection, "SELECT id_proyecto, tokenId FROM proyectos_guardados WHERE id_proyecto = '$idProyect' AND tokenId = '$tokenId'");

                                    if(mysqli_num_rows($verify) == 0) {
                                        $html = '
                                        <i class="far fa-bookmark icon"></i>
                                                                
                                        ';
                                        $class = "";
                                        $title ="Guardar Proyecto";
                                    }else{
                                        $html = '
                                        <i class="fas fa-bookmark icon"></i>
                                                            
                                        ';  
                                        $class = "saved";
                                        $title ="Proyecto Guardado";
                                    }
                                }
                                ?>

                                <button name="save-proyect" class="save-proyect <?php if(isset($_SESSION["user"])){ echo $class;}else{echo '';}?>"
                                    id="<?php if(isset($_SESSION["user"])){ echo 'save-proyect-'.$rowProyect["id"];}else{echo '';} ?>"  title="<?php if(isset($_SESSION["user"])){ echo $title;}else{echo '';} ?>">

                                    <?php if(isset($_SESSION["user"])){ echo $html; }else{ echo ' <i class="far fa-bookmark icon"></i>';}?>

                                </button>
                                <input type="hidden" name="ajax-proyect" value="<?php if(isset($_SESSION["user"])){  echo $rowProyect["id"];}else{echo '';} ?>">
                            </form>
                            <a href="nuestros-proyectos/<?php echo $rowProyect["link"]; ?>">

                                <div class="proyect-img opacity">
                                    <img class="lazy-proyect" src="preview-img/<?php echo $rowProyect["imagen"]; ?>"
                                        alt="<?php echo $rowProyect["imagen"]; ?>">
                                    <span class="state"><?php echo $rowProyect["estado"];?></span>
                                   
                                </div>
                                <div class="proyect-des">


                                    <h3>
                                        <?php echo ucfirst($rowProyect["titulo"]);?>

                                    </h3>
                                    <div class="proyect-number">
                                        <span class="number">Proyecto No. <?php echo $rowProyect["id"];?></span> <time datetime="<?php echo $rowProyect["fecha_orden"] ?>"
                                    class="proyect-date"><?php echo $rowProyect["fecha"];?></time>
                                    </div>
                                    <p>
                                        <?php echo $rowProyect["descripcion"];?>
                                    </p>
                                    <div class="proyect-progress">
                                        <div class="percent opacity"></div>
                                        <div class="progress">
                                            <div class="progress-bar progressAnimation">

                                            </div>
                                        </div>
                                        <div class="progress-amount">
                                            <span class="initial-amount">
                                                <b>

                                                    <?php
                                        if($rowProyect["moneda"] == "GTQ"){echo "Q";}else{echo "$";}
                                    ?>
                                                </b>
                                                <b>
                                                    <?php echo $rowProyect["cantidad_inicial"];?>
                                                </b>
                                            </span>
                                            <span class="final-amount">
                                                <b>
                                                    <?php
                                        if($rowProyect["moneda"] == "GTQ"){echo "Q";}else{echo "$";}
                                    ?>

                                                </b>
                                                <b>

                                                    <?php echo $rowProyect["cantidad_final"];?>
                                                </b>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                        <!-- <h3 class="why-h3">Noticias Relacionadas</h3> -->
                        <div class="news-main-container">
                            <?php
                            include("php/db.php");

                            $categoria = "categoria-3";

                            $query = "SELECT * FROM noticias WHERE categoria = '$categoria' AND publicacion = 'publicado' ORDER BY fecha_orden DESC LIMIT 4";
                            $result = $connection->query($query);
                            while($rowNewsTwo = $result->fetch_assoc()){
                        
                        ?>
                            <div class="main-card" data-item="<?php 
                            echo $rowNewsTwo["categoria"]; ?>">

                                <form action="" method="POST" class="form-save-news">

                                    <?php
                                    if(isset($_SESSION["user"])){
                                        $tokenId = $_SESSION["user"];

                                        $idProyect = $rowNewsTwo["id"];

                                        $verify = mysqli_query($connection, "SELECT id_noticia, tokenId FROM noticias_favoritas WHERE id_noticia = '$idProyect' AND tokenId = '$tokenId'");

                                        if(mysqli_num_rows($verify) == 0) {
                                            $html = '
                                            <i class="far fa-heart icon"></i>
                                                                    
                                            ';
                                            $class = "";
                                            $title ="Marcar como Favorita";
                                        }else{
                                            $html = '
                                            <i class="fas fa-heart icon"></i>
                                                                
                                            ';  
                                            $class = "saved";
                                            $title ="Guardada en Favoritos";
                                        }
                                    }
                                    ?>

                                    <button name="save-news" class="save-news <?php if(isset($_SESSION["user"])){ echo $class;}else{echo '';}?>"
                                        id="<?php if(isset($_SESSION["user"])){ echo 'save-news-'.$rowNewsTwo["id"];}else{echo '';} ?>"  title="<?php if(isset($_SESSION["user"])){ echo $title;}else{echo '';} ?>">

                                        <?php if(isset($_SESSION["user"])){ echo $html; }else{ echo ' <i class="far fa-heart icon"></i>';}?>

                                    </button>
                                    <input type="hidden" name="ajax-news" value="<?php if(isset($_SESSION["user"])){  echo $rowNewsTwo["id"];}else{echo '';} ?>">
                                </form>

                                <a href="noticias/<?php echo $rowNewsTwo["categoria"]."/".$rowNewsTwo["link"]; ?>" class="main-card-link">

                                    <div class="main-card-des">
                                        <span class="category <?php  echo $rowNewsTwo["categoria"] ?>"><?php  echo $rowNewsTwo["categoria"] ?></span>

                                        <h3><?php echo ucfirst($rowNewsTwo["titulo"]); ?></h3>
                                        <div>

                                            <span class="read"><i class="fas fa-book icon"></i><?php echo $rowNewsTwo["tiempo_lectura"]; ?></span>
                                            <time datetime="<?php echo $rowNewsTwo["fecha_orden"] ?>"><?php echo $rowNewsTwo["dia"] . " de " . $rowNewsTwo["mes"] . " " . $rowNewsTwo["año"]; ?></time>
                                        </div>


                                    </div>
                                    <div class="main-card-img opacity">
                                    
                                        
                                        <img class="lazy-news" src="preview-img/<?php echo $rowNewsTwo["imagen"]; ?>" alt="">

                                    </div>
                                </a>
                            </div>
                            <?php } ?>


                        </div>

                    </div>

                </div>


            </div>

            <div class="section-waves">

                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                    <path fill="#000" fill-opacity="1"
                        d="M0,128L48,128C96,128,192,128,288,144C384,160,480,192,576,218.7C672,245,768,267,864,250.7C960,235,1056,181,1152,165.3C1248,149,1344,171,1392,181.3L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>


        <section class="share">
            <div class="why-background opacity">
                <div class="why-card-share">

                    <h3>
                        ¿No puedes donar?
                        <span>¡Comparte!</span>
                    </h3>
                    <p> Así cada vez más personas podrán formar parte de este cambio en Guatemala.</p>

                    <div class="share-social donate mostrarArriba">
                        <div class="share-donate" id="share-donate">
                            <i class="fas fa-share-alt icon"></i>
                            Compartir Página
                        </div>
                    </div>


                </div>
                <div class="why-card-img opacity">

                </div>

            </div>

        </section>

        <div id="copy-msg">
            <span> ¡Enlace Copiado! </span>
        </div>
    </main>

    <div class="close-donation" id="close-donation">
        <i class="fas fa-times icon"></i>
    </div>

    <div class="share-container" id="share-container">
        <div class="share-img">
            <img src="img/svg/share.svg" alt="Compartir el proyecto">
        </div>
        <div class="share-content">
            <h3>¡Comparte la Causa!</h3>
            <div class="share-link">
                <div class="form-control input-url">
                    <input type="text" id="input-url" value="https://www.fundacionredesdeayuda.org/donar">
                    <div class="copy-input" id="copy-input">
                        Copiar
                    </div>
                </div>
            </div>

            <div class="share-social">
                <ul>

                    <li class="share-social fb" title="Compartir en Facebook">
                        <a href="https://www.fundacionredesdeayuda.org/donar" title="Compartir en Facebook">
                            <i class="fab fa-facebook-f icon"></i>
                        </a>
                    </li>
                    <li class="share-social tw" title="Compartir en Twitter">
                        <a href="https://twitter.com/intent/tweet?text=¡No+dejes+para+mañana,+la+ayuda+que+puedas+dar+hoy!&amp;url=https://www.fundacionredesdeayuda.org/donar"
                            title="Compartir en Twitter">
                            <i class="fab fa-twitter icon"></i>
                        </a>
                    </li>
                    <li class="share-social ws" title="Compartir por WhatsApp">
                        <a href="https://api.whatsapp.com/send?text=¡No+dejes+para+mañana,+la+ayuda+que+puedas+dar+hoy!+https://www.fundacionredesdeayuda.org/donar"
                            title="Compartir por WhatsApp">
                            <i class="fab fa-whatsapp icon"></i>
                        </a>
                    </li>
                    <li class="share-social em" title="Compartir por Correo Electrónico">
                        <a href="mailto:?subject=¡No dejes para mañana, la ayuda que puedas dar hoy!&body=https://www.fundacionredesdeayuda.org/donar"
                            title="Compartir por Correo">
                            <i class="fas fa-envelope icon"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <?php include_once("php/cookies.php"); ?>

    <?php include_once("php/footer.php"); ?>


    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>