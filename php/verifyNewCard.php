<?php

include ('db.php');


$datosC = array(
    "number" => 0,
    "namecard" => 0,
    "month" => 0,
    "year" => 0,
    "ccv" => 0,
    "terms" => 0,
);
$validateAll = 0;
function inputErrorCredit($small, $message, $input){
    echo   "
       
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
    document.getElementById('btn-new-card').classList.add('btn-error'); 
    document.getElementById('btn-new-card').classList.remove('disabled');
    setTimeout(() => {
        document.getElementById('btn-new-card').classList.remove('btn-error');
    }, 500);            
    document.getElementById('btn-new-card').innerHTML = 'Agregar';
 ";
}

function validate($campo){
    include('db.php');
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    $campo = mysqli_real_escape_string($connection, $campo);
    return $campo;
    mysqli_close($connection);
}

if (isset($_POST["ajax-credit"]))
{

    $numberCard = validate($_POST["numberCard"]);
    $numberCard = preg_replace("/[^0-9]/", "", $numberCard);

    $nameCard = validate($_POST["nameCard"]);

    if(isset($_POST["monthCard"])){
        $monthCard = validate($_POST["monthCard"]);
    }
    if(isset($_POST["yearCard"])){
        $yearCard = validate($_POST["yearCard"]);
    }

    $ccvCard = validate($_POST["ccvCard"]);
    

 
    function isValidCardNumber($number){
        settype($number, 'string');
        $number = preg_replace("/[^0-9]/", "", $number);
        $numberChecksum= '';
        $reversedNumberArray = str_split(strrev($number));
        foreach ($reversedNumberArray as $i => $d) {
            $numberChecksum.= (($i % 2) !== 0) ? (string)((int)$d * 2) : $d;
        }
        $sum = array_sum(str_split($numberChecksum));
                return ($sum % 10) === 0;
    };
    


    if (empty($numberCard)) {

        inputErrorCredit($small = 'smallNumberCard', $message = 'Ingresa el número de tu tarjeta', $input = '.input-number-card');
        
        $datosC["number"] = 0;

    } else{


        if (!isValidCardNumber($numberCard)) {

            inputErrorCredit($small = 'smallNumberCard', $message = 'La tarjeta no es válida', $input = '.input-number-card');
            
            $datosC["number"] = 0;

        }else{
            if(!preg_match('/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/', $numberCard)) {
                inputErrorCredit($small = 'smallNumberCard', $message = 'Únicamente aceptamos Visa o Mastercard', $input = '.input-number-card');
            
                $datosC["number"] = 0;
            }
        }
    }

    if (empty($nameCard)) {

        inputErrorCredit($small = 'smallNameCard', $message = 'Ingresa el nombre de la tarjeta', $input = '.input-name-card');

         $datosC["namecard"] = 0;

    } else{
        if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nameCard)) {
            
            inputErrorCredit($small = 'smallNameCard', $message = 'Ingresa solo letras', $input = '.input-name-card');

            $datosC["namecard"] = 0;
    
        } 
        if(strlen($nameCard) < 6) {
            
            inputErrorCredit($small = 'smallNameCard', $message = 'Mínimo de 6 caracteres', $input = '.input-name-card');

            $datosC["namecard"] = 0;
    
        }
        if(strlen($nameCard) > 20) {
            
            inputErrorCredit($small = 'smallNameCard', $message = 'Máximo de 20 caracteres', $input = '.input-name-card');
            
            $datosC["namecard"] = 0;
        }
    }
    if(empty($monthCard)){
        echo   "
       
       
        document.getElementById('btn-new-card').classList.add('btn-error'); 
        setTimeout(() => {
            document.getElementById('btn-new-card').classList.remove('btn-error');
        }, 500);
        document.getElementById('btn-new-card').innerHTML = 'Continuar';

        document.getElementById('selectMonth').classList.add('termsError');
        setTimeout(() => {
            document.getElementById('selectMonth').classList.remove('termsError');
        }, 500);            
        
        ";
        $datosC["month"] = 0;
    }
    if(empty($yearCard)){
        echo   "
       
       
        document.getElementById('btn-new-card').classList.add('btn-error'); 
        setTimeout(() => {
            document.getElementById('btn-new-card').classList.remove('btn-error');
        }, 500);
        document.getElementById('btn-new-card').innerHTML = 'Continuar';

        document.getElementById('selectYear').classList.add('termsError');
        setTimeout(() => {
            document.getElementById('selectYear').classList.remove('termsError');
        }, 500);            
        
        ";
        $datosC["year"] = 0;
    }
    if (empty($ccvCard)) {

        inputErrorCredit($small = 'smallCcvCard', $message = 'Ingresa tu código', $input = '.input-ccv-card');

         $datosC["ccv"] = 0;

    }else{
        if(strlen($ccvCard) < 3){

            inputErrorCredit($small = 'smallCcvCard', $message = 'Mínimo 3 dígitos', $input = '.input-ccv-card');

            $datosC["ccv"] = 0;

        }
        if(strlen($ccvCard) > 4){

            inputErrorCredit($small = 'smallCcvCard', $message = 'Máximo 4 dígitos', $input = '.input-ccv-card');

            $datosC["ccv"] = 0;

        }
        if (!preg_match('/^\d+(\.\d{1,9})?$/', $ccvCard)) {

            inputErrorCredit($small = 'smallCcvCard', $message = 'No se admiten letras', $input = '.input-ccv-card');

            $datosC["ccv"] = 0;

        }
    }


    if(!empty($numberCard) && isValidCardNumber($numberCard) && preg_match('/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/', $numberCard)){
        
        $datosC["number"] = 1;

    }

    if(!empty($nameCard) && strlen($nameCard) >= 6 && strlen($nameCard) <= 20 && preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i', $nameCard)){
    
        $datosC["namecard"] = 1;

    }

    if(!empty($monthCard)){
        $datosC["month"] = 1;
    }
    if(!empty($yearCard)){
        $datosC["year"] = 1;
    }

    if(!empty($ccvCard) && strlen($ccvCard) >= 3 && strlen($ccvCard) <= 4 && preg_match('/^\d+(\.\d{1,9})?$/', $ccvCard)){
        $datosC["ccv"] = 1;
    }
   

    if($datosC["namecard"] == 1 && $datosC["number"] == 1 && $datosC["month"] == 1 && $datosC["year"] == 1 && $datosC["ccv"] == 1){
        $validateAll = 1;
        $brandCard = $numberCard[0];
    }

    if($validateAll == 1){
        echo "
        

       hola
        
        ";
    }
   
}




?>
