<?php

include('../php/db.php');

session_start();

if(!isset($_SESSION['user'])){
    header("location:../ingresar.php");

    die();
}else{
    if($_SESSION["priv"] != 1){
        header("location:../cuenta.php");
    
        die(); 
    }
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

    
    
$sql = "SELECT SUBSTRING_INDEX(nombre, ' ', 1) AS nombre, apellido, tokenId, correo, telefono, pais, identificacion, pass FROM usuarios WHERE tokenId = '$nameUser'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <!--Default-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="icon" href="../favicon.ico" type="image/x-icon" />
    <!--About-->
    <title>Crear Nueva Noticia | Fundación Redes de Ayuda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/normalize.min.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="../css/account.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script>


</head>


<body>


   <?php include("../php/header-two.php") ?>

    <main>

        <div class="banner-proyect">
            <div class="banner-container create-file">
                <div class="banner-title">
                    <h1>Crear un Nueva Noticia</h1>
                </div>
                <div id="response"></div>
                <form action="" method="POST" class="form create-file" id="form-news" enctype="multipart/form-data">
                    <div class="preview">
                        <div class="preview-container" id="preview-container">

                        </div>
                    </div>
                  
                    <div class="form-container">
                        <div class="form-control input-img">
                            <label for="">Subir Imágen</label>
                            <input type="file" name="img" id="img">

                            <small id="smallImg"></small>
                        </div>
                        <div class="form-control input-title">
                            <label for="">Título</label>
                            <input type="text" autocomplete="off" id="title" name="title">

                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallTitle"></small>
                        </div>
                        
                        <div class="form-control input-subject">
                            <label for="">Categoría</label>
                            <select name="category" id="category">
                                <option value="categoria-1">Categoría 1</option>
                                <option value="categoria-2">Categoría 2</option>
                                <option value="categoria-3">Categoría 3</option>
                                <option value="categoria-4">Categoría 4</option>
                                <option value="categoria-5">Categoría 5</option>
                             

                            </select>
                            <div class="arrow-icon">
                                <i class="fas fa-chevron-down icon"></i>
                            </div>
                        </div>
                        <div class="form-control input-reading">
                        <label for="">Tiempo de Lectura</label>
                            <input type="text" autocomplete="off" id="reading" name="reading">

                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallReading"></small>
                        </div>
                        <div class="form-control input-place">
                        <label for="">Lugar, Ciudad o Páis</label>
                            <input type="text" autocomplete="off" id="place" name="place">

                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallPlace"></small>
                        </div>

                        <input type="hidden" name="ajax-news">
                        <button id="btnNews" name="btnNews">Crear Noticia</button>
                    </div>
                </form>
            </div>
        </div>


    </main>


    <?php include("../php/footer-two.php") ?>

    <script src="../js/main.js"></script>
    <script src="../js/create-news.js"></script>

</body>

</html>