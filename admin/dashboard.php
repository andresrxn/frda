
<?php

include('../php/db.php');

session_start();

if(!isset($_SESSION['user'])){
    header("location:../ingresar.php");
    die();
}

if($_SESSION["priv"] != 1){
    echo '<script>location.href="../cuenta.php"</script>';
}

if(isset($_COOKIE["login"])){
    include('../php/db.php');

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

    <!--About-->
    <title>Dashboard | Fundación Redes de Ayuda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/date-1.1.1/r-2.2.9/sl-1.3.3/datatables.min.css"/>

    <link rel="stylesheet" href="../css/normalize.min.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/donations.css">
    <link rel="stylesheet" href="css/proyects.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>

    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script defer type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script defer type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/jszip-2.5.0/dt-1.11.2/af-2.3.7/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/date-1.1.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>


    <script defer src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js"></script>

    
    <link rel="icon" href="../favicon.ico" type="image/x-icon" />

    <script defer src="admin.js"></script>

</head>


<body onload="mostrarSaludo()">
    <noscript><strong style="text-align: center;">Lo sentimos, este sitio web requiere que del uso de JavaScript, por favor actívalo y continua navegando.</strong>
    <a href="https://kb.benchmarkemail.com/es/como-puedo-habilitar-javascript-en-el-navegador-de-una-pc/amp/" style="display: block; width: 100%; text-align: center;">¿Cómo puedo activarlo?</a></noscript>

    <main>

        <section class="admin-menu">

            <nav class="nav" id="nav">
                <div class="menu-img">
                    <a href="../" id="menu-img">

                        <img src="../img/logos/redes-de-ayuda-completo.svg" alt="">
                    </a>
                </div>
                <ul class="nav-ul">

                    <li class="nav-li active" id="dashPrincipal">
                        <i class="fas fa-home icon"></i> Dashboard
                    </li>
                </ul>
                <ul class="nav-ul">
                    <h3>Principal</h3>
                    <li class="nav-li" id="dashDonations">
                        <i class="fas fa-gift icon"></i> Donaciones
                    </li>
                    <li class="nav-li" id="dashProyects">
                        <i class="far fa-calendar-check icon"></i> Proyectos
                    </li>
                    <li class="nav-li" id="dashNews">
                        <i class="fas fa-newspaper icon"></i> Noticias
                    </li>
                    <li class="nav-li" id="dashSponsors">
                        <i class="fas fa-hand-holding-heart icon"></i> Patrocinadores
                    </li>
                    <li class="nav-li" id="dashUsers">
                        <i class="fas fa-users icon"></i> Usuarios
                    </li>
                    <li class="nav-li" id="dashContact">
                        <i class="fas fa-comments icon"></i> Contacto
                    </li>
                    <li class="nav-li" id="dashHelp">
                        <i class="fas fa-medkit icon"></i> Solicitudes de Ayuda
                    </li>
                </ul>
                <ul class="nav-ul">
                    <h3>Cuenta</h3>
                    <li class="nav-li" id="dashConfig">
                        <i class="fas fa-user icon"></i> Mi Perfil
                    </li>
                    <li class="nav-li" id="dashSavedProyects">
                        <i class="fas fa-bookmark icon"></i> Proyectos Guardados
                    </li>
                    <li class="nav-li" id="dashFavoritedNews">
                        <i class="fas fa-heart icon"></i> Noticias Favoritas
                    </li>
                    <li class="nav-li" id="dashSuscriptions">
                        <i class="fas fa-credit-card icon"></i> Suscripciones
                    </li>
                    <li class="nav-li" id="dashHistory">
                        <i class="fas fa-history icon"></i> Historial de Donativos
                    </li>
                    <li id="dashClose" class="logout">
                        <a href="../php/close.php">
                            <i class="fas fa-sign-out-alt icon"></i> Cerrar Sesión
                        </a>
                    </li>

                </ul>
            </nav>
        </section>
        <section class="dash-content">
            <div class="menu">
                <div class="user-menu">
                    <h1 class="menu-h1"><span id="salute"></span> Administrador</h1>

                </div>
                <div class="menu-icons">

                    <div class="mode" id="mode">
                        <img src="../img/svg/dia.svg" class="title-img" id="mode-img"></img>
                    </div>
                    <div class="header-container-burger" id="menu-burger">
                        <div class="header-btn">
                            <div class="header-btn-burger">
                            </div>
                        </div>
                    </div>
                    <div class="current-date">
                        Viernes, 14 de noviembre del 2021
                    </div>
                </div>
            </div>
            <div id="response-dash" class="response-dash">
               
               <?php include('proyects.php')?>
            </div>
            

            <div class="cookie-shadow" id="cookie-shadow"></div>
        </section>
    </main>


   
  
</body>

</html>