<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

include('db.php');

$datosC = array(
    "company" => 0,
    "website" => 1,
    "email" => 0,
    "help" => 1,
    "terms" => 0,
);

// $validateAll = array(
//     "company" => 0,
//     "legal" => 0,
//     "sponsor" => 0,
// );

function validate($campo){
    include('db.php');
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    $campo = mysqli_real_escape_string($connection, $campo);
    return $campo;
    mysqli_close($connection);
}

function inputErrorQuantity($small, $message, $input){
    echo   "
       
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
    document.getElementById('sponsors-validate').classList.remove('disabled');
    setTimeout(() => {
        document.getElementById('sponsors-validate').classList.remove('btn-error');
    }, 500);            
    document.getElementById('sponsors-validate').innerHTML = 'Enviar Solicitud';
 ";
}


if (isset($_POST["ajax-sponsors"]))
{

    $company = validate($_POST["company"]);
    // $category = validate($_POST["category"]);
    $website = validate($_POST["website"]);
    $inputEmail = validate($_POST["repEmail"]);
    // $adress = validate($_POST["adress"]);
    $help = validate($_POST["help"]);
    $otherHelp = validate($_POST["other-help"]);


    $regex = "((https?|ftp)\:\/\/)?"; // SCHEME
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP
    $regex .= "(\:[0-9]{2,5})?"; // Port
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor

    $finalHelp = null;
    

    if(empty($company)){        
        inputErrorQuantity($small = 'smallCompany', $message = 'Por favor ingresa la Razón Social', $input = '.input-company');
        $datosC["company"] = 0;

    }else{
        if(strlen($company) < 6){
            inputErrorQuantity($small = 'smallCompany', $message = 'Ingresa un mínimo de 6 caracteres.', $input = '.input-company');
            $datosC["company"] = 0;
        }
        if(strlen($company) > 50){
            inputErrorQuantity($small = 'smallCompany', $message = 'Se permite un máximo de 50 caracteres', $input = '.input-company');
            $datosC["company"] = 0;
        }
        if(!preg_match('/^[A-Za-z0-9\s]+$/', $company)){
            inputErrorQuantity($small = 'smallCompany', $message = 'Ingresa únicamente números o letras', $input = '.input-company');
            $datosC["company"] = 0;
        }
    }
    // echo $company;

    // if(empty($category)){        
    //     inputErrorQuantity($small = 'smallCategory', $message = 'Ingresa la categoría de la empresa', $input = '.input-category');
    //     $datosC["category"] = 0;

    // }else{
    //     if(strlen($category) < 6){
    //         inputErrorQuantity($small = 'smallCategory', $message = 'Ingresa un mínimo de 6 caracteres.', $input = '.input-category');
    //         $datosC["category"] = 0;
    //     }
    //     if(strlen($category) > 50){
    //         inputErrorQuantity($small = 'smallCategory', $message = 'Se permite un máximo de 50 caracteres', $input = '.input-category');
    //         $datosC["category"] = 0;
    //     }
    //     if(!preg_match('/[A-Za-z]/', $category)){
    //         inputErrorQuantity($small = 'smallCategory', $message = 'Ingresa únicamente letras', $input = '.input-category');
    //         $datosC["category"] = 0;
    //     }
    // }
    if(empty($website)){        
        $datosC["website"] = 1;
        echo   "
       
        document.getElementById('smallWebsite').innerHTML='';
        document.querySelector('.input-website').classList.remove('success');
        document.querySelector('.input-website').classList.remove('error');
        document.getElementById('sponsors-validate').innerHTML = 'Enviar Solicitud';
        ";

    }else{
        
        if(!preg_match("/^$regex$/", $website)){
            inputErrorQuantity($small = 'smallWebsite', $message = 'La url ingresada no es válida', $input = '.input-website');
            $datosC["website"] = 0;
        }
    }

    if (empty($inputEmail)) {
        inputErrorQuantity($small = 'smallRepEmail', $message = 'Por favor ingresa tu correo', $input = '.input-rep-email');

        $datosC["email"] = 0;

    } else{
        
        if(!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
            inputErrorQuantity($small = 'smallRepEmail', $message = 'Por favor un correo válido', $input = '.input-rep-email');
            $datosC["email"] = 0;
        } 

    }

    // if(empty($adress)){        
    //     inputErrorQuantity($small = 'smallAdress', $message = 'Proporciona la dirección de la empresa', $input = '.input-adress');
    //     $datosC["adress"] = 0;

    // }else{
    //     if(strlen($adress) < 10){
    //         inputErrorQuantity($small = 'smallAdress', $message = 'Ingresa un mínimo de 10 caracteres.', $input = '.input-adress');
    //         $datosC["adress"] = 0;
    //     }
    //     if(strlen($adress) > 50){
    //         inputErrorQuantity($small = 'smallAdress', $message = 'Se permite un máximo de 50 caracteres', $input = '.input-adress');
    //         $datosC["adress"] = 0;
    //     }
    //     if(!preg_match('/^[#.0-9a-zA-Z\s,-]*$/', $adress)){
    //         inputErrorQuantity($small = 'smallAdress', $message = 'Solo se aceptan letras, números, puntos y guiones', $input = '.input-adress');
    //         $datosC["adress"] = 0;
    //     }
    // }
    if($help == "Otro" && empty($otherHelp)){
        
        inputErrorQuantity($small = 'smallHelp', $message = 'Ingresa un tipo de ayuda o selecciona otra opción', $input = '.subject-kind');

        $datosC["help"] = 0;
        
    }
  
    if($help == "Otro"){
        $finalHelp = $otherHelp;
    }else{
        $finalHelp = $help;
    }


    if(!empty($company) && strlen($company) >= 6 && strlen($company) <= 50 && preg_match('/^[A-Za-z0-9\s]+$/', $company)){
        $datosC["company"] = 1;
    }

    // if(!empty($category) && strlen($category) >= 6 && strlen($category) <= 50 && preg_match('/[A-Za-z]/', $category)){
    //     $datosC["category"] = 1;
    // }

    if(!empty($website) && preg_match("/^$regex$/", $website)){
        $datosC["website"] = 1;
    }
  
    if(!empty($inputEmail) && filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
        $datosC["email"] = 1;   
    }
    // if(!empty($adress) && strlen($adress) >= 6 && strlen($adress) <= 50 && preg_match('/^[#.0-9a-zA-Z\s,-]*$/', $adress)){
    //     $datosC["adress"] = 1;
    // }
    if($help == "Otro" && !empty($otherHelp) || $help != "Otro"){
        $datosC["help"] = 1;
    }
    if(isset($_POST["terms"]) == ""){
        echo   "
       
       
        document.getElementById('sponsors-validate').classList.add('btn-error'); 
        setTimeout(() => {
            document.getElementById('sponsors-validate').classList.remove('btn-error');
        }, 500);
        document.querySelector('.input-terms').classList.add('termsError');
        setTimeout(() => {
            document.querySelector('.input-terms').classList.remove('termsError');
        }, 500);
        document.getElementById('sponsors-validate').innerHTML = 'Enviar Solicitud';
        ";
        $datosC["terms"] = 0;
    }

    
    if(isset($_POST["terms"]) != ""){
        
        $datosC["terms"] = 1;
    }

    

    if($datosC["company"] == 1 && $datosC["website"] == 1 && $datosC["email"] == 1 && $datosC["help"] == 1 && $datosC["terms"] == 1){
        echo "
        document.getElementById('sponsors-validate').setAttribute('disabled', true);";
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
        // echo "

        // document.getElementById('sponsors-validate').innerHTML = 'Enviar Solicitud';
      
        // ";

        $state = "pendiente";

        $queryInsertar = "INSERT INTO patrocinadores(razon_social, sitio_web, tipo_de_ayuda, correo_rep, estado, fecha, fecha_orden) VALUES('$company', '$website', '$finalHelp', '$inputEmail', '$state', '$date', NOW())";

        $result = mysqli_query($connection, $queryInsertar);

        $helpMsg = "";
        if($finalHelp == "Monetaria"){
            $helpMsg ="";
        }

        if($finalHelp == "Monetaria"){
            $helpMsg ="¿Cuánto deseas aportar mensualmente? El mínimo para considerarte como Patrocinador Oficial es de GTQ1,000 o US$150";
        }
        if($finalHelp == "En Especie"){
            $helpMsg = "¿Qué producto deseas aportar constantemente que nos ayudará a seguir cumpliendo nuestra misión? Todo será bienvenido pero nos reservamos el derecho a no aceptar ciertos productos que sean considerados de alto riesgo o que sean ofensivos.";
        }
        if($finalHelp == "Publicitándonos"){
            $helpMsg = "¿En qué manera y por qué medios deseas publicitar nuestra fundación y atraer posibles donantes?";
        }
        if($finalHelp == "Prestando Servicios"){
            $helpMsg = "¿Qué servicio desear proporcionarnos para seguir cumpliendo nuestra misión? Todo será bienvenido pero nos reservamos el derecho a no aceptar ciertos servicios que sean considerados de alto riesgo o que sean ofensivos.";
        }
        if($finalHelp == "Otro"){
            $helpMsg = "¿Cómo deseas apoyar constantemente a nuestra fundación?";
        }

        if($result){

        $mail = new PHPMailer(true);

        $email = strval($inputEmail);

        $bodyUser = "Te encuentras a un paso de ser patrocinador de Fundación Redes de Ayuda, necesitamos los siguientes datos para proceder a verificarte:
        
        <br><br>
        - Giro de negocio
        <br>
        - Dirección de las Oficinas Centrales
        <br>
        - No. de Identificación del Representante (NIT, DPI, INE, Pasaporte, etc.) Debe especificarse.
        <br>
        - Nombre y Apellido del Representante
        <br>
        - Teléfono del Representante (De preferencia el de uso empresarial)
        <br>
        - $helpMsg
        <br>
        
        <br>
        Después del primer mes que apoyes a nuestra fundación podrás aparecer en nuestra <a href='https://www.fundacionredesdeayuda.org/patrocinadores'>lista de patrocinadores oficiales</a>, mientras más aportes, ¡Mayor será tu posición!<br><br>
         Nuestro contacto directo será con el representante legal, si necesitas ayuda o tienes alguna duda responde a este misma dirección de correo.
        <br>
        <br>
        Cuando estén aprobados tus datos crearemos un usuario y podrás acceder a una cuenta dedicada de patrocinadores, ¡Te esperamos con gusto!
        <br>
        <hr>
        <br>
        - Fundación Redes de Ayuda
    
        ";
        try {
        
            
            $mail->SMTPDebug = 0; 
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                
            $mail->Username   = 'carlosraxon019@gmail.com';              
            $mail->SMTPSecure = 'tls';
            $mail->Password   = 'Carlitosandres1';                           
            $mail->SMTPSecure ='PHPMailer::ENCRYPTION_STARTTLS';        
            $mail->Port       = 587;            
    
            
            $mail->setFrom('contacto@fundacionredesdeayuda.org' , 'Fundación Redes de Ayuda');
        
            $mail->addAddress($email); 
        
    
            
            $mail->isHTML(true);                          
            $mail->Subject = "Solicitud de Patrocinio Recibida";
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

            document.getElementById('sponsors-validate').classList.remove('disabled');
            document.getElementById('email-sent').classList.add('active');
            document.getElementById('cookie-shadow').classList.add('active');

            document.querySelector('.email-sent h3').innerHTML = '¡Enviado con Éxito!';
            document.querySelector('.email-sent button').innerHTML = 'Aceptar';
            document.querySelector('.email-sent p').innerText = 'Hemos enviado al correo del representante la información necesaria para continuar con el proceso del patrocinio; nos mantendremos en contacto  ¡Gracias por querer formar parte de nosotros!';
            document.querySelector('.email-sent img').src = 'img/svg/success.svg';
           
            ";
        
            } catch (Exception $e) {
                echo   "document.getElementById('email-sent').classList.add('active');
                document.getElementById('cookie-shadow').classList.add('active');
    
                document.querySelector('.email-sent h3').innerHTML = 'No se Pudo Enviar';
                document.querySelector('.email-sent button').innerHTML = 'Aceptar';
                document.querySelector('.email-sent p').innerText = 'Hubo un error al enviar el correo, inténtalo más tarde o contáctate con nosotros por otro medio.';
                document.querySelector('.email-sent img').src = 'img/svg/fail.svg';";
        
            //  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        

        }
      
    
    mysqli_close($connection);
            
    }

}



?>
