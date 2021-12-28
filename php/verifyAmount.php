<?php


include ('db.php');

$datosQ = array(
    "monto" => 1,
);

$validateAll = array(
    "quantity" => 0,
    "personal" => 0,
    "credit" => 0,
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
function inputErrorQuantity($small, $message, $input){
    echo   "
       
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
    document.getElementById('validate-quantity').classList.add('btn-error'); 
    document.getElementById('validate-quantity').classList.remove('disabled');

    setTimeout(() => {
        document.getElementById('validate-quantity').classList.remove('btn-error');
    }, 500);            
    document.getElementById('validate-quantity').innerHTML = 'Siguiente';
 ";
}


if (isset($_POST["ajax-quantity"]))
{


    $amount = $_POST["amount"];
    $otherAmount = validate($_POST["personalized-amount"]);
    $otherAmountStr = str_replace(',','',$otherAmount); 
    $finalAmount = null;
    
    $currency = $_POST["currency"];

   
 
    if($amount == "other" && empty($otherAmountStr)){
        
        inputErrorQuantity($small = 'smallAmount', $message = 'Ingresa una cantidad a donar', $input = '.input-radio');

        $datosQ["monto"] = 0;
        
    }
    if($amount == "other" && $currency == "GTQ" && $otherAmountStr < 10){
        
        inputErrorQuantity($small = 'smallAmount', $message = 'Mínimo aceptado de Q10.00', $input = '.input-radio');

        $datosQ["monto"] = 0;
        
    }
    if($amount == "other" && $currency == "USD" && $otherAmountStr < 1){
        
        inputErrorQuantity($small = 'smallAmount', $message = 'Mínimo aceptado de $1.00', $input = '.input-radio');

        $datosQ["monto"] = 0;
        
    }
  
    if($amount == "other"){
        $finalAmount = $otherAmountStr;
    }else{
        $finalAmount = $amount;
    }

    if($amount == "other" && $currency == "GTQ" && $otherAmountStr > 10 || $amount == "other" && $currency == "USD" && $otherAmountStr > 1){
        $datosQ["monto"] == 1;
    }

    if($datosQ["monto"] == 1){
 
        echo "
        document.getElementById('validate-quantity').classList.remove('disabled');
        document.querySelector('.step-one').classList.remove('active');
        document.querySelector('.step-two').classList.add('active');


        document.getElementById('validate-quantity').innerHTML = 'Siguiente  ';
        ";
        $validateAll["quantity"] = 1;
            
    }

}



// echo '</script>';




?>