

<div class="response-card response-profile" id="response-profile">
    <div id="responseAccount"></div>
        <div class="card">

            <div class="title">
                <h3>Información Personal</h3>
                <div class="edit" id="editInfo">
                    <span>[Editar]</span>
                </div>
            </div>

            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="form-account" class="form">

                <?php

                session_start();
                include('../php/db.php');

                $token = $_SESSION['user'];

                $sqlAccount = "SELECT * FROM usuarios WHERE tokenId = '$token'";
                $resultAccount = $connection->query($sqlAccount);
                $rowAccount = $resultAccount->fetch_assoc();
                
                ?>
                <div class="form-container">
                    
                    <div class="name-group">
                        <div class="form-control disable input-name">
                            <label for="name">Nombre(s)</label>
                            <input type="text" id="inputName" name="name" autocomplete="off" value="<?php if(isset($rowAccount["nombre"])){ echo $rowAccount["nombre"]; }else{ echo '';} ?>" />

                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallName"></small>
                        </div>
                        <div class="form-control disable input-lastname">
                            <label for="lastname">Apellido(s)</label>
                            <input  type="text" id="inputLastname" name="lastname" autocomplete="off" value="<?php if(isset($rowAccount["apellido"])){ echo $rowAccount["apellido"]; }else{ echo ''; } ?>" />

                            <i class="inputIcon fas fa-check-circle iconCheck"></i>
                            <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                            <small id="smallLastname"></small>
                        </div>
                    </div>
                    <div class="form-control disable input-mail">
                        <label for="email">Correo Electrónico</label>
                        <input disable type="text" id="inputEmail" name="email" autocomplete="off" value="<?php if(isset($rowAccount["correo"])){ echo $rowAccount["correo"]; }else{ echo '';}?>"/>
        
                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallEmail"></small>
                    </div>
                
                    <div class="form-control disable input-phone">
                        <label for="username">Telefóno </label>
                        <input  type="number" id="inputPhone" name="phone" autocomplete="off" value="<?php if(isset($rowAccount["telefono"]) && $rowAccount["telefono"] != 0 ){ echo $rowAccount["telefono"]; } ?>"/>

                        <i class="inputIcon inputIconPhone fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon inputIconPhone fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallPhone"></small>
                    </div>
                    <div class="flex-country" id="flex-country">

                        <div class="form-control disable input-subject input-country">
                        
                            <label for="adress">País</label>
                            <div id="responseCountry" style="display: none;"><?php echo $rowAccount["pais"] ?></div>
                        

                            <select name="adress" id="country">

                                <option value="AF" id="AF">Afganistán</option>
                                <option value="AL" id="AL">Albania</option>
                                <option value="DE" id="DE">Alemania</option>
                                <option value="AD" id="AD">Andorra</option>
                                <option value="AO" id="AO">Angola</option>
                                <option value="AI" id="AI">Anguila</option>
                                <option value="AQ" id="AQ">Antártida</option>
                                <option value="AG" id="AG">Antigua y Barbuda</option>
                                
                                <option value="SA" id="SA">Arabia Saudí</option>
                                <option value="DZ" id="DZ">Argelia</option>
                                <option value="AR" id="AR">Argentina</option>
                                <option value="AM" id="AM">Armenia</option>
                                <option value="AW" id="AW">Aruba</option>
                                <option value="AU" id="AU">Australia</option>
                                <option value="AT" id="AT">Austria</option>
                                <option value="AZ" id="AZ">Azerbaiyán</option>
                                <option value="BS" id="BS">Bahamas</option>
                                <option value="BH" id="BH">Bahrein</option>
                                <option value="BD" id="BD">Bangladesh</option>
                                <option value="BB" id="BB">Barbados</option>
                                <option value="BE" id="BE">Bélgica</option>
                                <option value="BZ" id="BZ">Belice</option>
                                <option value="BJ" id="BJ">Benín</option>
                                <option value="BM" id="BM">Bermudas</option>
                                <option value="BT" id="BT">Bhután</option>
                                <option value="BY" id="BY">Bielorrusia</option>
                                <option value="MM" id="MM">Birmania</option>
                                <option value="BO" id="BO">Bolivia</option>
                                <option value="BA" id="BA">Bosnia y Herzegovina</option>
                                <option value="BW" id="BW">Botsuana</option>
                                <option value="BR" id="BR">Brasil</option>
                                <option value="BN" id="BN">Brunei</option>
                                <option value="BG" id="BG">Bulgaria</option>
                                <option value="BF" id="BF">Burkina Faso</option>
                                <option value="BI" id="BI">Burundi</option>
                                <option value="CV" id="CV">Cabo Verde</option>
                                <option value="KH" id="KH">Camboya</option>
                                <option value="CM" id="CM">Camerún</option>
                                <option value="CA" id="CA">Canadá</option>
                                <option value="TD" id="TD">Chad</option>
                                <option value="CL" id="CL">Chile</option>
                                <option value="CN" id="CN">China</option>
                                <option value="CY" id="CY">Chipre</option>
                                <option value="VA" id="VA">Ciudad estado del Vaticano</option>
                                <option value="CO" id="CO">Colombia</option>
                                <option value="KM" id="KM">Comores</option>
                                <option value="CG" id="CG">Congo</option>
                                <option value="KR" id="KR">Corea</option>
                                <option value="KP" id="KP">Corea del Norte</option>
                                <option value="CI" id="CI">Costa del Marfíl</option>
                                <option value="CR" id="CR">Costa Rica</option>
                                <option value="HR" id="HR">Croacia</option>
                                <option value="CU" id="CU">Cuba</option>
                                <option value="DK" id="DK">Dinamarca</option>
                                <option value="DJ" id="DJ">Djibouri</option>
                                <option value="DM" id="DM">Dominica</option>
                                <option value="EC" id="EC">Ecuador</option>
                                <option value="EG" id="EG">Egipto</option>
                                <option value="SV" id="SV">El Salvador</option>
                                <option value="AE" id="AE">Emiratos Arabes Unidos</option>
                                <option value="ER" id="ER">Eritrea</option>
                                <option value="SK" id="SK">Eslovaquia</option>
                                <option value="SI" id="SI">Eslovenia</option>
                                <option value="ES" id="ES">España</option>
                                <option value="US" id="US">Estados Unidos</option>
                                <option value="EE" id="EE">Estonia</option>
                                <option value="ET" id="ET">Etiopía</option>
                                <option value="MK" id="MK">Yugoslava Macedonia</option>
                                <option value="PH" id="PH">Filipinas</option>
                                <option value="FI" id="FI">Finlandia</option>
                                <option value="FR" id="FR">Francia</option>
                                <option value="GA" id="GA">Gabón</option>
                                <option value="GM" id="GM">Gambia</option>
                                <option value="GE" id="GE">Georgia</option>
                                <option value="GS" id="GS">Georgia del Sur</option>
                                <option value="GH" id="GH">Ghana</option>
                                <option value="GI" id="GI">Gibraltar</option>
                                <option value="GD" id="GD">Granada</option>
                                <option value="GR" id="GR">Grecia</option>
                                <option value="GL" id="GL">Groenlandia</option>
                                <option value="GP" id="GP">Guadalupe</option>
                                <option value="GU" id="GU">Guam</option>
                                <option value="GT" id="GT">Guatemala</option>
                                <option value="GY" id="GY">Guayana</option>
                                <option value="GF" id="GF">Guayana francesa</option>
                                <option value="GN" id="GN">Guinea</option>
                                <option value="GQ" id="GQ">Guinea Ecuatorial</option>
                                <option value="GW" id="GW">Guinea-Bissau</option>
                                <option value="HT" id="HT">Haití</option>
                                <option value="NL" id="NL">Holanda</option>
                                <option value="HN" id="HN">Honduras</option>
                                <option value="HK" id="HK">Hong Kong R. A. E</option>
                                <option value="HU" id="HU">Hungría</option>
                                <option value="IN" id="IN">India</option>
                                <option value="ID" id="ID">Indonesia</option>
                                <option value="IQ" id="IQ">Irak</option>
                                <option value="IR" id="IR">Irán</option>
                                <option value="IE" id="IE">Irlanda</option>
                                <option value="BV" id="BV">Isla Bouvet</option>
                                <option value="CX" id="CX">Isla Christmas</option>
                                <option value="HM" id="HM">Isla Heard y McDonald</option>
                                <option value="IS" id="IS">Islandia</option>
                                <option value="KY" id="KY">Islas Caimán</option>
                                <option value="CK" id="CK">Islas Cook</option>
                                <option value="CC" id="CC">Islas de Cocos o Keeling</option>
                                <option value="FO" id="FO">Islas Faroe</option>
                                <option value="FJ" id="FJ">Islas Fiyi</option>
                                <option value="FK" id="FK">Islas Malvinas (Falkland)</option>
                                <option value="MP" id="MP">Islas Marianas del norte</option>
                                <option value="MH" id="MH">Islas Marshall</option>
                                <option value="UM" id="UM">Islas menores de E.E.U.U</option>
                                <option value="PW" id="PW">Islas Palau</option>
                                <option value="SB" id="SB">Islas Salomón</option>
                                <option value="TK" id="TK">Islas Tokelau</option>
                                <option value="TC" id="TC">Islas Turks y Caicos</option>
                                <option value="VI" id="VI">Islas Vírgenes EE.UU.</option>
                                <option value="VG" id="VG">Islas Vírgenes UK</option>
                                <option value="IL" id="IL">Israel</option>
                                <option value="IT" id="IT">Italia</option>
                                <option value="JM" id="JM">Jamaica</option>
                                <option value="JP" id="JP">Japón</option>
                                <option value="JO" id="JO">Jordania</option>
                                <option value="KZ" id="KZ">Kazajistán</option>
                                <option value="KE" id="KE">Kenia</option>
                                <option value="KG" id="KG">Kirguizistán</option>
                                <option value="KI" id="KI">Kiribati</option>
                                <option value="KW" id="KW">Kuwait</option>
                                <option value="LA" id="LA">Laos</option>
                                <option value="LS" id="LS">Lesoto</option>
                                <option value="LV" id="LV">Letonia</option>
                                <option value="LB" id="LB">Líbano</option>
                                <option value="LR" id="LR">Liberia</option>
                                <option value="LY" id="LY">Libia</option>
                                <option value="LI" id="LI">Liechtenstein</option>
                                <option value="LT" id="LT">Lituania</option>
                                <option value="LU" id="LU">Luxemburgo</option>
                                <option value="MO" id="MO">Macao R. A. E</option>
                                <option value="MG" id="MG">Madagascar</option>
                                <option value="MY" id="MY">Malasia</option>
                                <option value="MW" id="MW">Malawi</option>
                                <option value="MV" id="MV">Maldivas</option>
                                <option value="ML" id="ML">Malí</option>
                                <option value="MT" id="MT">Malta</option>
                                <option value="MA" id="MA">Marruecos</option>
                                <option value="MQ" id="MQ">Martinica</option>
                                <option value="MU" id="MU">Mauricio</option>
                                <option value="MR" id="MR">Mauritania</option>
                                <option value="YT" id="YT">Mayotte</option>
                                <option value="MX" id="MX">México</option>
                                <option value="FM" id="FM">Micronesia</option>
                                <option value="MD" id="MD">Moldavia</option>
                                <option value="MC" id="MC">Mónaco</option>
                                <option value="MN" id="MN">Mongolia</option>
                                <option value="MS" id="MS">Montserrat</option>
                                <option value="MZ" id="MZ">Mozambique</option>
                                <option value="NA" id="NA">Namibia</option>
                                <option value="NR" id="NR">Nauru</option>
                                <option value="NP" id="NP">Nepal</option>
                                <option value="NI" id="NI">Nicaragua</option>
                                <option value="NE" id="NE">Níger</option>
                                <option value="NG" id="NG">Nigeria</option>
                                <option value="NU" id="NU">Niue</option>
                                <option value="NF" id="NF">Norfolk</option>
                                <option value="NO" id="NO">Noruega</option>
                                <option value="NC" id="NC">Nueva Caledonia</option>
                                <option value="NZ" id="NZ">Nueva Zelanda</option>
                                <option value="OM" id="OM">Omán</option>
                                <option value="PA" id="PA">Panamá</option>
                                <option value="PG" id="PG">Papua Nueva Guinea</option>
                                <option value="PK" id="PK">Paquistán</option>
                                <option value="PY" id="PY">Paraguay</option>
                                <option value="PE" id="PE">Perú</option>
                                <option value="PN" id="PN">Pitcairn</option>
                                <option value="PF" id="PF">Polinesia francesa</option>
                                <option value="PL" id="PL">Polonia</option>
                                <option value="PT" id="PT">Portugal</option>
                                <option value="PR" id="PR">Puerto Rico</option>
                                <option value="QA" id="QA">Qatar</option>
                                <option value="UK" id="UK">Reino Unido</option>
                                <option value="CF" id="CF">República Centroafricana</option>
                                <option value="CZ" id="CZ">República Checa</option>
                                <option value="ZA" id="ZA">República de Sudáfrica</option>
                                <option value="CD" id="CD">República del Congo Zaire</option>
                                <option value="DO" id="DO">República Dominicana</option>
                                <option value="RE" id="RE">Reunión</option>
                                <option value="RW" id="RW">Ruanda</option>
                                <option value="RO" id="RO">Rumania</option>
                                <option value="RU" id="RU">Rusia</option>
                                <option value="WS" id="WS">Samoa</option>
                                <option value="AS" id="AS">Samoa occidental</option>
                                <option value="KN" id="KN">San Kitts y Nevis</option>
                                <option value="SM" id="SM">San Marino</option>
                                <option value="PM" id="PM">San Pierre y Miquelon</option>
                                <option value="VC" id="VC">San V. e Islas Granadinas</option>
                                <option value="SH" id="SH">Santa Helena</option>
                                <option value="LC" id="LC">Santa Lucía</option>
                                <option value="ST" id="ST">Santo Tomé y Príncipe</option>
                                <option value="SN" id="SN">Senegal</option>
                                <option value="YU" id="YU">Serbia y Montenegro</option>
                                <option value="SC" id="SC">Seychelles</option>
                                <option value="SL" id="SL">Sierra Leona</option>
                                <option value="SG" id="SG">Singapur</option>
                                <option value="SY" id="SY">Siria</option>
                                <option value="SO" id="SO">Somalia</option>
                                <option value="LK" id="LK">Sri Lanka</option>
                                <option value="SZ" id="SZ">Suazilandia</option>
                                <option value="SD" id="SD">Sudán</option>
                                <option value="SE" id="SE">Suecia</option>
                                <option value="CH" id="CH">Suiza</option>
                                <option value="SR" id="SR">Surinam</option>
                                <option value="SJ" id="SJ">Svalbard</option>
                                <option value="TH" id="TH">Tailandia</option>
                                <option value="TW" id="TW">Taiwán</option>
                                <option value="TZ" id="TZ">Tanzania</option>
                                <option value="TJ" id="TJ">Tayikistán</option>
                                <option value="IO" id="IO">Territorios británicos O.I.</option>
                                <option value="TF" id="TF">Territorios franceses sur</option>
                                <option value="TP" id="TP">Timor Oriental</option>
                                <option value="TG" id="TG">Togo</option>
                                <option value="TO" id="TO">Tonga</option>
                                <option value="TT" id="TT">Trinidad y Tobago</option>
                                <option value="TN" id="TN">Túnez</option>
                                <option value="TM" id="TM">Turkmenistán</option>
                                <option value="TR" id="TR">Turquía</option>
                                <option value="TV" id="TV">Tuvalu</option>
                                <option value="UA" id="UA">Ucrania</option>
                                <option value="UG" id="UG">Uganda</option>
                                <option value="UY" id="UY">Uruguay</option>
                                <option value="UZ" id="UZ">Uzbekistán</option>
                                <option value="VU" id="VU">Vanuatu</option>
                                <option value="VE" id="VE">Venezuela</option>
                                <option value="VN" id="VN">Vietnam</option>
                                <option value="WF" id="WF">Wallis y Futuna</option>
                                <option value="YE" id="YE">Yemen</option>
                                <option value="ZM" id="ZM">Zambia</option>
                                <option value="ZW" id="ZW">Zimbabue</option>
                            </select>
                            <div class="arrow-icon">
                                <i class="fas fa-chevron-down icon"></i>
                            </div>
                                        
                        </div>
                        <div class="country-flag">
                            <img src="" class="flag" alt="">
                        </div>
                    </div>
                    
                    <input type="hidden" name="ajax-personal">
                    
                    <div class="form-control disable input-submit"> <button name="btnEditar" id="btnEditar">Actualizar</button> </div>                          
                </div>
            </form>
        </div>
        <div class="card card-credit">

            <div class="title">
                <h3>Tarjeta Asociada</h3>
                <!-- <div class="edit" id="editCredit">
                    <span>[Editar]</span>
                </div> -->
                
            </div>

            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="credit-card" class="form form-credit">

                
                <div class="form-container short">
                <?php
                $brand = $rowAccount["marca_tarjeta"];
                if($rowAccount["tokenTarjeta"] != ""){
                    ?>
                    
                    <div class="credit-card">
                        <div class="card-title">
                            
                            <span class="bullets-card">
                            
                            &bull;&bull;&bull;&bull;
                            </span>
                            <span class="bullets-card">
                            
                            &bull;&bull;&bull;&bull;
                            </span>
                            <span class="bullets-card">
                            
                            &bull;&bull;&bull;&bull;
                            </span>
                            <span id="last-numbers-card" class="last-numbers-card">4512</span>
                        </div>
                        <div class="card-brand">
                            <img src="img/svg/small-<?php echo $brand ?>.svg" alt="Tarjeta de Crédito">
                        </div>
                    </div>
                    
                   
                    <?php }else{?>

                   
                    <div class="credit-card card-empty" id="card-empty">
                        <p>
                            <i class="fas fa-plus icon"></i>
                            Agregar Tarjeta
                        </p>
                    </div>
                    
                    <div class="card-info">
                        <p><i class="fas fa-info-circle icon"></i>
                        Al agregar tu tarjeta, tus datos se mantienen seguros y encriptados bajo los estándares PCI DSS y Cybersource
                        </p>
                    </div>
                
                
                    <?php }?>
                                        
                </div>
            </form>
        </div>
    </div>
  
   
</div>