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
    
    //     foreach ($_POST['save-proyects'] as $key => $saveNews) {
if(isset($_POST["ajax-news"])){
    echo'<script> ';
    

    if(isset($_SESSION["user"])){
        $tokenId = $_SESSION["user"];
    
    
        
        $saveNews = validate($_POST["ajax-news"]);
        

        $selectNews = "SELECT * FROM noticias WHERE id = '$saveNews'";
        $result = $connection->query($selectNews);
        $row = $result->fetch_assoc();

        $idNews = $row["id"];
        $title = $row["titulo"];
        $link = $row["link"];
        $img = $row["imagen"];
        $category = $row["categoria"];
        $time = $row["tiempo_lectura"];
        $day = $row["dia"];
        $month = $row["mes"];
        $year = $row["año"];

        $verify = mysqli_query($connection, "SELECT id_noticia, tokenId FROM noticias_favoritas WHERE id_noticia = '$idNews' AND tokenId = '$tokenId'");

        if(mysqli_num_rows($verify) == 0) {

            if($saveNews == $idNews){
                
                
    
                $insertNews = "INSERT INTO noticias_favoritas(id_noticia, tokenId, imagen, titulo, link, categoria, tiempo_lectura, dia, mes, año, fecha_orden) VALUES ('$idNews', '$tokenId', '$img', '$title', '$link', '$category', '$time', '$day', '$month', '$year', NOW())";
                $result = mysqli_query($connection, $insertNews);
            
                if($result){

                    
                    echo '
                    document.querySelector("#save-news-'.$saveNews.'").classList.add("saved");
                    
                    ';
                }
            }
        }else{
            if($saveNews == $idNews){
                
                $deleteProyect = "DELETE FROM noticias_favoritas WHERE id_noticia = '$saveNews' AND tokenId = '$tokenId'";                

                $resultDelete = mysqli_query($connection, $deleteProyect);

                if($resultDelete){
                    
                    echo '
                    document.querySelector("#save-news-'.$saveNews.'").classList.remove("saved");
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
