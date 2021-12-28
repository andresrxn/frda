<?php include("php/connection-user.php")?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Proyectos | Fundación Redes de Ayuda</title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">

    <meta name="description"
        content="Toda la ayuda social que ha sido posible gracias a Dios y todas las personas que se unen día con día a nuestra causa.">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/proyects.css">


    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>
    <script defer src="js/cookies.js"></script>
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script defer src="js/proyects.js "></script>
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
    <meta property="og:title" content="Proyectos | Fundación Redes de Ayuda" />
    <meta property="og:description"
        content="Toda la ayuda social que ha sido posible gracias a Dios y todas las personas que se unen día con día a nuestra causa.">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Proyectos | Fundación Redes de Ayuda">
    <meta name="twitter:description"
        content="Toda la ayuda social que ha sido posible gracias a Dios y todas las personas que se unen día con día a nuestra causa.">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">


    <link rel="icon" href="favicon.ico" type="image/x-icon" />


</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include("php/header.php")?>



    <main>
        <div id="response"></div>

        <section class="principal-proyects">
            <div class="proyects-title">
                <?php
                    include("php/db.php");

                    $query = "SELECT * FROM proyectos WHERE publicacion = 'publicado' ORDER BY id DESC LIMIT 1";
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
                           

                        </div>
                        <div class="proyect-des">


                            <h3><?php echo ucfirst($rowProyect["titulo"]);?>

                            </h3>
                            <div class="proyect-number">
                                <span class="number">Proyecto No. <?php echo $rowProyect["id"];?></span> <time
                                    datetime="<?php echo $rowProyect["fecha_orden"] ?>"
                                    class="proyect-date"><?php echo $rowProyect["fecha"];?></time>
                            </div>
                            <p><?php echo $rowProyect["descripcion"];?></p>
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
            </div>

            <div class="division">
                <div class="division-back"></div>
                <i class="fas fa-caret-down icon"></i>
            </div>


            <div class="proyect-container">

                <?php
                    include("php/db.php");

                    $query = "SELECT * FROM proyectos WHERE publicacion = 'publicado' ORDER BY id DESC LIMIT 1,3";
                    $result = $connection->query($query);
                    while($rowProyectTwo = $result->fetch_assoc()){
                
                ?>
                <div class="proyect">
                    <form action="" method="POST" class="form-save-proyect">

                        <?php

                        if(isset($_SESSION["user"])){
                            $tokenId = $_SESSION["user"];

                            $idProyect = $rowProyectTwo["id"];

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
                            id="<?php if(isset($_SESSION["user"])){ echo 'save-proyect-'.$rowProyectTwo["id"];}else{echo '';} ?>" 
                            title="<?php if(isset($_SESSION["user"])){ echo $title;}else{echo '';} ?>">

                            <?php if(isset($_SESSION["user"])){ echo $html; }else{ echo ' <i class="far fa-bookmark icon"></i>';}?>

                        </button>
                        <input type="hidden" name="ajax-proyect" value="<?php if(isset($_SESSION["user"])){  echo $rowProyectTwo["id"];}else{echo '';} ?>">
                    </form>
                    <a href="nuestros-proyectos/<?php echo $rowProyectTwo["link"]; ?>">

                        <div class="proyect-img opacity">
                            <img name="proyect-img" class="lazy-proyect"
                                src="preview-img/<?php echo $rowProyectTwo["imagen"]; ?>"
                                alt="<?php echo  $rowProyectTwo["imagen"]; ?>">                          

                        </div>
                        <div class="proyect-des">


                            <h3><?php echo ucfirst($rowProyectTwo["titulo"]);?>

                            </h3>
                            <div class="proyect-number">
                                <span class="number">Proyecto No. <?php echo $rowProyectTwo["id"];?></span>
                                <time datetime="<?php echo $rowProyectTwo["fecha_orden"] ?>"
                                    class="proyect-date"><?php echo $rowProyectTwo["fecha"];?></time>

                            </div>
                            <p><?php echo $rowProyectTwo["descripcion"];?></p>
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
                                        if($rowProyectTwo["moneda"] == "GTQ"){echo "Q";}else{echo "$";}
                                    ?>
                                        </b>
                                        <b>
                                            <?php echo $rowProyectTwo["cantidad_inicial"];?>
                                        </b>
                                    </span>
                                    <span class="final-amount">
                                        <b>

                                            <?php
                                        if($rowProyectTwo["moneda"] == "GTQ"){echo "Q";}else{echo "$";}
                                    ?>
                                        </b>
                                        <b>

                                            <?php echo $rowProyectTwo["cantidad_final"];?>
                                        </b>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                <div class="more">
                    <a href="nuestros-proyectos/historial">
                        Ver todos los proyectos
                        <i class="fas fa-chevron-right icon"></i>
                    </a>
                </div>
                <div class="section-waves">

                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                        <path fill="#fff" fill-opacity="1"
                            d="M0,224L48,202.7C96,181,192,139,288,122.7C384,107,480,117,576,144C672,171,768,213,864,208C960,203,1056,149,1152,117.3C1248,85,1344,75,1392,69.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                        </path>
                    </svg>
                </div>
            </div>
        </section>
        <section class="future">
            <div class="future-container">

                <h2>Proyectos a Futuro</h2>
                <p>Una de nuestras metas más grandes es expandir nuestras operaciones para cubrir las necesidades de
                    toda la Población</p>

                <div class="future-map">

                    <div class="future-options">
                        <div class="option active" id="option-central">
                            <h3>Área Central</h3>
                            <p>Departamento de Guatemala</p>
                            <div class="option-icon">
                                <i class="fas fa-chevron-right icon"></i>
                            </div>
                        </div>
                        <div class="option" id="option-norte">
                            <h3>Área Norte</h3>
                            <p>Departamento de Alta Verapáz</p>
                            <div class="option-icon">
                                <i class="fas fa-chevron-right icon"></i>
                            </div>
                        </div>
                        <div class="option" id="option-sur">
                            <h3>Área Sur</h3>
                            <p>Departamento de Escuintla</p>
                            <div class="option-icon">
                                <i class="fas fa-chevron-right icon"></i>
                            </div>
                        </div>
                        <div class="option" id="option-occidente">
                            <h3>Área Occidente</h3>
                            <p>Departamento de Quetzaltenango</p>
                            <div class="option-icon">
                                <i class="fas fa-chevron-right icon"></i>
                            </div>
                        </div>
                        <div class="option" id="option-oriente">
                            <h3>Área Oriente</h3>
                            <p>Departamento de Chiquimula</p>
                            <div class="option-icon">
                                <i class="fas fa-chevron-right icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="future-img">
                        <div class="map-img first active" id="central">
                            <img src="nuestros-proyectos/mapas/centro.png" alt="Sede central Fundación Redes de Ayuda">
                        </div>
                        <div class="map-img" id="oriente">
                            <img src="nuestros-proyectos/mapas/oriente.png" alt="">
                        </div>
                        <div class="map-img" id="occidente">
                            <img src="nuestros-proyectos/mapas/occidente.png" alt="">
                        </div>
                        <div class="map-img" id="norte">
                            <img src="nuestros-proyectos/mapas/norte.png" alt="">
                        </div>
                        <div class="map-img" id="sur">
                            <img src="nuestros-proyectos/mapas/sur.png" alt="">
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
            </div>
        </section>
        <section class="donate">
            <h2 class="donate-h2 opacity">
                <span class="first">Ayúdanos a Seguir</span>
                <span class="second"> Creando Proyectos</span>

            </h2>
            <p class="opacity">¡Así seguiremos llegando a todos los guatemaltecos que lo necesiten! </p>
            <div class="banner-container-button mostrarArriba">
                <a href="donar">
                    <i class="fas fa-gift icon"></i> Donar Ahora
                </a>

            </div>
            <div class="donate-img  opacity">
                <!-- <img src="img/manos-juntas.jpg" alt=""> -->
                <img src="img/laguna-noche.jpg" alt="">
            </div>
        </section>



    </main>




    <?php include("php/cookies.php")?>

    <?php include("php/footer.php")?>





    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>