<?php


include ('db.php');


$datos = array(
    "email" => 0,
    "password" => 0,
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
            
    document.getElementById('loginSubmit').innerHTML = 'Iniciar Sesión';
    document.getElementById('loginSubmit').classList.remove('disabled');
    document.getElementById('loginSubmit').classList.add('btn-error'); 
    setTimeout(() => {
        document.getElementById('loginSubmit').classList.remove('btn-error');
    }, 500);
 ";
}
if (isset($_POST["loginAjax"]))
{

    session_start();

    $originUrl = $_SESSION["url"];


    
    $loginEmail = validate($_POST["loginEmail"]);
    $loginPassword = validate($_POST["loginPassword"]);


    $verificarUsuario = mysqli_query($connection, "SELECT * FROM usuarios WHERE correo='$loginEmail'");
    
    $verificarPass = $verificarUsuario->fetch_array();
    
    echo'<script> ';


    if(empty($loginEmail)){
        inputError($small = 'loginSmallEmail', $message = 'Por favor ingresa tu correo', $input = '.input-login-email');
        $datos["email"] = 0;
    }
    else {
        if (mysqli_num_rows($verificarUsuario) == 0) {

      
            inputError($small = 'loginSmallEmail', $message = 'Este correo no está registrado', $input = '.input-login-email');
            $datos["email"] = 0;
        }else{
            
            if(password_verify($loginPassword, $verificarPass["pass"])){
            
                $datos["password"] = 1;
            } else {
                inputError($small = 'loginSmallPassword', $message = 'La contraseña es incorrecta', $input = '.input-login-password');
        
            
            $datos["password"] = 0;
            }
        }

    }
    
    if(empty($loginPassword)){
        inputError($small = 'loginSmallPassword', $message = 'Por favor ingresa tu contraseña', $input = '.input-login-password');
        $datos["password"] = 0;
    } else{
        if(empty($loginEmail)){
            inputError($small = 'loginSmallPassword', $message = 'Ingresa tu correo para verificar la contraseña', $input = '.input-login-password');
            $datos["password"] = 0;
        }
        if (mysqli_num_rows($verificarUsuario) == 0){
            inputError($small = 'loginSmallPassword', $message = 'Ingresa un correo registrado para verificar la contraseña', $input = '.input-login-password');
            $datos["password"] = 0;
        }
    }
           
    
    }
    if(mysqli_num_rows($verificarUsuario) == 1){
        $datos["email"] = 1;
    }
   
   

if($datos["email"] == 1 && $datos["password"] == 1){
    

    $verificarUsuario = mysqli_query($connection, "SELECT * FROM usuarios WHERE correo='$loginEmail'");
    
    $verificar = $verificarUsuario->fetch_array();

    $privilegio = $verificar['privilegio'];

    $tokenId = $verificar['tokenId'];

    $registered = 1;


    $_SESSION['priv'] = $privilegio;

    $_SESSION['user'] = $tokenId;
    
    
    echo 'window.location="'.strval($originUrl).'"';
    

    unset($_SESSION["url"]);

    if(isset($_POST["remember"]) != ""){
        //Creamos nuestra cookie.
        setcookie("login",$tokenId, time() + 365 * 24 * 60 * 60,"/",false, false);
        
    
    }else { 
        setcookie("login","", 1, "/",false, false);
        
    }
    
}

echo'</script>';
mysqli_close($connection);


?>