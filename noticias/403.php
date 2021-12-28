<?php include_once("../php/connection-user-two.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>No tienes permiso para acceder | Fundación Redes de Ayuda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/normalize.min.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/404.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

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

    <link rel="icon" href="favicon.ico" type="image/x-icon" />

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <?php include_once("../php/header-two.php"); ?>

    <main>
        <section class="banner">
            <div class="banner-container">
                <div class="banner-img">
                    <img src="img/svg/4040.svg" alt="404 Página no Encontrada">
                </div>
                <div class="banner-des">
                    <h1 class="h1">Página Restringida</h1>
                    <p>
                        No posees permiso para acceder a esta página; puedes <a href="/">regresar al incio</a> o visitar nuestro <a href="mapa-de-sitio">mapa de sitio</a> para ver todos los
                        links disponibles.
                    </p>
                </div>
            </div>
        </section>

    </main>
    
    
    
    
    <?php include_once("../php/cookies-two.php"); ?>
    
    <?php include_once("../php/footer-two.php"); ?>
    
    
    <script src="../js/cookies.js"></script>
    <script src="../js/main.js "></script>
    
</body>




<!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>