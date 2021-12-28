
<div class="response-card response-favorited" id="response-favorited">
    <div id="responseFavorited"></div>
    
    <?php
    
    session_start();
    include('../php/db.php');

    $token  = $_SESSION["user"];

    $sqlToken = "SELECT * FROM noticias_favoritas WHERE tokenId = '$token'";
    $resultToken = $connection->query($sqlToken);
    
    if(mysqli_num_rows($resultToken) == 0){
    
    ?>
    <div class="empty favorited">
        <div class="empty-container">
        
            
            <img src="./img/svg/empty-news.svg" alt="">
            <p>Aún no tienes ninguna noticia favorita, te invitamos a visitar <a href="./blog">Nuestro Blog</a> para ver todas nuestras actualizaciones. </p>
        
            
        </div>
    </div>

    <?php }else{ ?>

        <div id="response-news"></div>
        <div class="favorited-container">
        <?php
            

            $query = "SELECT * FROM noticias_favoritas WHERE tokenId = '$token' ORDER BY fecha_orden DESC";
            $result = $connection->query($query);
            while($rowNewsTwo = $result->fetch_assoc()){
        
        ?>
        <div class="main-card" data-item="<?php 
            echo $rowNewsTwo["categoria"]; ?>">

            <form action="" method="POST" class="form-save-news">

                <?php
                if(isset($_SESSION["user"])){
                    

                    $idNews = $rowNewsTwo["id_noticia"];

                    $verify = mysqli_query($connection, "SELECT id_noticia, tokenId FROM noticias_favoritas WHERE id_noticia = '$idNews' AND tokenId = '$token'");

                    if(mysqli_num_rows($verify) == 0) {
                        $html = '
                        <i class="far fa-heart icon"></i>
                                                
                        ';
                        $class = "";
                        $title ="Marcar como Favorita";
                    }else{
                        $html = '
                        <i class="fas fa-heart icon"></i>
                                            
                        ';  
                        $class = "saved";
                        $title ="Guardada en Favoritos";
                    }
                }
                ?>

                <button name="save-news" class="save-news <?php if(isset($_SESSION["user"])){ echo $class;}else{echo '';}?>"
                    id="<?php if(isset($_SESSION["user"])){ echo 'save-news-'.$rowNewsTwo["id_noticia"];}else{echo '';} ?>"  title="<?php if(isset($_SESSION["user"])){ echo $title;}else{echo '';} ?>">

                    <?php if(isset($_SESSION["user"])){ echo $html; }else{ echo ' <i class="far fa-heart icon"></i>';}?>

                </button>
                <input type="hidden" name="ajax-news" value="<?php if(isset($_SESSION["user"])){  echo $rowNewsTwo["id_noticia"];}else{echo '';} ?>">
            </form>

            <a href="./noticias/<?php echo $rowNewsTwo["categoria"]."/".$rowNewsTwo["link"]; ?>" class="main-card-link">

                <div class="main-card-des">
                    <span class="category <?php  echo $rowNewsTwo["categoria"] ?>"><?php  echo $rowNewsTwo["categoria"] ?></span>

                    <h3><?php echo ucfirst($rowNewsTwo["titulo"]); ?></h3>
                    <div>

                        <span class="read"><i class="fas fa-book icon"></i><?php echo $rowNewsTwo["tiempo_lectura"]; ?></span>
                        <time datetime="<?php echo $rowNewsTwo["fecha_orden"] ?>"><?php echo $rowNewsTwo["dia"] . " de " . $rowNewsTwo["mes"] . " " . $rowNewsTwo["año"]; ?></time>
                    </div>


                </div>
                <div class="main-card-img">
                    
                    
                    <img class="lazy-news" src="./preview-img/<?php echo $rowNewsTwo["imagen"]; ?>" alt="">

                </div>
            </a>
        </div>
        <?php } ?>
        </div>

    <?php }?>
</div>