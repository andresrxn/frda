<?php


include ('../php/db.php');
session_start();

$datos = array(

    "pass" => 0,
    "newpass" => 0,
);

function validate($campo){
    include('../php/db.php');
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    $campo = mysqli_real_escape_string($connection, $campo);
    return $campo;
    mysqli_close($connection);
}
function inputErrorAccount($small, $message, $input){
    echo   "
       
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
            
    document.querySelector('#form-pass button').innerHTML = 'Cambiar';
    document.querySelector('#form-pass button').classList.remove('disabled');
    document.querySelector('#form-pass button').classList.add('btn-error'); 
    setTimeout(() => {
        document.querySelector('#form-pass button').classList.remove('btn-error');
    }, 500);
 ";
}
echo'<script> ';


if (isset($_POST["ajax-account"])){
    
    $inputPassword = validate($_POST["password"]);
    $inputNewPassword = validate($_POST["newPassword"]);

    $token = $_SESSION['user'];

   $verificarCorreo = mysqli_query($connection, "SELECT * FROM usuarios WHERE tokenId='$token'");


   $selectAcc = "SELECT correo, pass FROM usuarios WHERE tokenId = '$token'";
    $resultAcc = $connection->query($selectAcc);
    $rowAcc = $resultAcc->fetch_assoc();

   
    if (!empty($inputPassword)) {
        
        if(!password_verify($inputPassword, $rowAcc["pass"])){
            inputErrorAccount($small = 'smallPassword', $message = 'La contraseña es incorrecta', $input = '.input-password');
            
            $datos["pass"] = 0;
       
        }
       


    }
    if(!empty($inputPassword) && empty($inputNewPassword)){
        inputErrorAccount($small = 'smallNewPassword', $message = 'Por favor ingresa tu nueva contraseña', $input = '.input-new-password');
        
        $datos["newpass"] = 0;
        
    }

    if(!empty($inputNewPassword)){
        if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $inputNewPassword)){
            inputErrorAccount($small = 'smallNewPassword', $message = 'Ingresa al menos un número y una mayúscula', $input = '.input-new-password');
            $datos["newpass"] = 0;

        }
        if(strlen($inputNewPassword) < 8){
            inputErrorAccount($small = 'smallNewPassword', $message = 'Ingresa un mínimo de 8 caracteres', $input = '.input-new-password');
            $datos["newpass"] = 0;
        } 
        if(password_verify($inputNewPassword, $rowAcc["pass"])){
            inputErrorAccount($small = 'smallNewPassword', $message = 'Ingresa una constraseña distinta a la actual', $input = '.input-new-password');

            $datos["newpass"] = 0;
        } 
    }



    if(!empty($inputNewPassword) && strlen($inputNewPassword) > 8 && preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $inputNewPassword) && !password_verify($inputNewPassword, $rowAcc["pass"])) {
        $datos["newpass"] = 1;
      
        
    }
    if(password_verify($inputPassword, $rowAcc["pass"])){
        $datos["pass"] = 1;
    }
    if(empty($inputPassword) && empty($inputNewPassword)){
        $datos["pass"] = 1;
        $datos["newpass"] = 1;
    }

    if($datos["pass"] == 1 &&  $datos["newpass"] == 1){

        
        $inputPassword = validate($_POST["password"]);
        $inputNewPassword = validate($_POST["newPassword"]);
        
    
        if(isset($_SESSION["user"]) && isset($_SESSION["priv"])){
            
            
            if(empty($inputPassword) && empty($inputNewPassword)){
                echo   "
            
                
                document.querySelector('#form-pass button').innerHTML = 'No se hizo ningún cambio'; 
                setTimeout(() => {
                    
                    document.querySelector('#form-pass button').innerHTML = 'Cambiar';
                    document.getElementById('editPass').innerText = '[Cambiar]';
                    
                    
                    document.querySelector('.input-password').classList.add('disable');
                    
                    
                    document.querySelector('.input-new-password').classList.add('disable');
                    
                    
                    document.querySelector('#form-pass button').parentElement.classList.add('disable');
                    document.querySelector('#form-pass button').classList.remove('disabled');                   
                }, 1500);
                
                document.querySelector('.input-password').classList.remove('success');
                document.querySelector('.input-new-password').classList.remove('success');
              
        
                ";
            }else{

                $inputNewPassword = password_hash($inputNewPassword, PASSWORD_DEFAULT);

                $currentEmail = $rowAcc["correo"];
                $user = $currentEmail."+".$inputNewPassword;
                $newToken = hash('sha512', $user);

                $updateAccount = "UPDATE usuarios SET pass = '$inputNewPassword', tokenId = '$newToken' WHERE tokenId = '$token'";
                $resultAcc = mysqli_query($connection, $updateAccount);

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

                if($resultAcc){
                    echo   "
                
                    
                    document.querySelector('#form-pass button').style.background = '#2ecc71';
                    
                    document.querySelector('#form-pass button').innerHTML = 'Actualizado'; 
                    setTimeout(() => {
                       cancelPass();
                    }, 1200);
    
                 
                  
            
                    ";
                }else{
                    echo "
                    
                    document.querySelector('#form-pass button').style.background = '#e74c3c';
                    document.querySelector('#form-pass button').style.pointerEvents = 'none';
                    document.querySelector('#form-pass button').innerHTML = 'No se pudo Actualizar;'; 
                    setTimeout(() => {
                        document.querySelector('#form-pass button').style.background = 'var(--celeste-oscuro)';
                        document.querySelector('#form-pass button').innerHTML = 'Cambiar';
                        document.querySelector('#form-pass button').style.pointerEvents = 'auto';
                    }, 1200);
                    ";
                }
            }

            





    
        }
    }

}

echo'</script>';

?>