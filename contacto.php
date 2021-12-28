<?php include_once("php/connection-user.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contacto | Fundación Redes de Ayuda </title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">

    <meta name="description" content="¡Hábla con nosotros!, nos dará gusto saber tus opiniones o preguntas acerca de nuestra Fundación.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/contact.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js " integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=" "></script>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.5/typed.min.js" integrity="sha512-1KbKusm/hAtkX5FScVR5G36wodIMnVd/aP04af06iyQTkD17szAMGNmxfNH+tEuFp3Og/P5G32L1qEC47CZbUQ==" crossorigin=" anonymous" referrerpolicy="no-referrer"></script>


    <script defer src="js/cookies.min.js"></script>
    <script defer src="js/contact.js"></script>
    <script defer src="js/main.js"></script>
    <script defer src="js/form-validation.js"></script>

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

    <meta property="og:url" content="https://fundacionredesdeayuda.org">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Contacto | Fundación Redes de Ayuda" />
    <meta property="og:description" content="¡Hábla con nosotros!, nos dará gusto saber tus opiniones o dudas acerca de nuestra Fundación.">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Contacto | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="¡Hábla con nosotros!, nos dará gusto saber tus opiniones o dudas acerca de nuestra Fundación.">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">

  <!--favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />


</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php include_once("php/header.php"); ?>


    
    <main>
        <section class="banner-contact">

            <h1 class=" h1">¿Cómo Podemos Ayudarte?</h1>
            <h2>Déjanos saber tus: <span class="typed"></span></h2>
           

        </section>

        <section class="contact">
            <div class="contact-container">


                <div id="responseContact"></div>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="form" class="form mostrarArriba">
                    <div class="form-img ">
                        <img src="img/svg/customer_service.svg" alt="Ilustración Correo Electrónico" title="Créditos: https://undraw.co/illustrations">

                        <div class="nav-social-container">
                            <div class="nav-social-card fb" title="Dános Me Gusta en Facebook">
                                <a href="https://www.facebook.com/f.RedesdeAyuda" target="_blank">
                                    <i class="fab fa-facebook-f icon"></i>
                                    <span>Facebook</span>
                                </a>
                            </div>
                            <div class="nav-social-card ig" title="Síguenos en Instagram">
                                <a href="">
                                    <i class="fab fa-instagram icon"></i>
                                    <span>Instagram</span>
                                </a>
                            </div>
                            <div class="nav-social-card tg" title="Sígue Nuestro Canal de Noticias">
                                <a href="">
                                    <i class="fab fa-telegram-plane icon"></i>
                                    <span>Telegram</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-container">


                        <div class="form-control input-name">
                            <label for="name">Nombre(s) y Apellido(s)</label>
                            <input type="text" id="inputName" name="name" value = "<?php 
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
                            <input type="text" id="inputEmail" name="email" value = "<?php 
                            if(isset($_SESSION["user"]) && isset($_SESSION["priv"]) ){
                                echo $row["correo"];
                            }else{
                                echo '';
                            }
                            ?>"/>
                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallEmail"></small>
                        </div>
                        <div class="form-control input-phone">
                            <label for="username">Telefóno <b>(Opcional)</b></label>
                            <input type="number" id="inputPhone" name="phone"  value = "<?php 
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
                            <label for="subject">Asusto</label>
                            <select name="subject" id="subject">
                                <option value="Pregunta/Duda">Pregunta o Duda</option>
                                
                                <option value="Agendar Cita">Agendar Cita</option>
                                <option value="Donación en Especie">Donación en Especie</option>
                                <option value="Solicitud de Reembolso">Solicitud de Reembolso</option>
                                <option value="Solicitar Información">Solicitar Información</option>
                                <option value="Comentario">Comentario</option>
                                <option value="Queja">Queja</option>
                                <option value="Otro...">Otro...</option>
                            </select>
                            
                            <div class="arrow-icon">
                                <i class="fas fa-chevron-down icon"></i>
                            </div>
                        </div>
                        <div class="subject-date">

                                <p> <i class="fas fa-info-circle icon"></i> Nosotros te haremos saber qué días tenemos disponibles para atenderte lo más pronto posible.</p>
                            </div>
                        <div class="form-control input-msg">
                            <label for="msg">Déjanos saber tus preguntas</label>
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
                  
                        <input type="hidden" name="AJAX">
                        
                        <button id="btnSubmit" name="btnSubmit">Enviar Mensaje</button>
                            
                        



                    </div>

                </form>
            </div>


        </section>

        <section class="contact-msg">

            <div class="msg-container">
                <div class="msg-phone">
                    <p>
                        <span>¡Llámanos!</span>
                        <a href="tel:+50200000000" onClick="return(navigator.userAgent.match(/ Android | iPhone | mobile /i)) !=null;">
                            <i class="fas fa-phone icon"></i> +502 2525-2525</a>
                    </p>
                </div>
                <div class="msg-chat">
                    <p>Ó Escríbenos Por:</p>
                    <div>
                    <div class="msg-card email opacity" >
                            <a href="">
                                <i class="fas fa-envelope icon"></i>
                                <span>Email</span>
                            </a>
                        </div>
                        <div class="msg-card telegram opacity" >
                            <a href="">
                                <i class="fab fa-telegram-plane icon"></i>
                                <span>Telegram</span>
                            </a>
                        </div>
                        <div class="msg-card wts opacity" >
                            <a href="">
                                <i class="fab fa-whatsapp icon"></i>
                                <span>WhatsApp</span>
                            </a>
                        </div>
                        
                        <div class="msg-card msg opacity" >

                            <a href="">
                                <i class="fab fa-facebook-messenger icon"></i>
                                <span> Messenger</span>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="msg-faq">
                    También puedes visitar la sección de <a href="preguntas-frecuentes">Preguntas Frecuentes (FAQ)</a>
                </div>


            </div>


        </section>

        <section class="loc" id="ubicacion">
            <div class="section-waves">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,293.3C960,277,1056,235,1152,213.3C1248,192,1344,192,1392,192L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
            </div>
            <div class="section-waves section-waves-two">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,138.7C384,160,480,224,576,261.3C672,299,768,309,864,293.3C960,277,1056,235,1152,213.3C1248,192,1344,192,1392,192L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
            </div>
            <div class="loc-map">
                <div id="map">
                </div>

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