<div class="response-card response-suscriptions" id="response-suscriptions">
    <div id="responseSuscriptions"></div>
    
    <?php
    
    session_start();
    include('../php/db.php');

    $token  = $_SESSION["user"];

    $sqlToken = "SELECT * FROM suscripciones WHERE tokenId = '$token'";
    $resultToken = $connection->query($sqlToken);
    
    if(mysqli_num_rows($resultToken) != 0){
    
    ?>
    <div class="empty suscriptions">
        <div class="empty-container">
        
            
            <img src="./img/svg/empty-suscription.svg" alt="">
            <p>Aún no tienes ninguna suscripción activa, recuerda que puedes aportar mensual o anualmente tus donativos en nuestro <a href="./donar">Formulario de Donación Online. </a></p>
        
            
        </div>
    </div>

    <?php }else{ ?>

        <div class="suscriptions-container" id="suscriptions-container">
            <?php 
             $sqlSuscriptions = "SELECT * FROM usuarios WHERE tokenId = '$token'";
    
             $resultSuscriptions = $connection->query($sqlSuscriptions);
             $rowSuscriptions = $resultSuscriptions->fetch_assoc();
            
            ?>
                <div class="recipe-suscriptions">
                    <div class="recipe-container">
                    <form action="" name="form-cancel-suscription" id="form-cancel-suscription" class="form">
                        <div class="recipe-title">
                            <div class="recipe-img">
                                <img src="img/svg/empty-suscription.svg" alt="">
                            </div>
                            <div class="recipe-title-content">
                                <div class="recipe-amount">
                                    <b>GTQ</b>
                                    <span>100000</span>
                                </div>
                                <!-- <div class="recipe-number">
                                    <span>#00000100</span>
                                </div> -->
                                <div class="recipe-date">
                                    <span>Desde:</span>
                                    <time>22 de oct. 2021</time>
                                </div>
                            </div>
                        </div>
                        <div class="recipe-info">
                            <h3>Donación Mensual</h3>
                            <div class="recipe-name">
                                <p><i class="fas fa-user icon"></i> Carlos Raxón</p>
                                <span class="flag"><?php echo $rowSuscriptions["pais"] ?></span>
                            </div>
                            <p class="recipe-email"><i class="fas fa-envelope icon"></i> carlosraxon019@gmail.com</p>
                            <p><i class="fas fa-phone icon"></i> 33242342</p>
                        </div>
                       
                        <div class="recipe-button">
                            <input type="hidden" name="ajax-cancel-suscription" value="000000100">
                            <button id="btnCancelSuscription" name="btnCancelSuscription">Cancelar Suscripción</button>
                        </div>
                    </form>
                </div>
            
            
        </div>
        
            <div class="recipe-email-info">
                <p>Todos los recibos de las transacciones realizadas son enviadas a tu correo electrónico donde puedes consultar los detalles al respecto.</p>
            </div>
            <div class="refund" id="refund">
                <p><i class="fas fa-info-circle icon"></i> Deseo hacer un reembolso de mi donativo</p>
            </div>
        </div>

    <?php }?>
</div>