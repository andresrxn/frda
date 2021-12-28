<?php


include ('db.php');
include ('verifyAmount.php');

$datosP = array(
    // "id" => 0,
    "name" => 0,
    "lastname" => 0,
    "email" => 0,
    "phone" => 0,
    "adress" => 0,
);

function inputErrorPersonal($small, $message, $input){
    echo   "
       
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
    document.getElementById('validate-personal').classList.add('btn-error'); 
    document.getElementById('validate-personal').classList.remove('disabled');
    setTimeout(() => {
        document.getElementById('validate-personal').classList.remove('btn-error');
    }, 500);            
    document.getElementById('validate-personal').innerHTML = 'Continuar';
 ";
}


if (isset($_POST["ajax-personal"]))
{
  

    $inputName = validate($_POST["name"]);
    $inputLastname = validate($_POST["lastname"]);
    $inputEmail = validate($_POST["email"]);
    // $inputId = validate($_POST["identification"]);
    if(isset($_POST["adress"])){
        $inputAdress = validate($_POST["adress"]);
    }
    

    // if (empty($inputId)) {

    //     inputErrorPersonal($small = 'smallId', $message = 'Ingresa tu no. de identificación', $input = '.input-id');
        
    //      $datosP["id"] = 0;

    // } else{
    //     if(!preg_match('/^[a-zA-Z0-9]*$/', $inputId)) {
            
    //         inputErrorPersonal($small = 'smallId', $message = 'No ingreses espacios o guiones', $input = '.input-id');

    //         $datosP["id"] = 0;
    
    //     } 
    //     if(strlen($inputId) < 10) {

    //         inputErrorPersonal($small = 'smallId', $message = 'El mínimo es de 10 dígitos', $input = '.input-id');
    //         $datosP["id"] = 0;
    
    //     }
    //     if(strlen($inputId) > 25) {

    //         inputErrorPersonal($small = 'smallId', $message = 'El máximo es de 25 dígitos', $input = '.input-id');
            
    //         $datosP["id"] = 0;
    //     }
    // }
    if (empty($inputName)) {

        inputErrorPersonal($small = 'smallName', $message = 'Ingresa tu nombre', $input = '.input-name');

         $datosP["name"] = 0;

    } else{
        if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputName)) {
            
            inputErrorPersonal($small = 'smallName', $message = 'Ingresa solo letras', $input = '.input-name');

            $datosP["name"] = 0;
    
        } 
        if(strlen($inputName) < 3) {
            
            inputErrorPersonal($small = 'smallName', $message = 'Mínimo de 3 letras', $input = '.input-name');

            $datosP["name"] = 0;
    
        }
        if(strlen($inputName) > 30) {
            
            inputErrorPersonal($small = 'smallName', $message = 'Máximo de 30 letras', $input = '.input-name');
            
            $datosP["name"] = 0;
        }
    }
    if (empty($inputLastname)) {
        
        inputErrorPersonal($small = 'smallLastname', $message = 'Ingresa tu apellido', $input = '.input-lastname');

         $datosP["lastname"] = 0;

    } else{
        if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputLastname)) {
            
            inputErrorPersonal($small = 'smallLastname', $message = 'Ingresa solo letras', $input = '.input-lastname');

            $datosP["lastname"] = 0;
    
        } 
        if(strlen($inputLastname) < 3) {
            
            inputErrorPersonal($small = 'smallLastname', $message = 'Mínimo de 3 letras', $input = '.input-lastname');

            $datosP["lastname"] = 0;
    
        }
        if(strlen($inputLastname) > 30) {
           
            inputErrorPersonal($small = 'smallLastname', $message = 'Máximo de 30 letras', $input = '.input-lastname');
            
            $datosP["lastname"] = 0;
        }
    }
  
    if (empty($inputEmail)) {
        inputErrorPersonal($small = 'smallEmail', $message = 'Por favor ingresa tu correo', $input = '.input-mail');

        $datosP["email"] = 0;

    } else{
        
        if(!filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
            inputErrorPersonal($small = 'smallEmail', $message = 'Por favor un correo válido', $input = '.input-mail');
            $datosP["email"] = 0;
        } 

    }

   
    if(empty($_POST["phone"])){
      
        inputErrorPersonal($small = 'smallPhone', $message = 'Por favor ingresa tu telefono', $input = '.input-phone');

        $datosP["phone"] = 0;
    }
    else{
        if(!preg_match('/^\d+(\.\d{1,9})?$/', $_POST["phone"])){

            inputErrorPersonal($small = 'smallPhone', $message = 'Por favor ingresa tu telefono', $input = '.input-phone');

            $datosP["phone"] = 0;

        }
        if(strlen($_POST["phone"]) < 8)
        {

            inputErrorPersonal($small = 'smallPhone', $message = 'El mínimo es de 8 digitos', $input = '.input-phone');

            $datosP["phone"] = 0;
        } 

        if(strlen($_POST["phone"]) > 15)
        {
            inputErrorPersonal($small = 'smallPhone', $message = 'El máximo es de 15 digitos', $input = '.input-phone');

            $datosP["phone"] = 0;
        } 




    }
   
    if(empty($inputAdress)){
        echo   "
       
       
        document.getElementById('validate-personal').classList.add('btn-error'); 
        setTimeout(() => {
            document.getElementById('validate-personal').classList.remove('btn-error');
        }, 500);
        document.getElementById('validate-personal').innerHTML = 'Continuar';

        document.getElementById('country').classList.add('termsError');
        setTimeout(() => {
            document.getElementById('country').classList.remove('termsError');
        }, 500);            
        
        ";
        $datosP["adress"] = 0;
    }
    
    // if(!empty($inputId) && strlen($inputId) >= 10 && strlen($inputId) <= 25 && preg_match('/^[a-zA-Z0-9]*$/', $inputId)) {
    //     $datosP["id"] = 1;
    
    // }
    

    if(!empty($inputName) && strlen($inputName) >= 3 && strlen($inputName) <= 30 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputName)) {
        $datosP["name"] = 1;
          
    }

    if(!empty($inputLastname) && strlen($inputLastname) >= 3 && strlen($inputLastname) <= 30 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $inputLastname)) {
        $datosP["lastname"] = 1;
        
    }

    if(!empty($_POST["phone"]) && strlen($_POST["phone"]) >= 8 && strlen($_POST["phone"]) < 15 && preg_match('/^\d+(\.\d{1,9})?$/', $_POST["phone"])) {
        $datosP["phone"] = 1;
        
    }
    if(!empty($inputEmail) && filter_var($inputEmail, FILTER_VALIDATE_EMAIL)) {
        $datosP["email"] = 1;
      
        
    }
    if(!empty($inputAdress)){
        $datosP["adress"] = 1;
    }
    

    if($datosP["name"] == 1 && $datosP["lastname"] == 1 && $datosP["email"] == 1 && $datosP["phone"] == 1 && $datosP["adress"] == 1){
 
        echo "
        document.getElementById('validate-personal').classList.remove('disabled');
        document.querySelector('.step-two').classList.remove('active');
        document.querySelector('.step-three').classList.add('active');


        document.getElementById('validate-personal').innerHTML = 'Continuar';
        ";
            
        $validateAll["personal"] = 1;
    }

}






?>