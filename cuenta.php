<?php

include('php/db.php');

session_start();

if(!isset($_SESSION['user'])){
    header("location:ingresar.php");

    die();
}

if($_SESSION["priv"]==1){
    echo '<script>location.href="admin/dashboard.php"</script>';
}

if(isset($_COOKIE["login"])){
    include('php/db.php');

    $cookie = $_COOKIE["login"];

    $verificarUsuario = mysqli_query($connection, "SELECT * FROM usuarios WHERE tokenId='$cookie'");
    
    if(mysqli_num_rows($verificarUsuario) > 0){
        $verificar = $verificarUsuario->fetch_array();
        $tokenId = $verificar['tokenId'];
        $privilegio = $verificar['privilegio'];
        $_SESSION["user"] = $tokenId;
        $_SESSION["priv"] = $privilegio;
    }
}

$privilegio = $_SESSION["priv"];

$nameUser = $_SESSION['user'];

    
    
$sql = "SELECT * FROM usuarios WHERE tokenId = '$nameUser'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

$name = $row["nombre"];
$palabras = explode (" ", $name);



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cuenta de <?php echo $palabras[0]; ?> | Fundación Redes de Ayuda</title>

       <!-- Preconnect  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/account.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ=="
        crossorigin="anonymous"></script>


    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script defer src="js/cookies.js "></script>
    <script defer src="js/main.js"></script>
    <script defer src="js/account.js"></script>


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


<body onload="mostrarSaludo()">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ3MVCK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <?php include_once("php/header.php"); ?>

    <main>
        <section class="banner">
            <div class="shadow-content" id="shadow-content"></div>
            <div class="close-donation" id="close-donation">            
                <i class="fas fa-times icon"></i>
            </div>
            <div class="new-card" id="new-card">
                <div id="card-response"></div>
                <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="form-new-card" class="form">

                                        
                <div class="form-container short">
                    
                    <div class="form-control input-credit input-number-card">
                        <label for="numberCard">Número de la Tarjeta <b>(Visa o Mastercard)</b></label>
                        <input type="text" id="inputNumberCard" name="numberCard" autocomplete="off" maxlength="19" />
                        
                        <small id="smallNumberCard"></small>

                        <div class="small-card" id="small-card">
                        <img src="img/svg/small-card.svg" alt="">
                    </div>
                    </div>
                    <div class="form-control input-credit input-name-card">
                        <label for="inputNameCard">Nombre de la Tarjeta</label>
                        <input type="text" id="inputNameCard" name="nameCard" autocomplete="off" maxlength="20" />
                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallNameCard"></small>
                    </div>

                    <div class="select-group card-group">
                        <div class="form-control input-subject input-month">
                            <label for="">Expiración</label>

                            <select name="monthCard" id="selectMonth">
                            <option disabled selected>Mes</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                            <div class="arrow-icon">
                                <i class="fas fa-chevron-down icon"></i>
                            </div>
                        </div>
                        <div class="form-control input-subject input-year">
                            <select name="yearCard" id="selectYear">
                            <option disabled selected>Año</option>
                            <option value="21">2021</option>
                            <option value="22">2022</option>
                            <option value="23">2023</option>
                            <option value="24">2024</option>
                            <option value="25">2025</option>
                            <option value="26">2026</option>
                            <option value="27">2027</option>
                            <option value="28">2028</option>
                            <option value="29">2029</option>
                        </select>
                            <div class="arrow-icon">
                                <i class="fas fa-chevron-down icon"></i>
                            </div>
                        </div>



                        <div class="form-control input-credit  input-ccv-card">
                            <label for="">CCV 
                            <div class="info-ccv">
                                <i class="fas fa-question-circle icon"></i>
                                <span>Código de 3 o 4 números situado en el reverso de la tarjeta de crédito.</span></div>
                            </label>
                            <input type="text" id="ccvCard" name="ccvCard" autocomplete="off" maxlength="4" />
                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallCcvCard"></small>
                        </div>
                    </div>
                    <input type="hidden" name="ajax-credit">
                    <button id="btn-new-card" id="btn-new-card">Agregar</button>
                    
                </div>
                </form>
            </div>
            <div class="enter-email" id="enter-email">
                <div class="enter-email-container">
                    <form action="" name="form-email" id="form-email" class="form">
                       
                        <div class="step two active" id="step-email-two">

                            <h3>Enviado con Éxito <i class="fas fa-check icon"></i></h3>
                            <p>Revisa tu correo electrónico e ingresa el código que te hemos enviado.</p>


                            <div class="form-container">

                                <div class="form-control input-code">

                                    <input type="number" id="code" name="code" autocomplete="off" max="999999" />

                                    <i class="inputIcon fas fa-check-circle iconCheck"></i>
                                    <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                                    <small id="smallCode"></small>
                                </div>
                                <input type="hidden" name="codeAjax">
                                <button id="btnCode" name="btnCode">Hecho</button>
                            </div>
                        </div>
                        <div class="step three" id="step-email-three">
                            <h3>Crea una Nueva Contraseña</h3>

                            <div class="form-container">

                                <div class="form-control input-new-pass">

                                    
                                    <input type="password" id="new-pass" name="new-pass"
                                        autocomplete="off" class="password" placeholder="Nueva Contraseña"/>
                                        <div class="show-pass show-new-pass">
                                        <i class="far fa-eye-slash icon"></i>
                                    </div>
                                    <small id="smallNewPass"></small>
                                </div>

                                <div class="form-control input-confirm-pass">

                                    
                                    <input type="password" id="confirm-pass" name="confirm-pass"
                                        autocomplete="off" class="password" placeholder="Confirma tu Contraseña"/>
                                        <div class="show-pass show-confirm-pass">
                                        <i class="far fa-eye-slash icon"></i>
                                    </div>
                                    <small id="smallConfirmPass"></small>
                                </div>
                                
                                <input type="hidden" name="passAjax">
                                <button id="btnPass" name="btnPass">Cambiar Contraseña</button>
                            </div>
                        </div>
                        <div class="step four" id="step-email-four">
                            <div class="step-img">
                                <img src="img/svg/success.svg" alt="">
                            </div>
                            <h3>Contraseña Restablecida</h3>
                            <p>Se ha actualizado con éxito, ya puedes usar tu nueva contraseña para inciar sesión.</p>

                            <button id="btnClose" name="btnClose">Aceptar</button>
                        </div>

                    </form>


                </div>

            </div>
            <div class="delete-account" id="delete-account">
                <div class="delete-account-container">
                    <form action="" name="form-delete-account" id="form-delete-account" class="form">
                        <h3>¿Estas seguro que deseas eliminar tu cuenta?</h3>
                        <p>Esta acción no se puede reanudar y todos los datos relacionados a tu cuenta se borrarán permamentemente.</p>
                        <input type="hidden" name="ajax-delete-account">
                        <button id="btnDeleteAccount" name="btnDeleteAccount">Eliminar Cuenta</button>
                        <button class="btn-second" id="btnCancelDelete" name="btnCancelDelete">Cancelar</button>
                    </form>
                </div>
            </div>
            <div class="refund-content" id="refund-content">
                <div class="refund-container">
                    <div class="refund-title">
                        <h3>Solicitar Reembolso</h3>
                        <p>¿Donaste por error o no era la cantidad correcta? Puedes solicitarnos que te devolvamos tu dinero en un periodo máximo de siete días, puedes hacerlo por cualquier medio de contacto con el asunto "Solicitud de Reembolso"</p>
                        <a href="contacto">Contactar</a>
                    </div>
                </div>
            </div>
            <div class="recipe-history" id="recipe-history">
                <?php 
                $sqlHistory = "SELECT * FROM usuarios WHERE tokenId = '$nameUser'";
        
                $resultHistory = $connection->query($sqlHistory);
                $rowHistory = $resultHistory->fetch_assoc();
                
                ?>
                <div class="recipe-container">
                    <div class="recipe-title">
                        <div class="recipe-img">
                            <img src="img/svg/gift.svg" alt="">
                        </div>
                        <div class="recipe-title-content">
                            <div class="recipe-amount">
                                <b>GTQ</b>
                                <span>100</span>
                            </div>
                            <div class="recipe-number">
                                <span>#00000100</span>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-info">
                        <h3>Donación General</h3>
                        <div class="recipe-name">
                            <p><i class="fas fa-user icon"></i> Carlos Raxón</p>
                            <span class="flag"><?php echo$rowHistory["pais"] ?></span>
                        </div>
                        <p class="recipe-email"><i class="fas fa-envelope icon"></i> carlosraxon019@gmail.com</p>
                        <p><i class="fas fa-phone icon"></i> 33242342</p>
                    </div>
                    <div class="recipe-date">
                        <time>22 de oct. 2021 a las 12:30pm</time>
                    </div>
                    
                    
                </div>
            </div>
           
            

            <div class="banner-container">
                <div class="banner-title">
                    <h1>
                        <span id="salute"></span>
                    
                        <img src="" class="title-img" alt="" id="title-img">
                    </h1>

                    <div class="menu-account">
                        <div class="menu-account-header">
                            <span id="menu-title" class="menu-title">
                                <i class="fas fa-user icon"></i>Perfil</span>
                            <i class="fas fa-chevron-down icon-more"></i>
                        </div>
                        <div class="menu-account-options">
                            <div class="menu-account-options-content active" id="profile">
                                <i class="fas fa-user icon"></i>
                                Perfil
                            </div>
                            <div class="menu-account-options-content" id="history">
                                <i class="fas fa-history icon"></i>
                                Historial de Donativos
                            </div>
                            <div class="menu-account-options-content" id="suscriptions">
                            <i class="fas fa-credit-card icon"></i>
                                Suscripciones Activas
                            </div>
                            <div class="menu-account-options-content" id="saved">
                            <i class="fas fa-bookmark icon"></i>
                                Proyectos Guardados
                            </div>
                            <div class="menu-account-options-content"
                                id="favorited">
                            <i class="fas fa-heart icon"></i>
                                Noticias Favoritas
                            </div>
                            <div class="menu-account-options-content" id="security">
                            <i class="fas fa-lock icon"></i>
                                Seguridad
                            </div>
                            <div class="menu-account-option-close" id="close-session">
                                <a href="php/close.php">
                                    <i class="fas fa-sign-out-alt icon"></i>
                                    Cerrar Sesión
                                </a>
                            
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-content">
                    <div class="response-content" id="response-content">
                        
                        
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include_once("php/cookies.php"); ?>

    <?php include_once("php/footer.php"); ?>


 
    <!--Si ves esto... Dios te Bendiga :)-->
</body>

</html>
