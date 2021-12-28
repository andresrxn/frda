<header>

<div class="header" id="header">
    <div class="header-container">

        <div class="header-container-logo" title="Página Principal">
            <a href="../../">

                <img src="../../img/logos/redes-de-ayuda.svg" alt="Logo Fundación Redes de Ayuda">
            </a>
        </div>

        <div class="header-container-icons">
            <div class="header-container-donate" id="header-donate">
                <span>
                <a href="../../donar.php">
                    <i class="fas fa-gift icon"></i>
                    Donar
                </a>
            </span>
            </div>

            <div class="header-container-burger">
                <div class="header-btn">
                    <div class="header-btn-burger">
                    </div>
                </div>
            </div>
        </div>

        <nav id="nav">
            <ul class="header-menu">
                <li class="header-menu-content">
                    <a href="../../">
                        <i class="fas fa-home icon"></i> Inicio
                    </a>

                </li>
                <li class="header-menu-content">
                    <a href="../../nosotros.php">
                        <i class="fas fa-users icon"></i> Nosotros
                    </a>

                </li>
                <li class="header-menu-content">
                    <a href="../../proyectos.php">
                        <i class="fas fa-calendar-check icon"></i> Proyectos
                    </a>

                </li>


                <li class="header-menu-content" id="blog">

                    <a href="../../blog.php">
                        <i class="fas fa-newspaper icon"></i> Blog
                    </a>

                </li>
                <li class="header-menu-content">

                    <a href="../../patrocinadores.php">
                        <i class="fas fa-hand-holding-heart icon"></i> Patrocinio
                    </a>

                </li>

                <li class="header-menu-content">

                    <a href="../../contacto.php">
                        <i class="fas fa-comment icon"></i> Contacto
                    </a>

                </li>

                <li class="header-menu-content account" id="account">

                    <?php     
                    if(isset($_SESSION['user'])){
                        
                        if($privilegio == 1){
                            $name = 'Admin.';            
                        }else{
                            $name = $row["nombre"];
                            $palabras = explode(" ", $name);
                            $name = $palabras[0];
                        }
                            
                        echo " <a href='../../ingresar.php'  id='accountLink' class='active' title='Maneja tu cuenta'><i class='fas fa-user icon'></i> <span>$name</span></a>

                        <a href='../../php/close.php' class='close-session'  title='Cerrar Sesión'><i class='fas fa-sign-out-alt  icon'></i></a>";
                    }else{
                        $linkNouser = "
                        <a href='../../ingresar.php '  id='accountLink' title='Ingresa o Registrate'><i class='fas fa-user icon'></i> <span>Cuenta</span></a>";
                        echo $linkNouser;
                    }                            
                ?>

                </li>

            </ul>
        </nav>
    </div>

</div>
</header>
