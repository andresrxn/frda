<?php include_once("php/connection-user.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FAQ | Fundación Redes de Ayuda </title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">

    <meta name="description" content="¿Alguna duda sobre nosotros? probablemente ya la hemos contestado, ¡Averígualo aquí! ">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/faq.css">

    
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="js/cookies.js"></script>

    <script defer src="js/faq.js"></script>
    <script defer src="js/main.js "></script>

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
    <meta property="og:title" content="FAQ | Fundación Redes de Ayuda" />
    <meta property="og:description" content="¿Alguna duda sobre la Fundación? probablemente ya la hemos contestado, ¡averígualo aquí!">
    <meta property="og:image" content="img/logos/redes-de-ayuda.svg">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="FAQ | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="¿Alguna duda sobre la Fundación? probablemente ya la hemos contestado, ¡averígualo aquí!">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.svg">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />


</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <?php include_once("php/header.php"); ?>

    <main>
        <section class="faq ">
            <div class="faq-title">
                <h1 class="h1">Preguntas Frecuentes</h1>
                <span class="faq-span">Selecciona una Categoría</span>
            </div>
            <div class="categorias" id="categorias">
                <div class="categoria activa" data-categoria="fundacion">


                    <p> <i class="fas fa-users icon"></i>
                        <span>Nuestra</span>
                        <span>Fundación</span>
                    </p>

                </div>
                <div class="categoria" data-categoria="donativos">


                    <p> <i class="fas fa-gift icon"></i>
                        <span>Aportes</span>
                        <span>Y Donativos</span>
                    </p>

                </div>
                <div class="categoria" data-categoria="operacion">


                    <p> <i class="fas fa-briefcase icon"></i>
                        <span>Operaciones</span>
                        <span>Y Ejecución</span>
                    </p>

                </div>
                <div class="categoria" data-categoria="proyectos">

                    <p> <i class="far fa-calendar-check icon"></i>
                        <span>Proyectos</span>
                        <span>Propios</span>
                    </p>

                </div>
            </div>

            <div class="preguntas">

                <!-- Preguntas Fundación -->
                <div class="accordion contenedor-preguntas activo" data-categoria="fundacion">
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur adipisicing.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam illo exercitationem omnis et, repudiandae sint fugit qui assumenda cupiditate nulla deserunt dicta dolorem officiis hic, facilis distinctio pariatur ipsum ullam!
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>



                </div>


                <div class="accordion contenedor-preguntas" data-categoria="donativos">
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur adipisicing.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam illo exercitationem omnis et, repudiandae sint fugit qui assumenda cupiditate nulla deserunt dicta dolorem officiis hic, facilis distinctio pariatur ipsum ullam!
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">Lorem ipsum dolor sit.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Preguntas Operación -->

                <div class="accordion contenedor-preguntas" data-categoria="operacion">
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur adipisicing.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam illo exercitationem omnis et, repudiandae sint fugit qui assumenda cupiditate nulla deserunt dicta dolorem officiis hic, facilis distinctio pariatur ipsum ullam!
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">Lorem ipsum dolor sit.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Preguntas Proyectos -->

                <div class="accordion contenedor-preguntas" data-categoria="proyectos">
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur adipisicing.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam illo exercitationem omnis et, repudiandae sint fugit qui assumenda cupiditate nulla deserunt dicta dolorem officiis hic, facilis distinctio pariatur ipsum ullam!
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Saepe.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">Lorem ipsum dolor sit.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">Lorem ipsum dolor sit.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            Lorem ipsum dolor sit amet consectetur.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">Lorem ipsum dolor sit.
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestias error voluptatibus sequi, libero accusamus aut consequatur. Repellat, aliquid. Ullam cumque atque autem reprehenderit possimus minima praesentium error tenetur assumenda accusamus.
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="section-waves">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320"><path fill="#f4f4f4" fill-opacity="1" d="M0,192L48,165.3C96,139,192,85,288,69.3C384,53,480,75,576,106.7C672,139,768,181,864,202.7C960,224,1056,224,1152,202.7C1248,181,1344,139,1392,117.3L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
            </div>
        </section>


        <section class="faq-contact">
            <div class="form-title">
                <h2>¿Tienes Otra Pregunta?</h2>
                <p>Háznosla saber y te responderemos lo más pronto posible</p>
            </div>

            <div id="response"></div>
            <form action="" method="POST" id="form" class="form">
                <div class="form-img mostrarArriba">
                    <img src="img/svg/question.svg" alt="Ilustración Correo Electrónico" title="Créditos: https://undraw.co/illustrations">
                </div>
                <div class="form-container opacity">


                    <div class="form-control input-name">
                        <label for="name">Nombre(s) y Apellido(s)</label>
                        <input type="text" id="inputName" name="name" autocomplete="off" />
                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallName"></small>
                    </div>
                    <div class="form-control input-mail">
                        <label for="email">Correo Electrónico</label>
                        <input type="text" id="inputEmail" name="email" autocomplete="off" />
                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallEmail"></small>
                    </div>

                    <div class="form-control input-msg">
                        <label for="msg">Tu Duda o Pregunta</label>
                        <textarea name="msg" id="inputMsg" cols="30" rows="10" autocomplete="off"></textarea>
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
                        <button id="btnSubmit" name="btnSubmit">Enviar Pregunta</button>
                   



                </div>

            </form>



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