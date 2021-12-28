<?php

include('../php/db.php');
include('enter-code-user.php');

$datosPass = array(        
    "new" => 0,  
    "confirm" => 0,  
);

function inputErrorPass($small, $message, $input){
    echo   "
    
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
            
    document.getElementById('btnPass').innerHTML = 'Cambiar Contraseña';
    document.getElementById('btnPass').classList.remove('disabled');
    document.getElementById('btnPass').classList.add('btn-error'); 
    setTimeout(() => {
        document.getElementById('btnPass').classList.remove('btn-error');
    }, 500);

    
";
}

if (isset($_POST["passAjax"] )){

    
    $newPass = validate($_POST["new-pass"]);
    $confirmPass = validate($_POST["confirm-pass"]);

    $verificarUsuario = mysqli_query($connection, "SELECT * FROM usuarios WHERE correo='$formEmail'");
    
    $verificarPass = $verificarUsuario->fetch_array();
    
    
    if(empty($newPass)){
        inputErrorPass($small = 'smallNewPass', $message = 'Por favor ingresa la nueva contraseña', $input = '.input-new-pass');
        $datosPass["new"] = 0;
    } else {
        if(password_verify($newPass, $verificarPass["pass"])){
          
            inputErrorPass($small = 'smallNewPass', $message = 'Esta es tu contraseña actual, intenta iniciar sesión', $input = '.input-new-pass');
            $datosPass["new"] = 0;
        } 
        if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $newPass)){
            inputErrorPass($small = 'smallNewPass', $message = 'Debe contener al menos un número y una mayúscula', $input = '.input-new-pass');
            $datosPass["new"] = 0;

        }
        if(strlen($newPass) < 8)
        {
            inputErrorPass($small = 'smallNewPass', $message = 'Debe contener al menos 8 caracteres', $input = '.input-new-pass');
            $datosPass["new"] = 0;
        } 
           
    
    }
    if(empty($confirmPass)){
        inputErrorPass($small = 'smallConfirmPass', $message = 'Por favor confirma tu contraseña', $input = '.input-confirm-pass');
        $datosPass["confirm"] = 0;
    } else {
        if(password_verify($confirmPass, $verificarPass["pass"])){
          
            inputErrorPass($small = 'smallConfirmPass', $message = 'Esta es tu contraseña actual, intenta iniciar sesión', $input = '.input-confirm-pass');
            $datosPass["confirm"] = 0;
        } 
        if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $confirmPass)){
            inputErrorPass($small = 'smallConfirmPass', $message = 'Debe contener al menos un número y una mayúscula', $input = '.input-confirm-pass');
            $datosPass["confirm"] = 0;

        }
        if(strlen($confirmPass) < 8){
            inputErrorPass($small = 'smallConfirmPass', $message = 'Debe contener al menos 8 caracteres', $input = '.input-confirm-pass');
            $datosPass["confirm"] = 0;
        } 
        if($confirmPass != $newPass){
            inputErrorPass($small = 'smallConfirmPass', $message = 'La contraseña no coincide', $input = '.input-confirm-pass');
            $datosPass["confirm"] = 0;
        } 
           
    
    }
   

    if(!empty($newPass) && !password_verify($newPass, $verificarPass["pass"]) && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $newPass) && strlen($newPass) >= 8){
        $datosPass["new"] = 1;
    }
    if(!empty($confirmPass) && !password_verify($confirmPass, $verificarPass["pass"]) && preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $confirmPass) && strlen($confirmPass) >= 8 && $confirmPass == $newPass){
        $datosPass["confirm"] = 1;
    }
   
    if($datosPass["new"] == 1 && $datosPass["confirm"] == 1 ){
        $validateAll["changed"] = 1;
    }

    if($validateAll["changed"] == 1){

        $newPass = password_hash($newPass, PASSWORD_DEFAULT);

        $user = $formEmail."+".$newPass;
    
        $newToken = hash('sha512', $user);
        
        $updateCode = "UPDATE usuarios SET modificacion = NOW(), pass = '$newPass', tokenId = '$newToken' WHERE tokenId = '$token'";

        
        $result = mysqli_query($connection, $updateCode);


        $sqlTokenProyects = "SELECT * FROM proyectos_guardados WHERE tokenId = '$token'";
        $resultTokenProyects = $connection->query($sqlTokenProyects);
        
        $sqlTokenNews = "SELECT * FROM noticias_favoritas WHERE tokenId = '$token'";
        $resultTokenNews = $connection->query($sqlTokenNews);

        $sqlTokenDonations = "SELECT * FROM donaciones WHERE tokenId = '$token'";
        $resultTokenDonations = $connection->query($sqlTokenDonations);
        
        $selectSuscriptions = "SELECT * FROM suscripciones WHERE tokenId = '$token'";                
        $resultTokenSuscriptions = $connection->query($selectSuscriptions);

        while(mysqli_num_rows($resultTokenProyects) > 0 ){
                            
            $updateProyects = "UPDATE proyectos_guardados SET tokenId = '$newToken' WHERE tokenId = '$token'";
            $resultUpdateProyects = $connection->query($updateProyects);
            break;
            
        }
        while(mysqli_num_rows($resultTokenNews) > 0 ){
                            
            $updateNews = "UPDATE noticias_favoritas SET tokenId = '$newToken' WHERE tokenId = '$token'";
            $resultUpdateNews = $connection->query($updateNews);
            break;
            
        }
        while(mysqli_num_rows($resultTokenDonations) > 0 ){
                            
            $updateDonations = "UPDATE donaciones SET tokenId = '$newToken' WHERE tokenId = '$token'";
            $resultUpdateDonations = $connection->query($updateDonations);
            break;
            
        }
        while(mysqli_num_rows($resultTokenSuscriptions) > 0 ){
                            
            $updateSuscriptions = "UPDATE suscripciones SET tokenId = '$newToken' WHERE tokenId = '$token'";
            $resultUpdateSuscriptions = $connection->query($updateSuscriptions);
            break;
            
        }

        if(isset($_COOKIE["login"])){
            setcookie("login",$newToken, time() + 365 * 24 * 60 * 60,"/",false, false);
        }

        $_SESSION["user"] = $newToken;

        if($result){
            echo   "
            
            document.getElementById('step-email-three').classList.remove('active');
        
            document.getElementById('step-email-four').classList.add('active');    
            document.getElementById('btnPass').classList.remove('disabled');
            
            
            ";
        }
    }

    
}



?>