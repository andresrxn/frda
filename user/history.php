<div class="response-card response-history" id="response-history">
    <div id="responseHistory"></div>
    
    <?php
    
    session_start();
    include('../php/db.php');

    $token  = $_SESSION["user"];

    $sqlToken = "SELECT * FROM donaciones WHERE tokenId = '$token'";
    $resultToken = $connection->query($sqlToken);
    
    if(mysqli_num_rows($resultToken) != 0){
    
    ?>
    <div class="empty history">
        <div class="empty-container">
        
            
            <img src="./img/svg/history.svg" alt="Historial de Donativos">
            <p>Aquí aparecerán todas las donaciones que realices por medio de nuestra plataforma, ¿Deseas dar tu primer aporte? </p>
            <div class="banner-container-button">
                <a href="./donar">
                    <i class="fas fa-gift icon"></i> Donar Ahora
                </a>

            </div>
        
            
        </div>
    </div>

    <?php }else{ ?>

        <div class="history-container" id="history-container">
       
            <div class="history-card">
                <div class="history-img">
                    <img src="./img/svg/gift.svg" alt="Donativo">
                    <div class="history-title">
                        <div class="history-type">
                            <h3>Donación General</h3>
                        </div>
                        <div class="history-date">
                            <time>Sábado, 22 de jul. 2021</time>
                        </div>
                                            
                    </div>
                </div>
                <div class="history-content">
                    
                    <div class="history-quantity">
                        <div class="history-amount">
                            <b>Q</b>
                            <span>120</span>
                        </div>
                        <div class="history-recipe">
                            <span>#00000201</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="history-card">
                <div class="history-img">
                    <img src="./img/svg/gift.svg" alt="Donativo">
                    <div class="history-title">
                        <div class="history-type">
                            <h3>Donación General</h3>
                        </div>
                        <div class="history-date">
                            <time>Sábado, 22 de jul. 2021</time>
                        </div>
                                            
                    </div>
                </div>
                <div class="history-content">
                    
                    <div class="history-quantity">
                        <div class="history-amount">
                            <b>Q</b>
                            <span>400</span>
                        </div>
                        <div class="history-recipe">
                            <span>#00000344</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="history-card">
                <div class="history-img">
                    <img src="./img/svg/gift.svg" alt="Donativo">
                    <div class="history-title">
                        <div class="history-type">
                            <h3>Proyecto no.2</h3>
                        </div>
                        <div class="history-date">
                            <time>Sábado, 22 de jul. 2021</time>
                        </div>
                                            
                    </div>
                </div>
                <div class="history-content">
                    
                    <div class="history-quantity">
                        <div class="history-amount">
                            <b>Q</b>
                            <span>6000</span>
                        </div>
                        <div class="history-recipe">
                            <span>#00001501</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="history-card">
                <div class="history-img">
                    <img src="./img/svg/gift.svg" alt="Donativo">
                    <div class="history-title">
                        <div class="history-type">
                            <h3>Donación General</h3>
                        </div>
                        <div class="history-date">
                            <time>Sábado, 22 de jul. 2021</time>
                        </div>
                                            
                    </div>
                    
                </div>
                <div class="history-content">
                   
                    <div class="history-quantity">
                        <div class="history-amount">
                            <b>Q</b>
                            <span>50000</span>
                        </div>
                        <div class="history-recipe">
                            <span>#00002000</span>
                        </div>
                    </div>
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