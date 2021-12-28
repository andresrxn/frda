<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

include ('db.php');
$datos = array(
    "nombre" => 0,
    "email" => 0,
    "phone" => 1,
    "msg"=> 0,
    "terms" => 0,
);
$enviar = array(
    "datos" => 0,
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
            
    document.getElementById('btnSubmit').innerHTML = 'Enviar Mensaje';
    document.getElementById('btnSubmit').classList.remove('disabled');
    document.getElementById('btnSubmit').classList.add('btn-error'); 
    setTimeout(() => {
        document.getElementById('btnSubmit').classList.remove('btn-error');
    }, 500);
   
    
 ";
}
if (isset($_POST["AJAX"]))
{
    $contactName = validate($_POST["name"]);
    $contactEmail = validate($_POST["email"]);
    $contactMsg = validate($_POST["msg"]);

  
   echo'<script> ';

    
   if (empty($contactName)) {
    inputError($small = 'smallName', $message = 'Por favor ingresa tu nombre', $input = '.input-name');
     $datos["nombre"] = 0;

    } else{
        if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $contactName)) {
            inputError($small = 'smallName', $message = 'Únicamente se admiten letras', $input = '.input-name');
            $datos["nombre"] = 0;

        } 
        if(strlen($contactName) < 6) {
            inputError($small = 'smallName', $message = 'Mínimo de 6 caracteres', $input = '.input-name');
            $datos["nombre"] = 0;

        }
        if(strlen($contactName) > 50) {
            inputError($small = 'smallName', $message = 'Máximo de 50 caracteres', $input = '.input-name');
            
            $datos["nombre"] = 0;
        }
    }
    if (empty($contactEmail)) {
        inputError($small = 'smallEmail', $message = 'Por favor ingresa tu correo', $input = '.input-mail');
        $datos["email"] = 0;

    } else{
        
        if(!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
            inputError($small = 'smallEmail', $message = 'Por favor ingresa un correo válido', $input = '.input-mail');
        
        $datos["email"] = 0;

        } 

    }


    if(empty($_POST["phone"])){
        $datos["phone"] = 1;
        echo   "
       
        document.getElementById('smallPhone').innerHTML='';
        document.querySelector('.input-phone').classList.remove('success');
        document.querySelector('.input-phone').classList.remove('error');
        document.getElementById('btnSubmit').innerHTML = 'Enviar Mensaje';
        ";
    }
    if (!empty($_POST["phone"])) {
        if(!preg_match('/^\d+(\.\d{1,9})?$/', $_POST["phone"])){
            inputError($small = 'smallPhone', $message = 'Únicamente se admiten números', $input = '.input-phone');
            $datos["phone"] = 0;

        }
        if(strlen($_POST["phone"]) < 8)
        {
            inputError($small = 'smallPhone', $message = 'Debe contener como mínimo 8 números', $input = '.input-phone');
            $datos["phone"] = 0;
        } 
        if(strlen($_POST["phone"]) > 15)
        {
            inputError($small = 'smallPhone', $message = 'Máximo de 15 números', $input = '.input-phone');
            $datos["phone"] = 0;
        } 




    }
      
    
   
    if (empty($contactMsg)) {
        inputError($small = 'smallMsg', $message = 'Por favor ingresa tu mensaje', $input = '.input-msg');
            $datos["msg"] = 0;

    } else{
         
        if(!preg_match('/[A-Za-z0-9_-]/', $contactMsg)) {
            inputError($small = 'smallMsg', $message = 'No se permiten caracteres especiales', $input = '.input-msg');

            $datos["msg"] = 0;
    
        } 
        if(strlen($contactMsg) < 10)
        {
            inputError($small = 'smallMsg', $message = 'Mínimo de 10 caracteres', $input = '.input-msg');
            $datos["msg"] = 0;
        } 
        if(strlen($contactMsg) > 500)
        {
            inputError($small = 'smallMsg', $message = 'Máximo de 500 caracteres', $input = '.input-msg');
            $datos["msg"] = 0;
        } 

    }

    if(isset($_POST["terms"]) == ""){
        echo   "
       
       
        document.getElementById('btnSubmit').classList.add('btn-error'); 
        setTimeout(() => {
            document.getElementById('btnSubmit').classList.remove('btn-error');
        }, 500);
        document.querySelector('.input-terms').classList.add('termsError');
        setTimeout(() => {
            document.querySelector('.input-terms').classList.remove('termsError');
        }, 500);
        document.getElementById('btnSubmit').innerHTML = 'Enviar Mensaje';
        ";
        $datos["terms"] = 0;
    }

   if(!empty($contactName) && strlen($contactName) >= 6 && strlen($contactName) <= 50 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $contactName)) {
        $datos["nombre"] = 1;
      
        
    }
    if(!empty($contactEmail) && filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
        $datos["email"] = 1;
      
    }
    if(!empty($_POST["phone"]) && strlen($_POST["phone"]) >= 8 && strlen($_POST["phone"]) <= 15 && preg_match('/^\d+(\.\d{1,9})?$/', $_POST["phone"])) {
        $datos["phone"] = 1;
      
        
    }
    if(!empty($contactMsg) && strlen($contactMsg) >= 10 && strlen($contactMsg) <= 500 && preg_match('/[A-Za-z0-9]/', $contactMsg)) {
        $datos["msg"] = 1;
      
        
    }
    if(isset($_POST["terms"]) != ""){
        
        $datos["terms"] = 1;
    }

   


if($datos["nombre"] == 1 && $datos["email"] == 1 && $datos["phone"] == 1 && $datos["msg"] == 1 && $datos["terms"] == 1){
   
    $enviar["datos"] = 1;
 
}

if($enviar["datos"] == 1){

    $mail = new PHPMailer(true);

    $name = validate($_POST['name']);

    $name = ucwords($_POST['name']);

    $email =  validate($_POST['email']);

    $phone =  validate($_POST['phone']);

    $subject =  validate($_POST['subject']);

    $msg = validate($_POST['msg']);

    $palabras = explode(" ", $name);

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


    $mes = array('en.', 'febr.', 'mzo.', 'abr.', 'my.', 'jun.', 'jul.', 'agt.', 'sept.', 'oct.', 'nov.', 'dic.');
    $date = date("j") . " de " . $mes[date("m")-1] . " " . date("Y") . " a las: " . date('g').":".date('i').date('a');
    

    $body = "<b>Mensaje:</b> <br><br>" . $msg  . "<br><br><br><br> <b>De parte de:</b><br>  " . $name .  "<br><br> <b>Correo Electrónico:</b><br>  " . $email . "<br><br> <b>Telefono:</b> <br> " . $phone . "<br><hr><br> <b>Enviado desde el Sitio Web de Redes de Ayuda.</b>";
    try {
    
        $mail->SMTPDebug = 0;

        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'carlosraxon019@gmail.com';                     // SMTP username
        $mail->SMTPSecure = 'tls';
        $mail->Password   = 'Carlitosandres1';                               // SMTP password
        $mail->SMTPSecure ='PHPMailer::ENCRYPTION_STARTTLS';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email, $name);
    
        $mail->addAddress('craxonc@miumg.edu.gt'); 
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->CharSet    = 'UTF-8';
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
        $mail->send();
    
        $p = "";

        if($subject == "Pregunta/Duda"){
            $p = "Gracias $palabras[0] por hacernos saber tus preguntas, un miembro de nuestro equipo se comunicará contigo con las respuestas correspondientes.";
        }
        if($subject == "Agendar Cita"){
            $p = "Tu cita ha sido agendada con éxito $palabras[0], esperamos reunirnos contigo muy pronto. ";
        }
        if($subject == "Solicitar Información"){
            $p = "Tu solicitud ha sido recibida $palabras[0], un miembro de nuestro equipo se estará comunicando contigo para hacerte saber lo que necesites.";
        }
        if($subject == "Comentario"){
            $p = "Agredecemos tus comentarios $palabras[0] y siempre serán tomados en cuenta, siéntete libre de comunicarnos siempre lo que piensas acerca de nuestra Fundación.";
        }
        if($subject == "Queja"){
            $p = "Gracias $palabras[0] por ayudarnos a mejorar nuestros servicios y por darnos tus comentarios al respecto, nuestro equipo se comunicará contigo para resolver cualquier problema.";
        }
        if($subject == "Donación en Especie"){
            $p = "Gracias $palabras[0] por querer ser parte de esta causa, nuestro equipo se estará comunicando contigo para haciéndote saber todo lo necesario para realizar tu donativo.";
        }
        if($subject == "Otro..."){
            $p = "Hemos recibido tu mensaje $palabras[0], nuestro equipo estará comunicándose contigo en la brevedad ayudándote con lo que necesites.";
        }

        echo   "
        
        document.getElementById('email-sent').classList.add('active');
        document.getElementById('cookie-shadow').classList.add('active');

        document.querySelector('.email-sent h3').innerHTML = '¡Hemos recibido tu Mensaje!';
        document.querySelector('.email-sent button').innerHTML = 'Aceptar';
        document.querySelector('.email-sent p').innerText = '$p';
        document.querySelector('.email-sent img').src = 'img/svg/success.svg';
        document.getElementById('btnSubmit').classList.remove('disabled');


        document.getElementById('btnSent').addEventListener('click', ()=>{
            document.getElementById('form').reset();
            document.getElementById('btnSubmit').innerHTML = 'Enviar Mensaje';
            
            document.querySelector('.input-name').classList.remove('success');
            document.querySelector('.input-mail').classList.remove('success');
            document.querySelector('.input-phone').classList.remove('success');
            document.querySelector('.input-msg').classList.remove('success');
        });
        
        </script>
        ";

        
        $sqlInsertar = "INSERT INTO contacto(nombre, correo, telefono, asunto, fecha, fecha_orden, mensaje) VALUES ('$name', '$email', '$phone', '$subject', '$date', NOW(), '$msg')";
        $result = mysqli_query($connection,$sqlInsertar);


    exit;
    } catch (Exception $e) {
        
        echo   "

        document.getElementById('btnSubmit').style.background = '#e74c3c';
        document.getElementById('btnSubmit').style.pointerEvents = 'none';
        document.getElementById('btnSubmit').innerHTML = 'No se pudo enviar'; 
        setTimeout(() => {
            document.getElementById('btnSubmit').style.background = 'linear-gradient(-45deg, var(--celeste-claro), var(--celeste-oscuro))';
            document.getElementById('btnSubmit').innerHTML = 'Enviar Mensaje';
            document.getElementById('btnSubmit').style.pointerEvents = 'auto';
        }, 3000);

        ";
    //  header('Location: php/no-enviado.php');
    //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


}
}
echo'</script>';         



    

?>