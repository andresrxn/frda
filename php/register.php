<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


include ('db.php');

$datos = array(
    "nombre" => 0,
    "apellido" => 0,
    "email" => 0,
    "password" => 0,
    "adress" => 0,
    "terms" => 0,
);

function validate($campo){
    include('db.php');
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    $campo = mysqli_real_escape_string($connection, $campo);
    return $campo;
    mysqli_close($connection);
}
function inputError($small, $message, $input){
    echo   "
       
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
            
    document.getElementById('registerSubmit').innerHTML = 'Registrarme';
    document.getElementById('registerSubmit').classList.add('btn-error'); 
    document.getElementById('registerSubmit').classList.remove('disabled');
    setTimeout(() => {
        document.getElementById('registerSubmit').classList.remove('btn-error');
    }, 500);
 ";
}

if (isset($_POST["ajax"]))
{
    $registerName = validate($_POST["registerName"]);
    $registerLastname = validate($_POST["registerLastname"]);
    $registerEmail = validate($_POST["registerEmail"]);
    $registerPassword = validate($_POST["registerPassword"]);
    if(isset($_POST["adress"])){

        $inputAdress = validate($_POST["adress"]);
    }
    
    $verificarCorreo = mysqli_query($connection, "SELECT * FROM usuarios WHERE correo='$registerEmail'");
    
  
   echo'<script> ';

   if (empty($registerName)) {
    inputError($small = 'smallName', $message = 'Ingresa tu nombre', $input = '.input-register-name');
     $datos["nombre"] = 0;

    } else{
        if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $registerName)) {
            inputError($small = 'smallName', $message = 'Ingresa solo letras', $input = '.input-register-name');
            $datos["nombre"] = 0;

        } 
        if(strlen($registerName) < 3) {
            inputError($small = 'smallName', $message = 'Mínimo de 3 caracteres', $input = '.input-register-name');
            $datos["nombre"] = 0;

        }
        if(strlen($registerName) > 30) {
            inputError($small = 'smallName', $message = 'Máximo de 30 caracteres', $input = '.input-register-name');
            
            $datos["nombre"] = 0;
        }
    }
    if (empty($registerLastname)) {
        inputError($small = 'smallLastname', $message = 'Ingresa tu apellido', $input = '.input-register-lastname');
         $datos["nombre"] = 0;
    
        } else{
            if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $registerLastname)) {
                inputError($small = 'smallLastname', $message = 'Ingresa solo letras', $input = '.input-register-lastname');
                $datos["nombre"] = 0;
    
            } 
            if(strlen($registerLastname) < 3) {
                inputError($small = 'smallLastname', $message = 'Mínimo de 3 caracteres', $input = '.input-register-lastname');
                $datos["nombre"] = 0;
    
            }
            if(strlen($registerLastname) > 30) {
                inputError($small = 'smallLastname', $message = 'Máximo de 30 caracteres', $input = '.input-register-lastname');
                
                $datos["nombre"] = 0;
            }
        }

    if (empty($registerEmail)) {
        inputError($small = 'smallEmail', $message = 'Necesitamos tu correo, con este iniciaras sesión', $input = '.input-register-mail');
        $datos["email"] = 0;

    } else{
        if (mysqli_num_rows($verificarCorreo) > 0) {
            inputError($small = 'smallEmail', $message = 'El correo ya está registrado, intenta iniciando sesión', $input = '.input-register-mail');
        }
        if(!filter_var($registerEmail, FILTER_VALIDATE_EMAIL)) {
            inputError($small = 'smallEmail', $message = 'Por favor ingresa un correo válido', $input = '.input-register-mail');
        
            $datos["email"] = 0;

        } 

    }

    
    if (empty($registerPassword)) {
        inputError($small = 'smallPassword', $message = 'Por favor ingresa una contraseña', $input = '.input-register-password');
        $datos["password"] = 0;

    }
    else {
        if(!preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $registerPassword)){
            inputError($small = 'smallPassword', $message = 'Debe contener al menos un número y una mayúscula', $input = '.input-register-password');
            $datos["password"] = 0;

        }
        if(strlen($registerPassword) < 8)
        {
            inputError($small = 'smallPassword', $message = 'Debe contener al menos 8 caracteres', $input = '.input-register-password');
            $datos["password"] = 0;
        } 


    }

    if(empty($inputAdress)){
        echo   "
       
       
        document.getElementById('registerSubmit').innerHTML = 'Registrarme';
    document.getElementById('registerSubmit').classList.add('btn-error'); 
    document.getElementById('registerSubmit').classList.remove('disabled');
    setTimeout(() => {
        document.getElementById('registerSubmit').classList.remove('btn-error');
    }, 500);

        document.getElementById('country').classList.add('termsError');
        setTimeout(() => {
            document.getElementById('country').classList.remove('termsError');
        }, 500);            
        
        ";
        $datos["adress"] = 0;
    }
    
    if(isset($_POST["terms"]) == ""){
        echo   "
       
       
        document.getElementById('registerSubmit').innerHTML = 'Registrarme';
        document.getElementById('registerSubmit').classList.add('btn-error'); 
        document.getElementById('registerSubmit').classList.remove('disabled');
        setTimeout(() => {
            document.getElementById('registerSubmit').classList.remove('btn-error');
        }, 500);
        document.querySelector('.terms-register').classList.add('termsError');
        setTimeout(() => {
            document.querySelector('.terms-register').classList.remove('termsError');
        }, 500);  
  ";
        $datos["terms"] = 0;
    }
   if(!empty($registerName) && strlen($registerName) >= 3 && strlen($registerName) <= 30 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $registerName)) {
        $datos["nombre"] = 1;
      
        
    }
    if(!empty($registerLastname) && strlen($registerLastname) >= 3 && strlen($registerLastname) <= 30 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $registerLastname)) {
        $datos["apellido"] = 1;
      
        
    }
    if(!empty($registerEmail) && filter_var($registerEmail, FILTER_VALIDATE_EMAIL) && mysqli_num_rows($verificarCorreo) == 0) {
        $datos["email"] = 1;
      
        
    }
    if(!empty($registerPassword) && strlen($registerPassword) >= 8 && preg_match('/^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i', $registerPassword)) {
        $datos["password"] = 1;
      
        
    }
    if(!empty($inputAdress)){
        $datos["adress"] = 1;
    }
    if(isset($_POST["terms"]) != ""){
        
        $datos["terms"] = 1;
    }
    
    
    

if($datos["nombre"] == 1 && $datos["apellido"] == 1 && $datos["email"] == 1 && $datos["password"] == 1 && $datos["adress"] == 1 && $datos["terms"] == 1){

 
    setlocale(LC_ALL,"es_ES");
    date_default_timezone_set('America/Guatemala');
       // setlocale(LC_ALL, NULL);

    // $ip = '74.125.224.72';
    // $informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);

    // $dataSolicitud = json_decode($informacionSolicitud, true);

    // $timeZone = $dataSolicitud["geoplugin_timezone"];
    // date_default_timezone_set($timeZone);
    
        
    // echo '
    // <script>
    // document.addEventListener("DOMContentLoaded", ()=>{
    // document.querySelector("#country #'.$countryCode .'").setAttribute("selected", true);
    // });
    // </script>
    // ';

    $month = array('en.', 'febr.', 'mzo.', 'abr.', 'my.', 'jun.', 'jul.', 'agt.', 'sept.', 'oct.', 'nov.', 'dic.');

    $day = date('j');
    $month = $month[date("m")-1];
    $year = date('Y');
    $hour = date('g').":".date('i').date('a');
        

    $registerPassword = password_hash($registerPassword, PASSWORD_DEFAULT);
    
    $registerName = ucwords($registerName);
    $registerLastname = ucwords($registerLastname);
    $user = $registerEmail."+".$registerPassword;
    
    $tokenId = hash('sha512', $user);
    $privilegio = 3;

    
    $queryInsertar = "INSERT INTO usuarios(tokenId, nombre, apellido, privilegio, correo, pais, pass, dia, mes, año, hora, fecha_orden) VALUES('$tokenId', '$registerName', '$registerLastname','$privilegio', '$registerEmail', '$inputAdress', '$registerPassword', '$day', '$month', '$year', '$hour', NOW())";

    $result = mysqli_query($connection, $queryInsertar);

    if($result){

        session_start();
     
        $_SESSION['priv'] = $privilegio;
        $_SESSION['user'] = $tokenId;

        $mail = new PHPMailer(true);

        $name = validate($_POST['registerName']);
        $name = validate($_POST['registerLastname']);

        $name = ucwords($_POST['registerName']);

        $email =  validate($_POST['registerEmail']);

        $email = strval($email);

        $palabras = explode (" ", $name);

        $bodyUser = "¡Bienvenido " . $palabras[0] . "! <br><br> es un placer que quieras ser parte de nosotros.
        <br><br>
        Puedes guardar tu información y hacer tus donaciones de una forma más fácil; mantente al tanto visitando nuestro sitio web o nuestras redes sociales: <a href=''>Facebook,</a> <a href=''>Instagram</a> o nuestro <a href=''>Canal de Noticias en Telegram.</a>  
        <br>
        <hr>
        - Fundación Redes de Ayuda.
    
        ";
        try {
        
            //Server settings
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'carlosraxon019@gmail.com';                     // SMTP username
                $mail->SMTPSecure = 'tls';
                $mail->Password   = 'Carlitosandres1';                               // SMTP password
                $mail->SMTPSecure ='PHPMailer::ENCRYPTION_STARTTLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
                //Recipients
                $mail->setFrom('contacto@fundacionredesdeayuda.org' , 'Fundación Redes de Ayuda');
            
                $mail->addAddress($email); 
            
        
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "¡Usuario Registrado con Éxito!";
                $mail->Body    = $bodyUser;
                $mail->CharSet    = 'UTF-8';
                $mail->SMTPOptions = [
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ]
                ];
                $mail->send();
                echo "       
        
                window.location = 'cuenta.php';
                ";
        
        
        
        
            } catch (Exception $e) {
                echo   "";
        
            //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        

        }
      
    }
    mysqli_close($connection);
    
   
    

}
echo '</script>';         



?> 