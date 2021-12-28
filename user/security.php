<div class="response-card response-security" id="response-security">
    <div id="responseSecurity"></div>
    <div id="responseForgot"></div>
    <div id="responseDelete"></div>

    <div class="card">
        <div class="title">
            <h3>Cambiar Contraseña</h3>
            <div class="edit" id="editPass">
                <span>[Cambiar]</span>
            </div>
        </div>
        <form action="" method="POST" id="form-pass" class="form">

            <div class="form-container">
            
                
              
                <div class="password-group">
                    <div class="form-control  disable input-password">
                        <label for="password">Tu Contraseña 

                        
                        </label>
                        <input type="password" id="inputPassword" name="password" autocomplete="off" class="password"  value="" />
                        <div class="show-pass">
                            <i class="far fa-eye-slash icon"></i>
                        </div>
                        <small id="smallPassword"></small>
                    </div>
                    <div class="form-control disable input-new-password">
                        <label for="newPassword">Nueva Contraseña   </label>
                        <input type="password" id="inputNewPassword" name="newPassword" autocomplete="off" class="password"/>
                        <div class="show-pass show-newpass">
                            <i class="far fa-eye-slash icon"></i>
                        </div>
                        <small id="smallNewPassword"></small>
                    </div>
                </div>
                
                <input type="hidden" name="ajax-account">
                
                <div class="form-control disable input-submit">
                    <button id="btnPass" name="btnPass">Hecho</button>
                </div>
            </div>
        </form>
    </div>

    <div class="card card-forgot-pass">
        <div class="title">
            <h3>¿Olvidaste tu contraseña?</h3>
         
        </div>
        <p>Si no recuerdas tu contraseña, te enviaremos un código a tu correo para que puedas ingresar una nueva; este código expira en una hora después de solicitarse.</p>
        <form action="" method="POST" id="form-forgot-pass" class="form">

            <div class="form-container">
                <input type="hidden" name="ajaxForgotPass">
                <div class="form-control input-submit"> <button name="btnSendCode" id="btnSendCode">Enviar Código</button> </div>   
            </div>
        </form>
    </div>
    <div class="card card-delete">
        <div class="title">
            <h3>Eliminar Cuenta</h3>
            
        </div>
        <p>Si eliminas tu cuenta se borrarán todos tus datos personales, incluyendo tu historial de donativos, tus proyectos guardados, tus noticias favoritas y tus suscripciones activas se cancelarán.</p>
        <form action="" method="POST" id="" class="form">

            <div class="form-container">
                
                <div class="form-control input-submit"> <button id="btnDelete">Eliminar Cuenta</button> </div>   
            </div>
        </form>
    </div>
</div>
