<?php


include ('../php/db.php');
session_start();

$datos = array(
    "id" => 0,
    "email" => 0,
    "name" => 0,
    "phone" => 1,
    "lastname" => 0,
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
            
    document.getElementById('btnEditar').innerHTML = 'Actualizar';
    document.getElementById('btnEditar').classList.remove('disabled');
    document.getElementById('btnEditar').classList.add('btn-error'); 
    setTimeout(() => {
        document.getElementById('btnEditar').classList.remove('btn-error');
    }, 500);
 ";
}
echo'<script> ';


if (isset($_POST["ajax-personal"])) {

    $inputName = validate($_POST["name"]);
    $inputEmail = validate($_POST["email"]);
    $inputLastname = validate($_POST["lastname"]);
    // $inputId = validate($_POST["id"]);
    
    $verificarCorreo = mysqli_query($connection, "SELECT * FROM usuarios WHERE correo='$inputEmail'");

    $token = $_SESSION['user'];

    $selectAcc = "SELECT * FROM usuarios WHERE tokenId = '$token'";
    $resultAcc = $connection->query($selectAcc);
    $rowAcc = $resultAcc->fetch_assoc();

    if(isset($_POST["adress"])){
        $inputAdress = validate($_POST["adress"]);
    }
    $inputPhone = validate($_POST["phone"]);

    $pass = $rowAcc["pass"];

    $user = $inputEmail."+".$pass;

    $newToken;
    // if (empty($inputId)) {
    //     echo   "
       
    //         document.getElementById('smallId').innerHTML='';
    //         document.querySelector('.input-id').classList.remove('success');
    //         document.querySelector('.input-id').classList.remove('error');
          
    //         document.getElementById('btnEditar').innerHTML = 'Hecho';
    //  ";
    //      $datos["id"] = 1;

    // } else{
    //     if(!preg_match('/^[a-zA-Z0-9]*$/', $inputId)) {
    //         echo  "
           
    //             document.getElementById('smallId').innerHTML='No ingreses espacios o guiones';
    //             document.querySelector('.input-id').classList.remove('success');
    //             document.querySelector('.input-id').classList.add('error');
    //             document.getElementByIdbtnEditar-card').classList.remove('disabled');
    //             setTimeout(() => {
    //                 document.getElementById('btnEditar').classList.remove('btn-error');
    //             }, 500);            
    //             document.getElementById('btnEditar').innerHTML = 'Hecho';
    //      ";
    //         $datos["id"] = 0;
    
    //     } 
    //     if(strlen($inputId) < 10) {
    //         echo   "
           
    //             document.getElementById('smallId').innerHTML='Mínimo 10 caracteres';
    //             document.querySelector('.input-id').classList.remove('success');
    //             document.querySelector('.input-id').classList.add('error');
    //             document.getElementById('btnEditar').classList.add('btn-error'); 
    //             setTimeout(() => {
    //                 document.getElementById('btnEditar').classList.remove('btn-error');
    //             }, 500);            
    //             document.getElementById('btnEditar').innerHTML = 'Hecho';
         
    //      ";
    //         $datos["id"] = 0;
    
    //     }
    //     if(strlen($inputId) > 25) {
    //         echo   "
           
    //             document.getElementById('smallId').innerHTML='Máximo 25 caracteres.';
    //             document.querySelector('.input-id').classList.remove('success');
    //             document.querySelector('.input-id').classList.add('error');
    //             document.getElementById('btnEditar').classList.add('btn-error'); 
    //             setTimeout(() => {
    //                 document.getElementById('btnEditar').classList.remove('btn-error');
    //             }, 500);            
    //             document.getElementById('btnEditar').innerHTML = 'Hecho';
    //      ";
            
    //         $datos["id"] = 0;
    //     }
    // }
    if (empty($inputName)) {
        inputErrorAccount($small = 'smallName', $message = 'Ingresa tu nombre', $input = '.input-name');
         $datos["name"] = 0;

    } else{
        if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputName)) {
            inputErrorAccount($small = 'smallName', $message = 'Ingresa solo letras', $input = '.input-name');
            $datos["name"] = 0;
    
        } 
        if(strlen($inputName) < 3) {
            inputErrorAccount($small = 'smallName', $message = 'Mínimo 3 letras', $input = '.input-name');
            $datos["name"] = 0;
    
        }
        if(strlen($inputName) > 30) {
            inputErrorAccount($small = 'smallName', $message = 'Máximo 30 letras', $input = '.input-name');
            
            $datos["name"] = 0;
        }
    }
    if (empty($inputLastname)) {
        inputErrorAccount($small = 'smallLastname', $message = 'Ingresa tu apellido', $input = '.input-lastname');
         $datos["lastname"] = 0;

    } else{
        if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputLastname)) {
            inputErrorAccount($small = 'smallLastname', $message = 'Ingresa solo letras', $input = '.input-lastname');
            $datos["lastname"] = 0;
    
        } 
        if(strlen($inputLastname) < 3) {
            inputErrorAccount($small = 'smallLastname', $message = 'Mínimo 3 letras', $input = '.input-lastname');
            $datos["lastname"] = 0;
    
        }
        if(strlen($inputLastname) > 30) {
            inputErrorAccount($small = 'smallLastname', $message = 'Máximo 30 letras', $input = '.input-lastname');
            
            $datos["lastname"] = 0;
        }
    }
  
    if (empty($inputEmail)) {
        inputErrorAccount($small = 'smallEmail', $message = 'Debes ingresar un correo electrónico', $input = '.input-mail');
        $datos["email"] = 0;

    } else{
        if (mysqli_num_rows($verificarCorreo) > 0 && $rowAcc["correo"] != $inputEmail) {
            inputErrorAccount($small = 'smallEmail', $message = 'Este correo ya está registrado', $input = '.input-mail');
      
            $datos["email"] = 0;
        } 
        if(!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
            inputErrorAccount($small = 'smallEmail', $message = 'Por favor ingresa un correo válido', $input = '.input-mail');
            $datos["email"] = 0;
    
        } 

    }
   

    if(empty($_POST["phone"])){
        $datos["phone"] = 1;
        echo   "
       
        document.getElementById('smallPhone').innerHTML='';
        document.querySelector('.input-phone').classList.remove('success');
        document.querySelector('.input-phone').classList.remove('error');
        document.getElementById('btnEditar').innerHTML = 'Hecho';
        ";
    }
    if (!empty($_POST["phone"])) {
        if(!preg_match('/^\d+(\.\d{1,9})?$/', $_POST["phone"])){
            inputErrorAccount($small = 'smallPhone', $message = 'Ingresa únicamente números', $input = '.input-phone');
            $datos["phone"] = 0;

        }
        if(strlen($_POST["phone"]) < 8)
        {
            inputErrorAccount($small = 'smallPhone', $message = 'Mínimo de 8 dígitos', $input = '.input-phone');
            $datos["phone"] = 0;
        } 
        if(strlen($_POST["phone"]) > 15)
        {
            inputErrorAccount($small = 'smallPhone', $message = 'Máximo de 15 dígitos', $input = '.input-phone');
            $datos["phone"] = 0;
        } 

    }
   
    // if(!empty($inputId) && strlen($inputId) > 10 && strlen($inputId) < 25 && preg_match('/^[a-zA-Z0-9]*$/', $inputId)) {
    //     $datos["id"] = 1;
    
    // }
    

    if(!empty($inputName) && strlen($inputName) > 3 && strlen($inputName) < 30 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputName)) {
        $datos["name"] = 1;
          
    }

    if(!empty($inputLastname) && strlen($inputLastname) > 3 && strlen($inputLastname) < 30 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputLastname)) {
        $datos["lastname"] = 1;
        
    }

    
    if(!empty($inputEmail) && filter_var($inputEmail, FILTER_VALIDATE_EMAIL) && mysqli_num_rows($verificarCorreo) == 0) {
        $datos["email"] = 1;
        $newToken = hash('sha512', $user);
      
        
    }
    if($rowAcc["correo"] == $inputEmail){
        $datos["email"] = 1;
        $newToken = $token;
    }

    if(!empty($_POST["phone"]) && strlen($_POST["phone"]) >= 8 && strlen($_POST["phone"]) < 15 && preg_match('/^\d+(\.\d{1,9})?$/', $_POST["phone"])) {
        $datos["phone"] = 1;
        
    }


    if($datos["name"] == 1 && $datos["lastname"] == 1  && $datos["email"] == 1 && $datos["phone"] == 1){

        // $inputId = validate($_POST["id"]);

        $inputName = ucwords($inputName);
        $inputLastname = ucwords($inputLastname);

        if(isset($_POST["adress"])){
            $inputAdress = validate($_POST["adress"]);
        }else{
            $inputAdress = '';
        }
        $inputPhone = validate($_POST["phone"]);


        if(isset($_SESSION["user"]) && isset($_SESSION["priv"])){
         
            if($inputName == $rowAcc["nombre"] && $inputEmail == $rowAcc["correo"] && $inputLastname == $rowAcc["apellido"] && $_POST["phone"] == $rowAcc["telefono"] && $_POST["adress"] == $rowAcc["pais"] ){
                echo   "
            
                
                document.getElementById('btnEditar').innerHTML = 'No se hizo ningún cambio'; 
                setTimeout(() => {
                    
                    document.getElementById('btnEditar').innerHTML = 'Hecho';
                    document.getElementById('editInfo').innerText = '[editar]';
                    
                    
                    document.querySelector('.input-mail').classList.add('disable');
                    document.querySelector('.input-name').classList.add('disable');
                    document.querySelector('.input-lastname').classList.add('disable');
                    document.querySelector('.input-phone').classList.add('disable');                    
                    document.querySelector('#flex-country .input-subject').classList.add('disable');
                    
                    
                    document.getElementById('btnEditar').parentElement.classList.add('disable');
                    document.getElementById('btnEditar').classList.remove('disabled');                   
                }, 1500);
                
                document.querySelector('.input-mail').classList.remove('success');
                document.querySelector('.input-name').classList.remove('success');
                document.querySelector('.input-lastname').classList.remove('success');
                document.querySelector('.input-phone').classList.remove('success');                    
                document.querySelector('#flex-country .input-subject').classList.remove('success');
              
        
                ";
            }else{
                $updatePersonal = "UPDATE usuarios SET tokenId = '$newToken', nombre = '$inputName', apellido = '$inputLastname', correo='$inputEmail', telefono = '$inputPhone', pais = '$inputAdress' WHERE tokenId = '$token'";

                $resultUpdatePersonal = mysqli_query($connection, $updatePersonal);
                
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


                            
                if($resultUpdatePersonal){
                    echo   "
                                                
                    document.getElementById('btnEditar').style.background = '#2ecc71';
                    
                    document.getElementById('btnEditar').innerHTML = 'Actualizado'; 
                    setTimeout(() => {
                        document.getElementById('btnEditar').classList.remove('disabled');
                        document.getElementById('btnEditar').style.background = 'var(--celeste-oscuro)';
                
                        document.getElementById('btnEditar').innerHTML = 'Hecho';
                        document.getElementById('editInfo').innerText = '[Editar]';                    
                        
                        document.querySelector('.input-name').classList.add('disable');
                        document.querySelector('.input-mail').classList.add('disable');
                
                        document.querySelector('.input-lastname').classList.add('disable');
                        document.querySelector('.input-phone').classList.add('disable');
                        document.querySelector('#flex-country .input-country').classList.add('disable');
                    
                        document.getElementById('btnEditar').parentElement.classList.add('disable');
                    }, 1200);

                    document.querySelector('.input-mail').classList.remove('success');
                        document.querySelector('.input-name').classList.remove('success');
                        document.querySelector('.input-lastname').classList.remove('success');
                        document.querySelector('.input-phone').classList.remove('success');
                
            
                    ";
                }else{
                    echo "
                    
                    document.getElementById('btnEditar').style.background = '#e74c3c';
                    document.getElementById('btnEditar').style.pointerEvents = 'none';
                    document.getElementById('btnEditar').innerHTML = 'No se pudo Actualizar;'; 
                    setTimeout(() => {
                        document.getElementById('btnEditar').style.background = 'var(--celeste-oscuro)';
                        document.getElementById('btnEditar').innerHTML = 'Hecho';
                        document.getElementById('btnEditar').style.pointerEvents = 'auto';
                    }, 1200);
                    ";
                }

            }


    
        }

    }
}


echo'</script>';

mysqli_close($connection);

?>