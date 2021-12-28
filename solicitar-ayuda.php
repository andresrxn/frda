<?php include_once("php/connection-user.php"); ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Permítenos Ayudarte | Fundación Redes de Ayuda</title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">

    <meta name="description" content="Formulario para solicitar ayuda para personas actualmente sin empleo, con incapacidad laboral o edad avazada.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/help.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="js/cookies.js"></script>

    <script defer src="js/main.js "></script>
    <script defer src="js/help.js"></script>
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
    <meta property="og:title" content="Ayuda a Personas Desempleadas | Fundación Redes de Ayuda" />
    <meta property="og:description" content="Formulario para solicituar ayuda para personas actualmente sin empleo y en busca de.">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Ayuda a Personas Desempleadas | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="Formulario para solicituar ayuda para personas actualmente sin empleo y en busca de.">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
   

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include_once("php/header.php"); ?>


    <main>
        <section class="banner">
            <div class="banner-container">
                <div class="banner-title">
                    <h1 class="h1">Permítenos Ayudarte</h1>
                    <p>"Así que no temas, porque yo estoy contigo; no te angusties, porque yo soy tu Dios. Te fortaleceré y te ayudaré; <span>te sostendré con mi diestra victoriosa".</span>

                    </p>
                    <span>Isaías 41:10 NVI</span>
                </div>

                <div id="response"></div>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="form" class="form">
                    <div class="form-img mostrarArriba">
                        <img src="img/svg/volunteers.svg" alt="Ilustración Correo Electrónico" title="Créditos: https://undraw.co/illustrations">
                        <div class="img-contact opacity">
                            <div class="img-whatsapp img-card">
                                <a href="">
                                    <i class="fab fa-whatsapp icon"></i> Solicitar Ayuda por WhatsApp
                                </a>
                            </div>
                            <div class="img-messenger img-card">
                                <a href="">
                                    <i class="fab fa-facebook-messenger icon"></i> Solicitar Ayuda por Messenger
                                </a>
                            </div>
                            <p>o puedes llenar nuestro formulario</p>
                        </div>
                    </div>
                    <div class="form-container opacity">


                        <div class="form-control input-name">
                            <label for="name">Nombre(s) y Apellido(s)</label>
                            <input type="text" id="inputName" name="name" autocomplete="off" value = "<?php 
                        if(isset($_SESSION["user"]) && isset($_SESSION["priv"]) ){
                            echo $row["nombre"] . " " . $row["apellido"];
                        }else{
                            echo '';
                        }
                        ?>" />
                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallName"></small>
                        </div>
                        <div class="form-control input-mail">
                            <label for="email">Correo Electrónico</label>
                            <input type="text" id="inputEmail" name="email" autocomplete="off" value = "<?php 
                        if(isset($_SESSION["user"]) && isset($_SESSION["priv"]) ){
                            echo $row["correo"];
                        }else{
                            echo '';
                        }
                        ?>" />
                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallEmail"></small>
                        </div>
                        <div class="form-control input-phone">
                            <label for="username">Telefóno <b>(Opcional)</b></label>
                            <input type="number" id="inputPhone" name="phone" autocomplete="off"  value = "<?php 
                        if(isset($_SESSION["user"]) && isset($_SESSION["priv"]) ){
                            if($row["telefono"] != 0)
                            echo $row["telefono"];
                        }else{
                            echo '';
                        }
                        ?>" />


                            <i class="inputIcon inputIconPhone fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon inputIconPhone fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallPhone"></small>
                        </div>
                        <div class="form-control input-subject">
                            <label for="subject">¿Cuál es tu Situación?</label>
                            <select name="subject" id="subject">
                                
                            
                            <option selected value="Desempleado/a">Desempleado/a</option>
                            
                            <option value="Madre Soltera o Viuda">Madre Soltera o Viuda</option>
                            <option value="Enfermedad o Invalidez">Con Enfermedad o Invalidez</option>
                            
                            </select>
                            <div class="subject-date">

                                <p> <i class="fas fa-info-circle icon"></i> Nosotros te haremos saber qué días tenemos disponibles para atenderte</p>
                            </div>
                            <div class="arrow-icon">
                                <i class="fas fa-chevron-down icon"></i>
                            </div>
                        </div>
                        <div class="form-control input-check">
                            <label>¿Qué ayuda necesitas?</label>

                            <div class="checkbox-block">

                                <input class="checkbox-effect checkbox-effect-2" id="pago-de-servicios" type="checkbox" name="check_list[]" value="Pago de servicios" />
                                <label for="pago-de-servicios">Pago de Servicios</label>


                                <input class="checkbox-effect checkbox-effect-2" id="asesoria-laboral" type="checkbox" name="check_list[]" value="Asesoria laboral" />
                                <label for="asesoria-laboral">Asesoría/Ubicación Laboral</label>

                                <input class="checkbox-effect checkbox-effect-2" id="pago-de-educacion" type="checkbox" name="check_list[]" value="Pago de Educación Académica" />
                                <label for="pago-de-educacion">Pago de Educación Académica</label>

                                <input class="checkbox-effect checkbox-effect-2" id="beca-universitaria" type="checkbox" name="check_list[]" value="Beca Universitaria" />
                                <label for="beca-universitaria">Becas Universitarias</label>

                                <input class="checkbox-effect checkbox-effect-2" id="orientacion-vocacional" type="checkbox" name="check_list[]" value="Orientacion vocacional" />
                                <label for="orientacion-vocacional">Consejería</label>


                                <input class="checkbox-effect checkbox-effect-2" id="canasta-basica" type="checkbox" name="check_list[]" value="Canasta Basica" />
                                <label for="canasta-basica">Canasta Básica</label>

                                <input class="checkbox-effect checkbox-effect-2" id="consultas-medicas" type="checkbox" name="check_list[]" value="Consultas Médicas" />
                                <label for="consultas-medicas">Consultas Médicas</label>


                                <input class="checkbox-effect checkbox-effect-2" id="pago-medicamentos" type="checkbox" name="check_list[]" value="Pago de Medicamentos/Tratamiento" />
                                <label for="pago-medicamentos">Medicamentos o Tratamiento</label>


                                <input class="checkbox-effect checkbox-effect-2" id="oracion-y-guianza" type="checkbox" name="check_list[]" value="Oracion y guianza" />
                                <label for="oracion-y-guianza">Oración y Guianza</label>

                                <input class="checkbox-effect checkbox-effect-2" id="otros" type="checkbox" name="check_list[]" value="Otros..." />
                                <label for="otros">Otros...</label>

                                <small id="smallCheck"></small>
                            </div>


                        </div>
                        <div class="form-control input-msg">
                            <label for="msg">Cuéntanos acerca de tu situación</label>
                            <textarea name="msg" id="inputMsg" cols="30" rows="10"></textarea>
                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallMsg"></small>
                        </div>
                        <div class="form-control input-terms">

                            <input type="checkbox" name="terms" id="check">
                            <label for="check">
                            <span></span> <p> He leído y estoy de acuerdo con la <a href="legal/politica-de-privacidad">Política de Privacidad</a> y los <a href="legal/terminos-y-condiciones">Términos y Condiciones</a> de Fundación Redes de Ayuda.</p>
                            </label>
                        
                        </div>
                        <input type="hidden" name="ajax">
                        
                        <button id="btnSubmit" name="btnSubmit">Solicitar Ayuda</button>
                            
                            
                    



                    </div>

                </form>


            </div>
        </section>

    </main>

    <div class="email-sent" id="email-sent">
        <div class="img">
            <img src="" alt="">
        </div>
        <div class="content">
            <h3></h3>
            <p><i class="fas fa-heart icon"></i></p>
            <button id="btnSent"></button>
        </div>
    </div>

    <?php include_once("php/cookies.php"); ?>
    
    <?php include_once("php/footer.php"); ?>





    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>