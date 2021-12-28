<?php

include('../php/db.php');
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../php/Exception.php';
require '../php/PHPMailer.php';
require '../php/SMTP.php';

echo'<script> ';

if (isset($_POST["ajaxForgotPass"])){
    session_start();
    
    $token = $_SESSION["user"];
   
    $sql = "SELECT * FROM usuarios WHERE tokenId = '$token'";
    
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $formEmail = $row["correo"];


    $mail = new PHPMailer(true);

    $subject = "Código para Restablecer tu Contraseña";

    $month = array('en.', 'febr.', 'mzo.', 'abr.', 'my.', 'jun.', 'jul.', 'agt.', 'sept.', 'oct.', 'nov.', 'dic.');

    $day = date('j');
    $month = $month[date("m")-1];
    $year = date('Y');
    $hour = date('g').":".date('i').date('a');
    
    $values = array();
    $max = 6;
    for($x=0; $x < $max; $x++){
        $random = rand(0,9);
        array_push($values, $random);
    }
    $code = implode($values);


    $name = $row["nombre"];
    $firstName = explode(" ", $name);
    

    $body = "Hola $firstName[0], para restablecer tu contraseña ingresa el siguiente código en el formulario:<br><br>
    <b style='font-size:1.6em;color:#1113f8'>$code</b>
    <br>
    (Este código expira en 1 hora)<br><br>
    Si tú no solicitaste este código, por favor omite este mensaje.
    <hr>
    - Fundación Redes de Ayuda
    ";
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
        $mail->setFrom('fundacionredesdeayua@soporte.com', 'Fundacion Redes de Ayuda');
    
        $mail->addAddress($formEmail); 
    
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

        // $eventName = 'CREATE EVENT update_code ON SCHEDULE EVERY 10 SECOND DO UPDATE usuarios SET codigo_pass = 0, fecha_pass = 0;
        // SET GLOBAL event_scheduler = ON;';

        $updateCode = "UPDATE usuarios SET fecha_pass = NOW(), codigo_pass = '$code' WHERE correo = '$formEmail'";
    
        $result = mysqli_query($connection, $updateCode);
    

        
        if($mail->send() && $result){
            echo   "
        
            document.getElementById('step-email-two').classList.add('active');    
            document.getElementById('shadow-content').classList.add('active');
            document.getElementById('enter-email').classList.add('active');
            document.getElementById('close-donation').classList.add('active');
            document.getElementById('btnSendCode').innerHTML = 'Enviar Código';
            document.getElementById('btnSendCode').classList.remove('disabled');
            </script>
            ";
        }

        


    exit;
    } catch (Exception $e) {
        
        echo   "

        document.getElementById('btnSendCode').style.background = '#e74c3c';
        document.getElementById('btnSendCode').style.pointerEvents = 'none';
        document.getElementById('btnSendCode').innerHTML = 'No se pudo enviar'; 
        setTimeout(() => {
            document.getElementById('btnSendCode').style.background = 'var(--celeste-oscuro)';
            document.getElementById('btnSendCode').innerHTML = 'Enviar Código';
            document.getElementById('btnSendCode').style.pointerEvents = 'auto';
        }, 3000);

        ";
    // //  header('Location: php/no-enviado.php');
    // //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

       

}

echo'</script> ';

?>