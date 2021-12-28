<?php include_once("php/connection-user.php"); ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--About-->
    <title>Patrocinadores | Fundación Redes de Ayuda </title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">
    <meta name="keywords" content="Fundacion, contacto, Guatemala, necesidad, financiamiento, trabajo">
    <meta name="description"
        content="Se parte de nosotros y ayudemos juntos al necesitado en Guatemala, ¡No dejes pasar la oportunidad! ">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--Styles-->
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/sponsors.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>

    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script defer src="js/cookies.js"></script>
    <script defer src="js/main.js "></script>
    <script defer src="js/sponsors.js"></script>


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
    <meta property="og:title" content="Patrocinadores | Fundación Redes de Ayuda" />
    <meta property="og:description"
        content="Se parte de nosotros y ayudemos juntos al necesitado en Guatemala, ¡No dejes pasar la oportunidad! ">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Patrocinadores | Fundación Redes de Ayuda">
    <meta name="twitter:description"
        content="Se parte de nosotros y ayudemos juntos al necesitado en Guatemala, ¡No dejes pasar la oportunidad! ">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">

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
                <div class="banner-title ">
                    <h1 class="h1">Únete a Nosotros</h1>
                    <p>Más y más personas se unen cada día para ayudar al necesitado junto con nosotros, será un placer
                        recibirte a tí también.</p>
                    <div class="show-form" id="show-form">
                        <p>Llenar Formulario <i class="fas fa-plus icon"></i></p>
                    </div>
                </div>
            </div>
            <div class="banner-img ">
                <img src="patrocinios/logos-patrocinio/banner-logos.jpg" alt="Patrocinadores Fundación Redes de Ayuda"
                    class="banner-img-sponsors">

            </div>


            <div id="response"></div>
            <form action="" method="POST" id="form" class="form sponsors-form opacity">
                <div class="form-img mostarArriba">
                    <img src="img/svg/sponsors.svg" alt="">
                </div>
                <div class="form-container">

                    <!-- <div class="steps-container"> -->
                        <!-- <div class="step-title" id="step-title">
                            <div class="step-number step-number-one active">
                                <b>1</b>
                                <span>Datos</span>
                                <span>Empresariales</span>

                            </div>
                            <div class="step-number step-number-two">
                                <b>2</b>
                                <span>Contacto</span>
                                <span>Directo</span>

                            </div>
                            <div class="step-number step-number-three">
                                <b>3</b>
                                <span>Información</span>
                                <span>Adicional</span>
                            </div> -->
                        <!-- </div>
                        <div class="step-content">
                            <div class="step step-one active"> -->

                                <div class="form-control input-company">
                                    <label for="company">Razón Social</label>
                                    <input type="text" id="inputNameCompany" name="company" autocomplete="off" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallCompany"></small>
                                </div>
                                <!-- <div class="form-control input-category">
                                    <label for="category">Categoría o Tipo de Empresa</label>
                                    <input type="text" id="inputCategory" name="category" autocomplete="off" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallCategory"></small>
                                </div> -->

                                <div class="form-control input-website">
                                    <label for="website">Sitio Web o Red Social <b> (opcional)</b></label>
                                    <input type="text" id="inputWebsite" name="website" autocomplete="off" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallWebsite"></small>
                                </div>
                                <!-- <div class="form-control input-adress">
                                    <label for="adress">Dirección Completa <b></b></label>
                                    <input type="text" id="inputAdress" name="adress" autocomplete="off" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallAdress"></small>
                                </div> -->
                                <div class="form-control input-rep-email">
                                    <label for="repEmail">Correo del Representante Legal</label>
                                    <input type="text" id="inputRepMail" name="repEmail" autocomplete="off" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallRepEmail"></small>
                                </div>
                                
                                <div class="form-control input-subject input-kind-help" id="input-kind-help">
                                    <label for="help">Tipo de Ayuda </label>
                                    <select name="help" id="kind-help">
                                        <option value="Monetaria">Monetaria</option>

                                        <option value="En Especie">En Especie </option>
                                        <option value="Publicitándonos">Publicitándonos</option>
                                        <option value="Prestando Servicios">Prestando Servicios</option>
                                        <option value="Otro">Otro (especificar)</option>
                                    </select>

                                    <div class="arrow-icon">
                                        <i class="fas fa-chevron-down icon"></i>
                                    </div>
                                </div>
                                <div class="form-control subject-kind">
                                    <input type="text" id="other-help" name="other-help" autocomplete="off"
                                        placeholder="¿Cómo deseas ayudarnos?" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallHelp"></small>
                                </div>
                                <div class="form-control input-terms">

                                    <input type="checkbox" name="terms" id="check">
                                    <label for="check">
                                        <span></span>
                                        <p> He leído y estoy de acuerdo con la <a
                                                href="legal/politica-de-privacidad">Política de Privacidad</a> y los <a
                                                href="legal/terminos-y-condiciones">Términos y Condiciones</a> de
                                            Fundación Redes de Ayuda.</p>
                                    </label>

                                </div>
                                <input type="hidden" name="ajax-sponsors">
                                <button id="sponsors-validate">Enviar Solicitud</button>
                                <div class="sponsors-info">
                                    <p> <i class="fas fa-info-circle icon"></i> Nos comunicaremos con el representante legal para compartirle toda la información correspondiente</p>
                                </div>
                            </div>
                            <!-- <div class="step step-two">

                                <p class="back back-to-one">
                                    <i class="fas fa-chevron-left icon"></i> Regresar
                                </p>
                                <div class="form-control input-rep-id">
                                    <label for="id">No. Identificación de la Empresa<b> (NIT, NIF, CIF, NIP etc.)
                                        </b></label>
                                    <input type="text" id="inputId" name="id" autocomplete="off" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallId"></small>
                                </div>
                                <div class="form-control input-rep-name">
                                    <label for="repName">Nombre del Representante Legal</label>
                                    <input type="text" id="inputRepName" name="repName" autocomplete="off" />
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallRepName"></small>
                                </div>
                                
                                <div class="form-control input-rep-phone">
                                    <label for="repPhone">Teléfono del Representante Legal</label>
                                    <input type="number" id="inputRepPhone" name="repPhone" autocomplete="off" />


                                    <i class="inputIcon inputIconPhone fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon inputIconPhone fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallRepPhone"></small>
                                </div>
                                <input type="hidden" name="ajax-legal">
                                <button id="sponsors-legal-validate">Continuar</button>


                            </div>
                            <div class="step step-three">
                                <p class="back back-to-two">
                                    <i class="fas fa-chevron-left icon"></i> Regresar
                                </p>

                                <div class="form-control input-msg">
                                    <label for="msg">Comentario o nota especial <b>(Opcional)</b></label>
                                    <textarea name="msg" id="inputMsg" cols="30" rows="8" autocomplete="off"></textarea>
                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallMsg"></small>
                                </div>
                                <div class="form-control input-terms">

                                    <input type="checkbox" name="terms" id="check">
                                    <label for="check">
                                        <span></span>
                                        <p> He leído y estoy de acuerdo con la <a
                                                href="legal/politica-de-privacidad">Política de Privacidad</a> y los <a
                                                href="legal/terminos-y-condiciones">Términos y Condiciones</a> de
                                            Fundación Redes de Ayuda.</p>
                                    </label>

                                </div>
                                <input type="hidden" name="ajax-sponsor">
                                <button id="sponsors-submit" name="sponsors-submit">Ser Patrocinador</button>

                            </div> -->
                        <!-- </div>
                    </div> -->

                </div>
            </form>



            <div class="section-waves">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                    <path fill="#f4f4f4" fill-opacity="1"
                        d="M0,192L48,202.7C96,213,192,235,288,213.3C384,192,480,128,576,133.3C672,139,768,213,864,224C960,235,1056,181,1152,154.7C1248,128,1344,128,1392,128L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>

            </div>
        </section>


        <section class="sponsors-cards">
            <h2 class="h2">Patrocinadores Oficiales</h2>
            <p>
                Obtén grandes beneficios al ser parte de nosotros y apoyar constantemente a quienes lo necesiten
            </p>

            <div class="benefits">
                <div class="benefits-container">
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle icon"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Titulo del beneficio</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, quo aperiam. Esse,
                                reiciendis.</p>
                        </div>

                    </div>
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle icon"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Titulo del beneficio</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, quo aperiam. Esse,
                                reiciendis.</p>
                        </div>

                    </div>
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle icon"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Titulo del beneficio</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, quo aperiam. Esse,
                                reiciendis.</p>
                        </div>

                    </div>
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle icon"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Titulo del beneficio</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, quo aperiam. Esse,
                                reiciendis.</p>
                        </div>

                    </div>
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle icon"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Titulo del beneficio</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, quo aperiam. Esse,
                                reiciendis.</p>
                        </div>

                    </div>
                    <div class="benefit">
                        <div class="benefit-icon">
                            <i class="fas fa-check-circle icon"></i>
                        </div>
                        <div class="benefit-content">
                            <h3>Titulo del beneficio</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, quo aperiam. Esse,
                                reiciendis.</p>
                        </div>

                    </div>



                </div>
            </div>

            <div class="sponsors-container">
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/bi-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/banco-industrial.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Banco Industrial S.A.</h3>
                            <p>El banco de la organización financiera más importante de Guatemala. Producto personal, empresarial y banca electrónica. Siempre de tu lado. </p>

                        </div>

                    </a>
                </div>
                <div class="sponsors-card opacity ">

                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/atproy-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/Gestion-proyecto1.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Grupo ATProy</h3>
                            <p>Desarrollador y planificador de proyectos especialmente eléctricos y civiles, con más de
                                ocho años de experiencia y profesionalidad de servicio.</p>

                        </div>

                    </a>

                </div>
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/bac-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/BAC-gana-premio.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>BAC Credomatic</h3>
                            <p>Organización financiera que ofrece productos y servicios financieros a más de 3 millones de clientes en la región centroamericana.</p>

                        </div>

                    </a>
                </div>
                <div class="sponsors-card opacity  reserved">

                    <div>
                        <i class="fas fa-question icon"></i>
                    </div>
                    <p>Lugar reservado exclusivamente para tí, ¿Qué esperas para reclamarlo? <span> ¡Ayudemos juntos al
                            Necesitado! </span></p>

                </div>
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/banrural-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/Banrural.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Banco del Desarrollo Rural</h3>
                            <p> Grupo financiero orientado al desarrollo rural integral del país, con capital privado y
                                multisectorial con servicios de banca universal y cobertura nacional y regional.</p>

                        </div>

                    </a>
                </div>
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img ">
                            <div class="sponsors-logo">
                                <img src="img/logos/parma-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/bg2.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Parma Guatemala</h3>
                            <p>Un rincón creado para disfrutar de la calidad de nuestros productos en mano de nuestros
                                expertos. Siempre encontrarás en nosotros a tu familia.</p>

                        </div>

                    </a>
                </div>
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/cemaco-logo.svg" alt="">
                            </div>

                            <img class="lazy-sponsors" src="preview-img/tiendas-cemaco-projects.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Grupo Cemaco</h3>
                            <p>Somos una tienda líder en comercio al detalle con una diversidad de productos para
                                mejoras del hogar y muebles en Guatemala.</p>

                        </div>

                    </a>
                </div>
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/fraternidad-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/ED9HEctWwAA5ghc.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Fraternidad Cristiana de Guatemala</h3>
                            <p> Iglesia cristiana para la familia que proclama el amor de Dios y que persevera en el
                                orden dado en la Biblia</p>

                        </div>

                    </a>
                </div>
                
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/hino-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/1581695127526.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Hino Guatemala</h3>
                            <p> Marca japonesa líder en el desarrollo de tecnologías para camiones, caracterizados por
                                mejorar las funciones básicas, promover la seguridad y proteger el medio ambiente.</p>

                        </div>

                    </a>
                </div>

                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/cerveceria-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/slide-1.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Cervecería Centroamericana S.A.</h3>
                            <p>Empresa guatemalteca con más de 100 años de fundación. Es una de las marcas líderes en la
                                innovación de la industria cervecera de Guatemala.</p>

                        </div>

                    </a>
                </div>
                <div class="sponsors-card opacity ">
                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/casa-de-dios-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/Templo_Casa_de_Dios.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Casa de Dios</h3>
                            <p>Con la visión de discipular, en Casa de Dios trabajamos para compartir las Buenas Nuevas
                                de Jesucristo, hemos compartido el amor de Dios con millones de personas que lo han
                                recibido como su Señor.</p>

                        </div>

                    </a>
                </div>

                <div class="all">
                    <div class="more">

                        <a href="patrocinios/todos-los-patrocinadores">
                            Ver todos los Patrocinadores
                            <i class="fas fa-chevron-right icon"></i>
                        </a>
                    </div>
                </div>
                <!-- <div class="sponsors-card opacity last ">

                    <a href="">
                        <div class="sponsors-img">
                            <div class="sponsors-logo">
                                <img src="img/logos/claro-logo.svg" alt="">
                            </div>
                            <img class="lazy-sponsors" src="preview-img/1562600209826.jpg" alt="">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                                <path fill="#fff" fill-opacity="1"
                                    d="M0,192L60,176C120,160,240,128,360,112C480,96,600,96,720,117.3C840,139,960,181,1080,186.7C1200,192,1320,160,1380,144L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                                </path>
                            </svg>
                        </div>
                        <div class="sponsors-des">
                            <h3>Claro Guatemala</h3>
                            <p> La Red con el mejor Internet del País. Planes, Celulares, Internet y Más. Descubre todos
                                los beneficios que tenemos para ti; manténte comunicado, claro que sí.</p>


                        </div>


                    </a>

                </div> -->

            </div>
        </section>

        <section class="related">
            <div class="related-container">
                <h2>Artículos Relacionados</h2>
                <div class="news-main">
                    <div id="response-news"></div>
                    <div class="news-main-container">
                        <?php
                            include("php/db.php");

                            $categoria = "categoria-4";

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
                                    <span class="category <?php echo $categoria ?>"><?php  $cat = strtr($rowNewsTwo["categoria"], "-", " ");$cat = ucfirst($cat); 
                                    echo $cat; ?></span>

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
        </section>

    </main>

    <div class="email-sent" id="email-sent">
        <div class="img">
            <img src="" alt="">
        </div>
        <div class="content">
            <h3></h3>
            <p><i class="fas fa-heart icon"></i></p>
            <button id="btnEmail"></button>
        </div>
    </div>

    <?php include_once("php/cookies.php"); ?>

    <?php include_once("php/footer.php"); ?>






    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>