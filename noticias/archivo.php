<?php

include('../php/connection-user-two.php');

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Archivo de Noticias | Fundación Redes de Ayuda</title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">

    <meta name="description" content="Listado de todas las noticias de Fundación Redes de Ayuda.">

    <link rel="stylesheet" href="../css/normalize.min.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="archive.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="../js/cookies.js "></script>
    <script defer src="archive.js "></script>
  
    <script defer src="../js/main.js "></script>

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
    <meta property="og:title" content="Noticia | Fundación Redes de Ayuda" />
    <meta property="og:description" content="Listado de todas las noticias de Fundación Redes de Ayuda.">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Noticia | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="Listado de todas las noticias de Fundación Redes de Ayuda.">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">

    <link rel="icon" href="../favicon.ico" type="image/x-icon" />
    

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--Constant Header-->

  
    <?php  include('../php/header-two.php') ?>

    <main>
        <div class="banner">
            <div class="banner-container">
                <h1 class="h1">
                    Archivo
                </h1>
                <div class="year">
                    <a href="#" class="selected">
                        <h3> Año 2021</h3>
                   
                    </a>
                    <a href="archivo-2020">
                        <h3>Año 2020</h3>
                       
                    </a>
                </div>
                <div class="filter">

                    <div class="filter-container">

                        <div class="filter-card selected" data-filter="Todas">Todas</div>
                        <div class="filter-card" data-filter="categoria-1">categoria-1</div>
                        <div class="filter-card" data-filter="categoria-2">categoria-2</div>
                        <div class="filter-card" data-filter="categoria-3">categoria-3</div>
                        <div class="filter-card" data-filter="categoria-4">categoria-4</div>
                        <div class="filter-card" data-filter="categoria-5">categoria-5</div>
                    </div>

                </div>
                <div id="response-news"></div>

                <div class="news-main-container">
                <?php
                    include("../php/db.php");

                    $query = "SELECT * FROM noticias ORDER BY fecha_orden DESC";
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

                    <a href="<?php echo $rowNewsTwo["categoria"]."/".$rowNewsTwo["link"]; ?>" class="main-card-link">

                        <div class="main-card-des">
                            <span class="category <?php  echo $rowNewsTwo["categoria"] ?>"><?php  echo $rowNewsTwo["categoria"] ?></span>

                            <h3><?php echo ucfirst($rowNewsTwo["titulo"]); ?></h3>
                            <div>

                                <span class="read"><i class="fas fa-book icon"></i><?php echo $rowNewsTwo["tiempo_lectura"]; ?></span>
                                <time datetime="<?php echo $rowNewsTwo["fecha_orden"] ?>"><?php echo $rowNewsTwo["dia"] . " de " . $rowNewsTwo["mes"] . " " . $rowNewsTwo["año"]; ?></time>
                            </div>


                        </div>
                        <div class="main-card-img opacity">
                           
                            
                            <img class="lazy-news" src="../preview-img/<?php echo $rowNewsTwo["imagen"]; ?>" alt="">

                        </div>
                    </a>
                </div>
                <?php } ?>
             
            </div>
            </div>
        </div>



    </main>

    <?php  include('../php/cookies-two.php') ?>

    <?php  include('../php/footer-two.php') ?>

                        
   







    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>