<?php include_once("php/connection-user.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title  -->
    <title>Fundación Redes de Ayuda</title>
    <meta name="description" content="Somos una Fundación Evangélica guatemalteca creada para ayudar a Madres Solteras, Personas Desempleadas y a Personas con Enfermedades o Discapacidad.">
    <!--About-->
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">
    <meta name="keywords" content="Fundacion, ayuda, Guatemala, necesidad, financiamiento, trabajo">

    <!-- Preconnect  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.css" integrity="sha512-eeBbzvdY28BPYqEsAv4GU/Mv48zr7l0cI6yhWyqhgRoNG3sr+Q2Fr6751bA04Cw8SGUawtVZlugHm5H1GOU/TQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/index.css">

    <!-- Script Defer -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.js" integrity="sha512-sAHYBRXSgMOV2axInO6rUzuKKM5SkItFLlLHQ8YjRD+FBwowtATOs4njP9oim3/MzyAGrB52SLDjpAOLcOT9TA==" crossorigin=" anonymous" referrerpolicy="no-referrer"></script>

    <script defer src="js/cookies.js "></script>
    <script defer src="js/main.js"></script>

    <script defer src="js/index.js"></script>
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



    <!--Social-->
    <meta property="og:url" content="https://www.fundacionredesdeayuda.org">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Fundación Redes de Ayuda" />
    <meta property="og:description"
        content="Organización Evangélica guatemalteca creada para ayudar a Madres Solteras, Personas Desempleadas y a Personas con Enfermedades o Discapacidad.">
    <meta property="og:image" content="img/logos/redes-de-ayuda-completo.svg">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Fundación Redes de Ayuda">
    <meta name="twitter:description"
        content="Somos una Fundación Evangélica guatemalteca creada para ayudar a Madres Solteras, Personas Desempleadas y a Personas con Enfermedades o Discapacidad.">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda-completo.svg">

    <!-- icon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <!-- Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Non-profit",
        "url": "https://www.fundacionredesdeayuda.org",
        "name": "Fundación Redes de Ayuda",
        "legalName": "Fundación Redes de Ayuda",
        "alternateName": "Redes de Ayuda",
        "logo": "https://www.fundacionredesdeayuda.org/img/logos/redes-de-ayuda-completo.svg",
        "sameAs": [
            "https://www.facebook.com/f.redesdeayuda/",
            "https://www.instagram.com/adobe/"
        ],
        "contactPoint": [{
            "@type": "ContactPoint",
            "telephone": "+502-0000-0000",
            "contactType": "Servicio al Cliente",
            "contactOption": "TollFree",
            "areaServed": "GT",
            "availableLanguage": "ES"
        }]
    }
    </script>

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include_once("php/header.php"); ?>

    <main>
        <section class="banner" id="banner">
            <div class="banner-container">

                <div class="banner-container-video">
                    <video id="banner-video" muted playsinline poster="img/video/banner-video-poster.jpg">
                        <source src="img/video/banner-video.mp4" type="video/mp4">
                        Su Navegador no acepta este video.
                    </video>
                </div>

                <div class="banner-container-content">
                    <div class="content-container">
                        <h1>
                            <span>
                                No Dejes Para Mañana
                            </span>
                            <span>
                                ¡La Ayuda
                            </span>
                            <span>
                                Que Puedas
                            </span>
                            <span>
                                Dar Hoy!
                            </span>
                            <span>
                                - Prov. 3:28 DHH
                            </span>
                        </h1>
                        <div class="banner-container-button">
                            <a href="donar">
                                <i class="fas fa-gift icon"></i> Donar Ahora
                            </a>

                        </div>
                    </div>
                </div>
                <div class="banner-waves">
                    <div style="height: 40px; overflow: hidden;"><svg viewBox="0 0 500 150" class="banner-wave"
                            preserveAspectRatio="none" style="height: 100%; width: 100%;">
                            <path
                                d="M-18.90,82.39 C261.00,186.02 197.80,-67.59 514.95,97.20 L500.00,0.00 L-35.26,-51.80 Z"
                                style="stroke: none; fill: #fff;"></path>
                        </svg></div>
                    <div style="height: 40px; overflow: hidden;"><svg viewBox="0 0 500 150" class="banner-wave-two"
                            preserveAspectRatio="none" style="height: 100%; width: 100%;">
                            <path
                                d="M-18.90,82.39 C261.00,186.02 197.80,-67.59 514.95,97.20 L500.00,0.00 L-35.26,-51.80 Z"
                                style="stroke: none; fill: #fff;"></path>
                        </svg></div>

                </div>

            </div>
        </section>


        <section class="sponsors" id="sponsors">
            <div class="sponsors-container">
                <div class="swiper-container-sponsors">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" title="Telefonía Claro Guatemala">

                            <a href="https://www.claro.com.gt/personas/">
                                <img src="img/logos/claro-logo.svg" alt="">
                            </a>

                        </div>

                        <div class="swiper-slide" title="Almacenes Cemaco Guatemala">
                            <a href="https://cemaco.com/">
                                <img src="img/logos/cemaco-logo.svg" alt=""></a>

                        </div>
                        <div class="swiper-slide" title="Cerveceria Centroamericana S.A.">
                            <a href="">
                                <img src="img/logos/cerveceria-logo.svg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide" title="Grupo ATProy">
                            <a href="">
                                <img src="img/logos/atproy-logo.svg" alt="">

                            </a>
                        </div>


                        <div class="swiper-slide" title="Iglesia Casa de Dios">
                            <a href="https://casadedios.org/">
                                <img src="img/logos/casa-de-dios-logo.svg" alt="">
                            </a>
                        </div>

                        <div class="swiper-slide" title="Fraternidad Crisitana de Guatemala">
                            <a href="http://frater.org/">
                                <img src="img/logos/fraternidad-logo.svg" alt="">
                            </a>
                        </div>

                        <div class="swiper-slide" title="BAC Credomatic">
                            <a href="https://www.baccredomatic.com">
                                <img src="img/logos/bac-logo.svg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide" title="Banco Industrial">
                            <a href="https://www.corporacionbi.com/gt/bancoindustrial/inicio">
                                <img src="img/logos/bi-logo.svg" alt="">
                            </a>
                        </div>

                        <div class="swiper-slide" title="Parma">
                            <a href="https://www.parma.gt">
                                <img src="img/logos/parma-logo.svg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide" title="Telefonía Claro Guatemala">

                            <a href="https://www.claro.com.gt/personas/">
                                <img src="img/logos/claro-logo.svg" alt="">
                            </a>

                        </div>

                        <div class="swiper-slide" title="Almacenes Cemaco Guatemala">
                            <a href="https://cemaco.com/">
                                <img src="img/logos/cemaco-logo.svg" alt=""></a>

                        </div>
                        <div class="swiper-slide" title="Cerveceria Centroamericana S.A.">
                            <a href="">
                                <img src="img/logos/cerveceria-logo.svg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide" title="Grupo ATProy">
                            <a href="">
                                <img src="img/logos/atproy-logo.svg" alt="">

                            </a>
                        </div>


                        <div class="swiper-slide" title="Iglesia Casa de Dios">
                            <a href="https://casadedios.org/">
                                <img src="img/logos/casa-de-dios-logo.svg" alt="">
                            </a>
                        </div>

                        <div class="swiper-slide" title="Fraternidad Crisitana de Guatemala">
                            <a href="http://frater.org/">
                                <img src="img/logos/fraternidad-logo.svg" alt="">
                            </a>
                        </div>

                        <div class="swiper-slide" title="BAC Credomatic">
                            <a href="https://www.baccredomatic.com">
                                <img src="img/logos/bac-logo.svg" alt="">
                            </a>
                        </div>
                        <div class="swiper-slide" title="Banco Industrial">
                            <a href="https://www.corporacionbi.com/gt/bancoindustrial/inicio">
                                <img src="img/logos/bi-logo.svg" alt="">
                            </a>
                        </div>

                        <div class="swiper-slide" title="Parma">
                            <a href="https://www.parma.gt">
                                <img src="img/logos/parma-logo.svg" alt="">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <div class="division">
            <div class="division-back"></div>
            <i class="fas fa-caret-down icon"></i>
        </div>


        <section class="help" id="help">
            <div class="help-description">
                <h2>
                    Áreas de Trabajo
                </h2>
                <p>"Apoyando profesionalmente de manera Técnica, Económica y Espiritual con programas especializados"
                    <span>Actualmente sólo para Guatemala <img src="img/gt.jpg" alt="Bandera de Guatemala"></span>
                </p>
            </div>
            <div class="help-container">

                <div class="help-container-card mostrarArriba">
                    <div class="help-card-img">
                        <img src="img/svg/undraw_back_to_school_inwc.svg" alt="Ilustración Madres Solteras"
                            title="Créditos: https://undraw.co/illustrations">
                    </div>
                    <div class="help-card-title">
                        <h3>
                            Madres Solteras
                        </h3>
                        <ul>
                            <li>
                                Escasos Recursos
                            </li>
                            <li>
                                Sin Profesión Académica
                            </li>
                            <li>
                                Recientemente Viudas
                            </li>
                        </ul>
                        <div class="more">
                            <a href="solicitar-ayuda">
                                Solicitar Ayuda
                                <i class="fas fa-chevron-right icon"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="help-container-card mostrarArriba">
                    <div class="help-card-img">
                        <img src="img/svg/desempleado.svg" alt="Ilustración Personas Desempleadas"
                            title="Créditos: https://undraw.co/illustrations">
                    </div>
                    <div class="help-card-title">
                        <h3>
                            Desempleados
                        </h3>
                        <ul>
                            <li>
                                Sin Ubicación Laboral
                            </li>
                            <li>
                                Con Discapacidad
                            </li>
                            <li>
                                Edad Avanzada
                            </li>
                        </ul>
                        <div class="more">
                            <a href="solicitar-ayuda">
                                Solicitar Ayuda
                                <i class="fas fa-chevron-right icon"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="help-container-card mostrarArriba">
                    <div class="help-card-img">
                        <img src="img/svg/invalidez.svg" alt="Ilustración Personas con invalidez o Enfermedad"
                            title="Créditos: https://undraw.co/illustrations">
                    </div>
                    <div class="help-card-title">
                        <h3>
                            Con Enfermedad o Invalidéz
                        </h3>
                        <ul>
                            <li>
                                Falta de Solvencia Económica
                            </li>
                            <li>
                                Incapacidad Laboral
                            </li>

                        </ul>
                        <div class="more">
                            <a href="solicitar-ayuda">
                                Solicitar Ayuda
                                <i class="fas fa-chevron-right icon"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="section-waves">

                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                    <path fill="#f4f4f4" fill-opacity="1"
                        d="M0,224L48,197.3C96,171,192,117,288,128C384,139,480,213,576,218.7C672,224,768,160,864,144C960,128,1056,160,1152,170.7C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>


        </section>


        <section class="proyects" id="proyects">

            <div class="proyects-title">
                <h2>Proyectos</h2>
                <p>No se necesita de una razón para ayudar al prójimo, estamos para servir y apoyarnos unos con los
                    otros.
                </p>
            </div>

            <div class="proyect-container">
                <div id="responseProyect"></div>



                <div class="proyect-count">
                    <div class="countdown-title">
                        <h3>Nuevo Proyecto en:</h3>
                    </div>
                    <div class="countdown-container">


                        <div class="countdown-el days-c">
                            <p class="big-text" id="days">0</p>
                            <span>días</span>
                        </div>
                        <div class="countdown-el hours-c">
                            <p class="big-text" id="hours">0</p>
                            <span>horas</span>
                        </div>
                        <div class="countdown-el mins-c">
                            <p class="big-text" id="mins">0</p>
                            <span>min.</span>
                        </div>
                        <div class="countdown-el seconds-c">
                            <p class="big-text" id="seconds">0</p>
                            <span>seg.</span>
                        </div>


                    </div>
                </div>

                <?php
                include("php/db.php");

                $query = "SELECT * FROM proyectos ORDER BY id DESC LIMIT 1";
                $result = $connection->query($query);
                while($rowProyect = $result->fetch_assoc()){
            
                ?>
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
                <div class="more">
                    <a href="proyectos">
                        Ver Todos los Proyectos
                        <i class="fas fa-chevron-right icon"></i>
                    </a>
                </div>


                <div class="section-waves">
                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                        <path fill="#0f0f0f" fill-opacity="1"
                            d="M0,192L48,186.7C96,181,192,171,288,181.3C384,192,480,224,576,218.7C672,213,768,171,864,138.7C960,107,1056,85,1152,85.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                </div>
        </section>

        <section class="about" id="about">

            <div class="about-container">
                <div class="about-us">
                    <div class="about-us-container">
                        <p>
                            <span class="scale"><i class="fas fa-heart icon iconH"></i></span>
                            <span><i class="fas fa-hand-holding icon"></i></span>
                            <span class="first">Ayudando</span>
                            <span class="second">Al Necesitado</span>


                        </p>
                        <div class="intersection"></div>
                        <p>
                            <span class="third">De Forma Integral</span>
                            <span class="four">Desde 2021</span>
                        </p>

                        <div class="more">

                            <a href="nosotros" class="more-circle">
                                Conócenos Más
                                <i class="fas fa-chevron-right icon"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
            <div class="ods">
                <div class="about-us-ods opacity">
                    <span class="contador-cantidad" data-target="700">
                        0
                    </span>

                    <span>
                        Lorem Ipsum
                    </span>
                    <span>
                        Dolor Amet
                    </span>
                </div>
                <div class="about-us-ods opacity  ods-two">
                    <span class="contador-cantidad" data-target="450">
                        0
                    </span>

                    <span>
                        Lorem Ipsum
                    </span>
                    <span>
                        Dolor Amet
                    </span>
                </div>
                <div class="about-us-ods opacity  ods-three">
                    <span class="contador-cantidad" data-target="1000">
                        0
                    </span>

                    <span>
                        Lorem Ipsum
                    </span>
                    <span>
                        Dolor Amet
                    </span>
                </div>
            </div>

            <div class="division">
                <div class="division-back"></div>
                <i class="fas fa-caret-down icon"></i>
            </div>

            <div class="about-personal-proyects">
                <div class="about-us-musik personal-card mostrarArriba">
                    <div class="about-musik-logo">
                        <img src="img/logos/escuela-de-musica-logo.svg" alt="Logo School Ars Musik">
                    </div>
                    <p>
                        Escuela de Música por parte de
                        <span> Redes de Ayuda</span>
                    </p>
                    <div class="more disable">
                        <a href="" class="more-circle">
                            Próximamente
                            <i class="fas fa-chevron-right icon"></i>
                        </a>
                    </div>



                </div>
                <div class="about-us-church personal-card mostrarArriba">
                    <div class="about-church-logo">
                        <img src="img/logos/iglesia-logo-completo-blanco.svg"
                            alt="Logo Iglesia de Cristo la Presencia del Señor Jesús">

                    </div>
                    <p>
                        Nuestra propia congregación
                        <span>Cristiana Evangélica</span>
                    </p>
                    <div class="more">
                        <a href="" class="more-circle">
                            Visitar Sitio
                            <i class="fas fa-chevron-right icon"></i>
                        </a>
                    </div>


                </div>
            </div>



            <div class="section-waves">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                    <path fill="#f4f4f4" fill-opacity="1"
                        d="M0,64L48,64C96,64,192,64,288,96C384,128,480,192,576,197.3C672,203,768,149,864,122.7C960,96,1056,96,1152,106.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>

            </div>
        </section>


        <section class="faq" id="faq">

            <div class="faq-container">
                <h2>
                    Preguntas Frecuentes
                </h2>

                <div class="accordion">
                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            ¿Cómo puedo donar?
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Puedes dar tus aportes en especie (dentro de la capital se recoge a domicilio) o
                                monetariamente a partir de Q1.00 por medio de depósitos bancarios, cheques o efectivo;
                                por medio de PayPal o Tarjeta de Crédito/Débito en línea a partir de $1.00 o Q10.00. Para más
                                detalles visita nuestros
                                <a href="donar"> métodos de donación. </a>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            ¿Cómo sé que mi donación es segura?
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt blanditiis deserunt
                                dolore earum quo perferendis aliquam. Architecto cumque corporis nobis natus unde harum
                                exercitationem praesentium non maxime, ipsa, aspernatur deleniti consectetur
                                temporibus similique nostrum pariatur amet rem iure expedita dolorem?
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            ¿Puedo colaborar con ustedes?
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt blanditiis deserunt
                                dolore earum quo perferendis aliquam. Architecto cumque corporis nobis natus unde harum
                                exercitationem praesentium non maxime, ipsa, aspernatur deleniti consectetur
                                temporibus similique nostrum pariatur amet rem iure expedita dolorem?
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            ¿Son dueños o propietarios de la iglesia?
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt blanditiis deserunt
                                dolore earum quo perferendis aliquam. Architecto cumque corporis nobis natus unde harum
                                exercitationem praesentium non maxime, ipsa, aspernatur deleniti consectetur
                                temporibus similique nostrum pariatur amet rem iure expedita dolorem?
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-item-header">
                            ¿Cómo puedo recibir sus noticias?
                            <i class="fas fa-times icon"></i>
                        </div>
                        <div class="accordion-item-body">
                            <div class="accordion-item-body-content">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt blanditiis deserunt
                                dolore earum quo perferendis aliquam. Architecto cumque corporis nobis natus unde harum
                                exercitationem praesentium non maxime, ipsa, aspernatur deleniti consectetur
                                temporibus similique nostrum pariatur amet rem iure expedita dolorem?
                            </div>
                        </div>
                    </div>


                </div>

                <div class="more">
                    <a href="preguntas-frecuentes">
                        Sección de Preguntas (FAQ)
                        <i class="fas fa-chevron-right icon"></i>
                    </a>
                </div>
            </div>


            <div class="section-waves">


                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                    <path fill="#fff" fill-opacity="1"
                        d="M0,128L48,133.3C96,139,192,149,288,176C384,203,480,245,576,272C672,299,768,309,864,288C960,267,1056,213,1152,197.3C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>

        <section id="blog">
            <div class="about-blog">
                <h2>Últimas Noticias</h2>
                <p>
                    ¡No te pierdas las novedades de la Fundación!

                </p>

                <div class="news-telegram">
                    <a href="https://t.me/">
                        Recibir noticias por Telegram <i class="fab fa-telegram-plane icon"></i>
                    </a>
                </div>
                <div id="response-news"></div>
                <div class="news-principal">

                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                                include("php/db.php");

                                $query = "SELECT * FROM noticias WHERE publicacion = 'publicado' ORDER BY fecha_orden DESC LIMIT 3";
                                $result = $connection->query($query);
                                while($rowNews = $result->fetch_assoc()){
                            
                            ?>
                            <div class="swiper-slide">
                                <form action="" method="POST" class="form-save-news">

                                    <?php
                                    if(isset($_SESSION["user"])){
                                    $tokenId = $_SESSION["user"];

                                    $idProyect = $rowNews["id"];

                                    $verify = mysqli_query($connection, "SELECT id_noticia, tokenId FROM noticias_favoritas WHERE id_noticia = '$idProyect' AND tokenId = '$tokenId'");

                                    if(mysqli_num_rows($verify) == 0) {
                                        $html = '
                                        <i class="far fa-heart icon"></i>
                                                                
                                        ';
                                        $class = "";
                                        $title ="Marcar como Favorito";
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
                                    id="<?php if(isset($_SESSION["user"])){ echo 'save-news-'.$rowNews["id"];}else{echo '';} ?>"  title="<?php if(isset($_SESSION["user"])){ echo $title;}else{echo '';} ?>">

                                    <?php if(isset($_SESSION["user"])){ echo $html; }else{ echo ' <i class="far fa-heart icon"></i>';}?>

                                    </button>
                                    <input type="hidden" name="ajax-news" value="<?php if(isset($_SESSION["user"])){  echo $rowNews["id"];}else{echo '';} ?>">
                                </form>
                                <a href="noticias/<?php echo $rowNews["categoria"]."/".$rowNews["link"]; ?>">
                                    
                                    <img  class="lazy-news" src="preview-img/<?php echo $rowNews["imagen"]; ?>" alt="<?php echo $rowNews["imagen"]; ?>">
                                    <div class="principal-des">
                                        <div class="category-container">
                                            <span class="category <?php  echo $rowNews["categoria"] ?>"><?php  echo $rowNews["categoria"] ?></span>
                                        </div>
                                        <h3>
                                            <?php echo $rowNews["titulo"]; ?>
                                        </h3>
                                        <div>
                                            
                                            <span class="read">
                                                <i class="fas fa-book icon"></i>
                                                <?php echo $rowNews["tiempo_lectura"]; ?>
                                            </span>
                                            
                                            <time datetime="<?php echo $rowNews["fecha_orden"] ?>"><?php echo $rowNews["dia"] . " de " . $rowNews["mes"] . " " . $rowNews["año"]; ?></time>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                    </div>
                </div>
                <div class="more">
                    <a href="blog">
                        Visita Nuestro Blog
                        <i class="fas fa-chevron-right icon"></i>
                    </a>
                </div>
            </div>

            <div class="section-waves">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                    <path fill="#f4f4f4" fill-opacity="1"
                        d="M0,96L48,101.3C96,107,192,117,288,138.7C384,160,480,192,576,197.3C672,203,768,181,864,149.3C960,117,1056,75,1152,69.3C1248,64,1344,96,1392,112L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                    </path>
                </svg>
            </div>
        </section>

        <section class="contact" id="contact">
            <div class="contact-container">

                <div class="contact-title">
                    <h2>
                        ¿Cómo Podemos Ayudarte?
                    </h2>
                    <p>
                        ¡Nos comunicaremos contigo lo más pronto posible!
                    </p>

                </div>
                
                <div id="responseContact"></div>
                <form method="POST" id="form" class="form">
                    <div class="form-img mostrarArriba">
                        <img src="img/svg/new_message.svg" alt="Ilustración Correo Electrónico"
                            title=" Créditos: https://undraw.co/illustrations">
                    </div>
                    <div class="form-container opacity">


                        <div class="form-control input-name">
                            <label for="name">Nombre(s) y Apellido(s)</label>
                            <input type="text" id="inputName" name="name" autocomplete="off" value="<?php 
                        if(isset($_SESSION[" user "]) && isset($_SESSION["priv "]) ){
                            
                            echo $row["nombre "] . " " . $row["apellido "];
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
                            <input type="text" id="inputEmail" name="email" autocomplete="off" value="<?php 
                        if(isset($_SESSION[" user "]) && isset($_SESSION["priv "]) ){
                            
                            echo $row["correo "];
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
                            <input type="number" id="inputPhone" name="phone" autocomplete="off" value="<?php 
                        if(isset($_SESSION[" user "]) && isset($_SESSION["priv "]) ){
                            if($row["telefono "] != 0)
                            echo $row["telefono "];
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

                            <p> <i class="fas fa-info-circle icon"></i> Nosotros te haremos saber qué días tenemos
                                disponibles para atenderte</p>
                        </div>
                        <div class="form-control input-msg">
                            <label for="msg">Déjanos saber tus preguntas</label>
                            <textarea name="msg" id="inputMsg" cols="30" rows="10" autocomplete="off"></textarea>
                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallMsg"></small>
                        </div>
                        <div class="form-control input-terms">

                            <input type="checkbox" name="terms" id="check">
                            <label for="check">
                                
                                <p> He leído y estoy de acuerdo con la <a href="legal/politica-de-privacidad">Política
                                        de Privacidad</a> y los <a href="legal/terminos-y-condiciones">Términos y
                                        Condiciones</a> de Fundación Redes de Ayuda.</p>
                            </label>

                        </div>
                        <input type="hidden" name="AJAX">

                        <button id="btnSubmit" name="btnSubmit">Enviar Mensaje</button>




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

</body>

</html>

