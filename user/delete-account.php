<?php


include ('../php/db.php');
session_start();


echo'<script> ';


if (isset($_POST["ajax-delete-account"])){
    

    $token = $_SESSION['user'];


    $selectAcc = "SELECT * FROM usuarios WHERE tokenId = '$token'";
    $resultAcc = $connection->query($selectAcc);
    $rowAcc = $resultAcc->fetch_assoc();

    

    if(isset($_SESSION["user"]) && isset($_SESSION["priv"])){
        
        $deleteUser = "DELETE FROM usuarios WHERE tokenId = '$token'";                
        $resultDeleteUser = mysqli_query($connection, $deleteUser);

        $selectNews = "SELECT * FROM noticias_favoritas WHERE tokenId = '$token'";                
        $resultTokenNews = $connection->query($selectNews);
        
        $selectProyects = "SELECT * FROM proyectos_guardados WHERE tokenId = '$token'";                
        $resultTokenProyects = $connection->query($selectProyects);

        $selectDonations = "SELECT * FROM donaciones WHERE tokenId = '$token'";                
        $resultTokenDonations = $connection->query($selectDonations);
      
        $selectSuscriptions = "SELECT * FROM suscripciones WHERE tokenId = '$token'";                
        $resultTokenSuscriptions = $connection->query($selectSuscriptions);


        while(mysqli_num_rows($resultTokenNews) > 0 ){
                            
            
            $deleteNews = "DELETE FROM noticias_favoritas WHERE tokenId = '$token'";                
            $resultDeleteNews = mysqli_query($connection, $deleteNews);
            break;
            
        }
        while(mysqli_num_rows($resultTokenProyects) > 0 ){
                            
            $deleteProyects = "DELETE FROM proyectos_guardados WHERE tokenId = '$token'";                
            $resultDeleteProyects = mysqli_query($connection, $deleteProyects);
            break;
            
        }
        while(mysqli_num_rows($resultTokenDonations) > 0 ){
                            
            $updateDonations = "UPDATE donaciones SET tokenId = 'Eliminado', estado_token = 'Eliminado' WHERE tokenId = '$token'";
            $resultUpdateDonations = $connection->query($updateDonations);
            break;
            
        }
        while(mysqli_num_rows($resultTokenSuscriptions) > 0 ){
                            
            $updateSuscriptions = "UPDATE suscripciones SET tokenId = 'Eliminado', estado_token = 'Eliminado' WHERE tokenId = '$token'";
            $resultUpdateSuscriptions = $connection->query($updateSuscriptions);
            break;
            
        }

        if(isset($_COOKIE["login"])){
            setcookie("login","", 1, "/",false, false);
        }


        if($resultDeleteUser){
            echo"
            document.getElementById('btnDeleteAccount').innerHTML = 'Tu cuenta se eliminó';
            setTimeout(() => {
                document.getElementById('btnDeleteAccount').innerHTML = 'Redirigiendo...';
                
            }, 1000);
            setTimeout(() => {
                window.location = './';
                
            }, 1400);
            ";
            session_destroy();
        }

        // if($resultAcc){
        //     echo   "
        
            
        //     document.querySelector('#btnDelete').style.background = '#2ecc71';
            
        //     document.querySelector('#form-pass button').innerHTML = 'Actualizado'; 
        //     setTimeout(() => {
        //         cancelPass();
        //     }, 1200);

            
            
    
        //     ";
        // }else{
        //     echo "
            
        //     document.querySelector('#form-pass button').style.background = '#e74c3c';
        //     document.querySelector('#form-pass button').style.pointerEvents = 'none';
        //     document.querySelector('#form-pass button').innerHTML = 'No se pudo Actualizar;'; 
        //     setTimeout(() => {
        //         document.querySelector('#form-pass button').style.background = 'var(--celeste-oscuro)';
        //         document.querySelector('#form-pass button').innerHTML = 'Cambiar';
        //         document.querySelector('#form-pass button').style.pointerEvents = 'auto';
        //     }, 1200);
        //     ";
        // }
    

        






    }
    

}

echo'</script>';

?>