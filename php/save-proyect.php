<?php


include ('db.php');
session_start();


function validate($campo){
    include('db.php');
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    $campo = mysqli_real_escape_string($connection, $campo);
    return $campo;
    mysqli_close($connection);
}




// if (is_array($_POST['save-proyect'])) {
    
    //     foreach ($_POST['save-proyects'] as $key => $saveProyect) {
if(isset($_POST["ajax-proyect"])){
    echo'<script> ';
    

    if(isset($_SESSION["user"])){
        $tokenId = $_SESSION["user"];
    
    
        
        $saveProyect = validate($_POST["ajax-proyect"]);
        

        $selectProyects = "SELECT * FROM proyectos WHERE id = '$saveProyect'";
        $result = $connection->query($selectProyects);
        $row = $result->fetch_assoc();

        $idProyect = $row["id"];
        $title = $row["titulo"];
        $link = $row["link"];
        $description = $row["descripcion"];
        $img = $row["imagen"];
        $currency = $row["moneda"];
        $initial = $row["cantidad_inicial"];
        $final = $row["cantidad_final"];
        $state = $row["estado"];
        $date = $row["fecha"];

        $verify = mysqli_query($connection, "SELECT id_proyecto, tokenId FROM proyectos_guardados WHERE id_proyecto = '$idProyect' AND tokenId = '$tokenId'");

        if(mysqli_num_rows($verify) == 0) {

            if($saveProyect == $idProyect){
                
                
    
                $insertProyect = "INSERT INTO proyectos_guardados(id_proyecto, tokenId, imagen, titulo, link, descripcion, moneda, cantidad_inicial, cantidad_final, estado, fecha, fecha_orden) VALUES ('$idProyect', '$tokenId', '$img', '$title', '$link', '$description', '$currency', '$initial', '$final', '$state', '$date', NOW())";
                $result = mysqli_query($connection, $insertProyect);
            
                if($result){

                    
                    echo '
                    document.querySelector("#save-proyect-'.$saveProyect.'").classList.add("saved");
                    
                    ';
                }
            }
        }else{
            if($saveProyect == $idProyect){
                
                $deleteProyect = "DELETE FROM proyectos_guardados WHERE id_proyecto = '$saveProyect' AND tokenId = '$tokenId'";                

                $resultDelete = mysqli_query($connection, $deleteProyect);

                if($resultDelete){
                    
                    echo '
                    document.querySelector("#save-proyect-'.$saveProyect.'").classList.remove("saved");
                    ';
                    
                }
            
            }
        }
    }else{
        echo '

        window.location = "ingresar.php";
        
        ';
    }

    
}


echo'</script> ';
?>
