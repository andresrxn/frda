<div class="response-card response-saved-proyects" id="response-saved-proyects">
    <div id="responseSavedProyects"></div>
    
    <?php
    
    session_start();
    include('../php/db.php');

    $token  = $_SESSION["user"];

    $sqlToken = "SELECT * FROM proyectos_guardados WHERE tokenId = '$token'";
    $resultToken = $connection->query($sqlToken);
    
    if(mysqli_num_rows($resultToken) == 0){
    
    ?>
    <div class="empty saved-proyects">
        <div class="empty-container">
        
            
            <img src="./img/svg/empty-projects.svg" alt="">
            <p>Aqui puedes guardar todos los proyectos que más te interesen para darles seguimiento, te invitamos a <a href="./proyectos">ver todos los proyectos</a> que hemos realizado. </p>
        
            
        </div>
    </div>

    <?php }else{ ?>

        <div class="saved-proyects-container">
        <?php

            $query = "SELECT * FROM proyectos_guardados WHERE tokenId = '$token' ORDER BY fecha_orden DESC";
            $result = $connection->query($query);
            while($rowProyect = $result->fetch_assoc()){
        
        ?>
        <div class="proyect">
            <div id="responseProyect"></div>
            <form action="" method="POST" class="form-save-proyect">


                <?php

                    if(isset($_SESSION["user"])){
                    
                
                    $idProyect = $rowProyect["id_proyecto"];

                    $verify = mysqli_query($connection, "SELECT id_proyecto, tokenId FROM proyectos_guardados WHERE id_proyecto = '$idProyect' AND tokenId = '$token'");

                    if(mysqli_num_rows($verify) == 0) {
                        $html = '
                        <i class="far fa-bookmark icon"></i>
                                                
                        ';
                        $class = "";
                        $title ="Guardar Proyecto";
                    }else{
                        $html = '
                        <i class="fas fa-bookmark icon"></i>
                                                
                        ';  
                        $class = "saved";
                        $title ="Proyecto Guardado";
                    }
                    }
                    ?>

                <button name="save-proyect" class="save-proyect <?php if(isset($_SESSION["user"])){ echo $class;}else{echo '';}?>"
                    id="<?php if(isset($_SESSION["user"])){ echo 'save-proyect-'.$rowProyect["id_proyecto"];}else{echo '';} ?>"  title="<?php if(isset($_SESSION["user"])){ echo $title;}else{echo '';} ?>">

                    <?php if(isset($_SESSION["user"])){ echo $html; }else{ echo ' <i class="far fa-bookmark icon"></i>';}?>

                </button>
                <input type="hidden" name="ajax-proyect" value="<?php if(isset($_SESSION["user"])){  echo $rowProyect["id_proyecto"];}else{echo '';} ?>">
            </form>
            <a href="./nuestros-proyectos/<?php echo $rowProyect["link"]; ?>">

                <div class="proyect-img">
                    <img class="lazy-proyect" src="./preview-img/<?php echo $rowProyect["imagen"]; ?>"
                        alt="<?php echo $rowProyect["imagen"]; ?>">
                    

                </div>
                <div class="proyect-des">


                    <h3><?php echo ucfirst($rowProyect["titulo"]);?>

                    </h3>
                    <div class="proyect-number">
                        <span class="number">Proyecto No. <?php echo $rowProyect["id_proyecto"];?></span> <time
                            datetime="<?php echo $rowProyect["fecha_orden"] ?>"
                            class="proyect-date"><?php echo $rowProyect["fecha"];?></time>
                    </div>
                    <p><?php echo $rowProyect["descripcion"];?></p>
                    <div class="proyect-progress">

                        <div class="percent"></div>
                        <div class="progress">
                            <div class="progress-bar progressAnimation">

                            </div>
                        </div>
                        <div class="progress-amount">
                            <span class="initial-amount">
                                <b>

                                    <?php
                                if($rowProyect["moneda"] == "GTQ"){echo "Q";}else{echo "$";}
                            ?>
                                </b>
                                <b>
                                    <?php echo $rowProyect["cantidad_inicial"];?>
                                </b>
                            </span>
                            <span class="final-amount">
                                <b>
                                    <?php
                                if($rowProyect["moneda"] == "GTQ"){echo "Q";}else{echo "$";}
                            ?>

                                </b>
                                <b>

                                    <?php echo $rowProyect["cantidad_final"];?>
                                </b>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php } ?>
        </div>

    <?php }?>
</div>