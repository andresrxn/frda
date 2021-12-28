<?php include_once("../../php/connection-user-three.php"); ?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php 
     
     $actualLink = basename($_SERVER['PHP_SELF']);
     $sqlNews = "SELECT * FROM noticias WHERE link = '$actualLink'";
 
     $resultNews = $connection->query($sqlNews);
     $rowNews = $resultNews->fetch_assoc();
     ?>

    <!--About-->
    <title><?php echo $rowNews["titulo"];?> | Fundación Redes de Ayuda</title>
    <meta name="author" content="Equipo Creativo de Redes de Ayuda">

    <meta name="description" content="Descripción general de la noticia en aproximadamente 15 a 20 palabras.">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!--Styles-->

    <link rel="stylesheet" href="../../css/normalize.min.css">
    <link rel="stylesheet" href="../../css/default.css">
    <link rel="stylesheet" href="../news-template.css">


    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>
    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script defer src="../../js/cookies.js "></script>
    <script defer src="../../js/main.js "></script>
    <script defer src="../news-template.js "></script>

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


    <!--Social-->
    <meta property="og:url" content="https://www.fundacionredesdeayuda.org">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $rowNews["titulo"];?> | Fundación Redes de Ayuda" />
    <meta property="og:description" content="Descripción general de la noticia en aproximadamente 15 a 20 palabras.">
    <meta property="og:image" content="img/logos/redes-de-ayuda.png">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="<?php echo $rowNews["titulo"];?> | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="Descripción general de la noticia en aproximadamente 15 a 20 palabras.">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda.png">


    <link rel="icon" href="../../favicon.ico" type="image/x-icon" />

</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <?php include_once("../../php/header-three.php"); ?>


    <main>
        <div class="principal-news">
            <article class="news-template">
                <div class="template-title">
                    <div class="news-header">
                        <span class="category <?php  echo $rowNews["categoria"] ?>"><?php  echo $rowNews["categoria"] ?></span>

                        <span class="reading"><?php echo $rowNews["tiempo_lectura"];?> de Lectura</span>
                    </div>

                    <h1 class="news-h1"><?php echo $rowNews["titulo"];?></h1>
                    <time><?php echo $rowNews["dia"] . " de " . $rowNews["mes"] . " " . $rowNews["año"] .", " . $rowNews["hora"]; ?></time>

                    <div class="share-news" id="share-news">
                        <i class="fas fa-share-alt icon"></i>
                        Compartir Noticia
                    </div>

                </div>

                <div class="template-img first">
                    <div id="response-news"></div>

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
                    <img class="lazy-news-template" src="../img/<?php echo $rowNews["imagen"]; ?>"
                        alt="<?php echo $rowNews["imagen"]; ?>">

                </div>
                <div class="template-content">

                    <p> <span class="template-loc"><?php echo $rowNews["lugar"]; ?></span> - Lorem ipsum dolor sit amet,
                        consectetur adipisicing elit. Eaque natus nemo inventore sint iure temporibus deleniti enim
                        pariatur voluptates, ullam dolor cumque at veritatis a
                        molestias aut ad ratione dignissimos.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, eaque!</p>
                    <p class="p-border">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ipsa qui
                        nisi, cum soluta, necessitatibus adipisci perspiciatis earum vero eum doloribus doloremque! Modi
                        adipisci minus, mollitia a labore reprehenderit tenetur!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi asperiores perspiciatis architecto
                        deserunt odio veritatis dolor velit? Itaque rerum accusamus id! Sit facilis nemo quam delectus
                        ea maiores iure vel? Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Assumenda, tempore. Possimus nemo temporibus esse,
                        deleniti recusandae, natus tempora accusamus totam quisquam, praesentium veritatis maiores neque
                        repellendus! Asperiores repellendus soluta
                        vitae.
                    </p>
                </div>
                <div class="template-img">
                    <img class="lazy-news" src="../../preview-img/<?php echo $rowNews["imagen"]; ?>"
                        alt="<?php echo $rowNews["imagen"]; ?>">

                    <div class="info-img">
                        <i class="fas fa-info-circle icon"></i> Descripción de la foto y/o atributos al autor o
                        fotógrafo.
                    </div>
                </div>
                <div class="template-content">
                    <h3>Subtitulo de la noticia</h3>
                    <p class="p-border">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ipsa qui
                        nisi, cum soluta, necessitatibus adipisci perspiciatis earum vero eum doloribus doloremque! Modi
                        adipisci minus, mollitia a labore reprehenderit tenetur!</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Explicabo ipsa qui nisi, cum soluta,
                        necessitatibus adipisci perspiciatis earum vero eum doloribus doloremque! Modi adipisci minus,
                        mollitia a labore reprehenderit tenetur!</p>
                    <blockquote>
                        "Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, consectetur. Doloribus
                        voluptates ab dolor error. ".
                    </blockquote>
                </div>
                <div class="template-img">


                    <img class="lazy-news" src="../../preview-img/<?php echo $rowNews["imagen"]; ?>"
                        alt="<?php echo $rowNews["imagen"]; ?>">

                    <div class="info-img">
                        <i class="fas fa-info-circle icon"></i> Descripción de la foto y/o atributos al autor o
                        fotógrafo.
                    </div>
                </div>
                <div class="template-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore molestiae officiis suscipit
                        accusantium similique inventore vitae id, ipsum quaerat nobis!</p>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
                <div class="share-article">

                    <div class="share-news" id="share-news">
                        <i class="fas fa-share-alt icon"></i>
                        Compartir Noticia
                    </div>

                    <div class="share-telegram">
                        <a href="">
                            <div class="tele-icon">
                                <i class="fab fa-telegram-plane icon"></i>
                            </div>
                            <div class="tele-link">

                                <span>Recibir Noticias</span>
                                <span>Por Telegram <i class="fas fa-chevron-right icon"></i></span>

                            </div>
                        </a>
                    </div>
                </div>
            </article>
            <div class="section-waves">



                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1440 320">
                    <path fill="#f4f4f4" fill-opacity="1"
                        d="M0,224L40,202.7C80,181,160,139,240,149.3C320,160,400,224,480,256C560,288,640,288,720,261.3C800,235,880,181,960,176C1040,171,1120,213,1200,234.7C1280,256,1360,256,1400,256L1440,256L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                    </path>
                </svg>
            </div>
        </div>


        <div class="related">
            <div class="related-container">
                <h2>Noticias Relacionadas</h2>
                <div class="news-main">
                    <div class="news-main-container">
                        <?php
                        include("../../php/db.php");

                        $categoria = $rowNews["categoria"];
                        $titulo = $rowNews["titulo"] ;

                        $query = "SELECT * FROM noticias WHERE categoria = '$categoria' AND titulo != '$titulo' ORDER BY fecha_orden DESC LIMIT 4";
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

                            <a href="../noticias/<?php echo $rowNewsTwo["categoria"]."/".$rowNewsTwo["link"]; ?>" class="main-card-link">

                                <div class="main-card-des">
                                    <span class="category <?php  echo $rowNewsTwo["categoria"] ?>"><?php  echo $rowNewsTwo["categoria"] ?></span>

                                    <h3><?php echo ucfirst($rowNewsTwo["titulo"]); ?></h3>
                                    <div>

                                        <span class="read"><i class="fas fa-book icon"></i><?php echo $rowNewsTwo["tiempo_lectura"]; ?></span>
                                        <time datetime="<?php echo $rowNewsTwo["fecha_orden"] ?>"><?php echo $rowNewsTwo["dia"] . " de " . $rowNewsTwo["mes"] . " " . $rowNewsTwo["año"]; ?></time>
                                    </div>


                                </div>
                                <div class="main-card-img opacity">
                                
                                    
                                    <img class="lazy-news" src="../../preview-img/<?php echo $rowNewsTwo["imagen"]; ?>" alt="">

                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>


        <div id="copy-msg">
            <span> ¡Enlace Copiado! </span>
        </div>
    </main>

    <div class="close-donation" id="close-donation">
        <i class="fas fa-times icon"></i>
    </div>

    <div class="share-container" id="share-container">
        <div class="share-img">
            <img src="../../img/svg/share.svg" alt="Compartir el proyecto">
        </div>
        <div class="share-content">
            <h3>¡Comparte la Noticia!</h3>
            <div class="share-link">
                <div class="form-control input-url">
                    <input type="text" id="input-url"
                        value="https://www.fundacionredesdeayuda.org/noticias/<?php echo $rowNews["categoria"]."/".$rowNews["link"] ?>">
                    <div class="copy-input" id="copy-input">
                        Copiar
                    </div>
                </div>
            </div>

            <div class="share-social">
                <ul>
                    <?php $linkPlus =  strtr($rowNews["titulo"], " ", "+");
                    $urlSocial = $rowNews["categoria"]."/".$rowNews["link"]?>
                    <li class="share-social fb" title="Compartir en Facebook">
                        <a href="https://www.facebook.com/sharer.php?u=https://www.fundacionredesdeayuda.org/noticias/<?php echo $urlSocial ?>"
                            title="Compartir en Facebook">
                            <i class="fab fa-facebook-f icon"></i>
                        </a>
                    </li>
                    <li class="share-social tw" title="Compartir en Twitter">
                        <a href="https://twitter.com/intent/tweet?text=<?php echo $linkPlus;?>&amp;url=https://www.fundacionredesdeayuda.org/noticias/<?php echo $urlSocial ?>"
                            title="Compartir en Twitter">
                            <i class="fab fa-twitter icon"></i>
                        </a>
                    </li>
                    <li class="share-social ws" title="Compartir por WhatsApp">
                        <a href="https://api.whatsapp.com/send?text=<?php echo $linkPlus;?>+https://www.fundacionredesdeayuda.org/noticias/<?php echo $urlSocial ?>"
                            title="Compartir por WhatsApp">
                            <i class="fab fa-whatsapp icon"></i>
                        </a>
                    </li>
                    <li class="share-social em" title="Compartir por Correo Electrónico">
                        <a href="mailto:?subject=<?php echo $rowNews["titulo"] ?>&body=https://www.fundacionredesdeayuda.org/<?php echo $urlSocial ?>"
                            title="Compartir por Correo">
                            <i class="fas fa-envelope icon"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>



    <?php include_once("../../php/cookies-three.php"); ?>

    <?php include_once("../../php/footer-three.php"); ?>






    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>