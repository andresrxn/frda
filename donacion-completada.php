<?php include_once("php/connection-user.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Donación Exitosa</title>
    <meta name="description" content="Has completado tu donación, toda Guatemala agradece tu aporte y tu interés por ayudar al necesitado.">

      <!--preload-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/donation-completed.css">

    
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

    <script defer>
        function createHeart() {
            const heart = document.createElement("div");
            heart.classList.add("heart");
            heart.style.transform = `scale(${Math.random() + 0.8 }) `;
            heart.style.left = Math.random() * 100 + "vw";
            heart.style.animationDuration = Math.random() * 2 + 4 + "s";

            heart.innerHTML = "<i class='fas fa-heart icon'></i> ";

            document.body.appendChild(heart);

            setTimeout(() => {
                heart.remove();
            }, 5500);
        }

        setInterval(createHeart, 500);
    </script>
    <script defer src="js/cookies.min.js"></script>
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

  <!--Social-->
  <meta property="og:url" content="https://www.fundacionredesdeayuda.org">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Donación Exitosa | Fundación Redes de Ayuda" />
    <meta property="og:description" content="¡Has completado tu donación! Toda Guatemala agradece tu aporte y tu interés por ayudar al necesitado.">
    <meta property="og:image" content="img/logos/redes-de-ayuda-completo.svg">

    <!-- TWITTER -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@fundacionrda">
    <meta name="twitter:creator" content="@fundacionrda">
    <meta name="twitter:title" content="Donación Exitosa | Fundación Redes de Ayuda">
    <meta name="twitter:description" content="¡Has completado tu donación! Toda Guatemala agradece tu aporte y tu interés por ayudar al necesitado.">
    <meta name="twitter:image" content="img/logos/redes-de-ayuda-completo.svg">

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
  
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include_once("php/header.php"); ?>


    <main>
        <div class="banner">
            <div class="banner-container completed">
                <div class="banner-img">
                    <img src="img/svg/donation-success.svg" alt="">
                </div>
                <div class="banner-title">
                    <h1>
                        <span>¡Gracias por</span>
                        <span>Tu Donativo!</span>
                    </h1>
                    <p>
                        <span>Todo aporte suma y hace la diferencia en la vida de todos los Guatemaltecos que lo necesitan, ¡Gracias por ser parte!</span>

                    </p>

                    <div class="more">
                        <a href="/" class="more-circle">
                            Volver al Inicio
                            <i class="fas fa-chevron-right icon"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    
    <?php include_once("php/cookies.php"); ?>
    
    <?php include_once("php/footer.php"); ?>









    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>