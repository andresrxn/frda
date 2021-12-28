<?php include_once("php/connection-user.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Blog | Fundación Redes de Ayuda </title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">
    <meta name="description" content="¡Mantente al tanto de nuestras actualizaciones y novedades!">

    <!-- Preconnect  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.css" integrity="sha512-eeBbzvdY28BPYqEsAv4GU/Mv48zr7l0cI6yhWyqhgRoNG3sr+Q2Fr6751bA04Cw8SGUawtVZlugHm5H1GOU/TQ==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/news.css">
    
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.js" integrity="sha512-sAHYBRXSgMOV2axInO6rUzuKKM5SkItFLlLHQ8YjRD+FBwowtATOs4njP9oim3/MzyAGrB52SLDjpAOLcOT9TA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script defer src="js/cookies.min.js"></script>
    <script defer src="js/main.js"></script>
    <script defer src="js/news.js"></script>


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
    <meta property="og:title" content="Blog | Fundación Redes de Ayuda" />
    <meta property="og:description" content="¡Mantente al tanto de nuestras actualizaciones y novedades!">
    <meta property="og:image" content="img/logos/redes-de-ayuda.svg">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Blog | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="¡Mantente al tanto de nuestras actualizaciones y novedades!">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.svg">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
   

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!--Constant Header-->

    <?php include_once("php/header.php"); ?>

    <main>
        <div id="response-news"></div>
        <section class="news" id="news">
            <div class="news-title">
                <h1 class="h1">
                    Últimas Noticias
                </h1>
                <p>
                    ¡No te pierdas de las novedades de la Fundación!

                </p>

                <div class="news-telegram">
                    <a href="https://t.me/">
                        Recibir noticias por Telegram <i class="fab fa-telegram-plane icon"></i>
                    </a>
                </div>

            </div>
            <div class="news-container">
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

            </div>



            </div>


            <div class="section-waves">
                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320"><path fill="#f4f4f4" fill-opacity="1" d="M0,160L48,160C96,160,192,160,288,170.7C384,181,480,203,576,218.7C672,235,768,245,864,245.3C960,245,1056,235,1152,218.7C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
            </div>
            </div>
        </section>

        <section class="news-main">
            <div class="filter">

                <div class="filter-container">

                    <div class="filter-card selected" data-filter="Todas">Todas</div>
                    <div class="filter-card" data-filter="categoria-1">Categoria 1</div>
                    <div class="filter-card" data-filter="categoria-2">Categoria 2</div>
                    <div class="filter-card" data-filter="categoria-3">Categoria 3</div>
                    <div class="filter-card" data-filter="categoria-4">Categoria 4</div>
                    <div class="filter-card" data-filter="categoria-5">Categoria 5</div>
                </div>

            </div>
            <div class="news-main-container">
                <?php
                    include("php/db.php");

                    $query = "SELECT * FROM noticias WHERE publicacion = 'publicado' ORDER BY fecha_orden DESC LIMIT 3, 10";
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
            <div class="archive">
                <div class="more">
                    <a href="noticias/archivo">
                        Ver todas las noticias
                        <i class="fas fa-chevron-right icon"></i>
                    </a>
                </div>
            </div>
        </section>



    </main>




    <?php include_once("php/cookies.php"); ?>
    
    <?php include_once("php/footer.php"); ?>







    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>