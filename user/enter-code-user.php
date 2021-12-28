<?php

include('../php/db.php');
// include('send-email-password.php');

$validateAll = array(
    "entered" => 0,
    "changed" => 0,
);

$datosCode = array(        
    "code" => 0,  
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
function inputErrorCode($small, $message, $input){
    echo   "
    
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
            
    document.getElementById('btnCode').classList.remove('disabled');
    document.getElementById('btnCode').innerHTML = 'Enviar Código';
    document.getElementById('btnCode').classList.add('btn-error'); 
    setTimeout(() => {
        document.getElementById('btnCode').classList.remove('btn-error');
    }, 500);

    
";
}

if (isset($_POST["codeAjax"] )){

    
    session_start();
    $formCode = validate($_POST["code"]);
    
    $token = $_SESSION["user"];
   
    $sql = "SELECT * FROM usuarios WHERE tokenId = '$token'";
    
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    $formEmail = $row["correo"];
    
    $code = $row["codigo_pass"];
    
    

    if (empty($formCode)) {
        inputErrorCode($small = 'smallCode', $message = 'Por favor ingresa el código enviado', $input = '.input-code');
        $datosCode["code"] = 0;
        
    } else{
        if ($code == null || $code == 0 || $code != $formCode) {
            inputErrorCode($small = 'smallCode', $message = 'Este código ha expirado o no es válido', $input = '.input-code');
            $datosCode["code"] = 0;
        }
        
    }
    
    if($code != null && $code != 0 && $code == $formCode) {
        $datosCode["code"] = 1;
        
    }
    
    
    if($datosCode["code"] == 1){
        

        $validateAll["entered"] = 1;

        echo   "
            
            document.getElementById('step-email-two').classList.remove('active');
        
            document.getElementById('step-email-three').classList.add('active');    
            document.getElementById('btnCode').classList.remove('disabled');
            
            
        ";

        $updateCode = "UPDATE usuarios SET fecha_pass = ' ', codigo_pass = 0 WHERE correo = '$formEmail'";
        
        $result = mysqli_query($connection, $updateCode);

     
        
    }    

    
}



?>