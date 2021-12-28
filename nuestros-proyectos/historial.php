<?php include_once("../php/connection-user-two.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
    
    $actualLink = basename($_SERVER['PHP_SELF']);
    $sql = "SELECT * FROM proyectos WHERE link = '$actualLink'";
    
    $result = $connection->query($sql);
    $row = $result->fetch_assoc(); ?>

    <title>Historial de Proyectos | Fundación Redes de Ayuda</title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">

    <meta name="description" content="Lista de todos los proyectos sociales finalizados y en curso de parte de Fundación Redes de Ayuda">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/normalize.min.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/proyects.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <script defer src="../js/cookies.js"></script>
    
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script defer src="historial.js"></script>
    <script defer src="../js/main.js"></script>
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
    <meta property="og:title" content="Historial de Proyectos | Fundación Redes de Ayuda" />
    <meta property="og:description" content="Lista de todos los proyectos sociales finalizados y en curso de parte de Fundación Redes de Ayuda">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Historial de Proyectos  | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="Lista de todos los proyectos sociales finalizados y en curso de parte de Fundación Redes de Ayuda">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">

    <link rel="icon" href="../favicon.ico" type="image/x-icon" />
 

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include_once("../php/header-two.php"); ?>


    <main class="historial">
        <section>
            <div id="responseProyect"></div>
            <div class="historial-container">
                <div class="historial-title">
                    <h1 class="h1">Historial de Proyectos</h1>
                </div>
                <div class="historial-content">
                    <?php
                        include("../php/db.php");

                        $query = "SELECT * FROM proyectos ORDER BY id DESC";
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
                        <a href="<?php echo $rowProyectTwo["link"]; ?>">

                            <div class="proyect-img opacity">
                                <img name="proyect-img" class="lazy-proyect"
                                    src="../preview-img/<?php echo $rowProyectTwo["imagen"]; ?>"
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
                </div>
            </div>
 
        </section>
    </main>

    
    <?php include_once("../php/cookies-two.php"); ?>
    
    <?php include_once("../php/footer-two.php"); ?>
    

    

    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>
