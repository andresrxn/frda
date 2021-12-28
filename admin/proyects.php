<div class="response-content proyects" id="proyects">

    <div class="create create-proyect" id="create-proyect">
        <i class="fas fa-plus icon"></i>
        Nuevo Proyecto
    </div>
    <div class="principal-card card-dark one">
        <div class="principal-card-icon">
            <i class="fas fa-donate icon"></i>
        </div>
        <div class="principal-card-content">
            <div class="principal-card-percent up">
                <span>+</span>
                <span>110%</span>

            </div>


            <h3 class="white">Recaudado <span class="title-number">350000</span></h3>

            <span class="quantity white">
                <span>Q</span>
                <b>535280</b>
            </span>
        </div>
    </div>
    <div class="principal-card card-dark two">
        <div class="principal-card-icon">
            <i class="fas fa-donate icon"></i>
        </div>
        <div class="principal-card-content">
            <div class="principal-card-percent up">
                <span>+</span>
                <span>110%</span>

            </div>


            <h3 class="white">Recaudado <span class="title-number">350000</span></h3>

            <span class="quantity white">
                <span>Q</span>
                <b>535280</b>
            </span>
        </div>
    </div>
    <div class="principal-card card-dark three">
        <div class="principal-card-icon">
            <i class="fas fa-donate icon"></i>
        </div>
        <div class="principal-card-content">
            <div class="principal-card-percent up">
                <span>+</span>
                <span>110%</span>

            </div>


            <h3 class="white">Recaudado <span class="title-number">350000</span></h3>

            <span class="quantity white">
                <span>Q</span>
                <b>535280</b>
            </span>
        </div>
    </div>
    <div class="chart card-dark first">
        <div class="card-title">

            <h3 class="white">Proyectos 2021</h3>
        </div>
        <div class="canva">

            <canvas id="proyectsChart" width="100%"></canvas>
        </div>
    </div>
    <div class="chart card-dark second">
        <div class="card-title">

            <h3 class="white">Proyectos</h3>
        </div>
        <div class="canva">
            <canvas id="" width="100%"></canvas>
        </div>
        
    </div>
    <div class="chart card-dark third">
        <div class="card-title">

            <h3 class="white">Usuarios Mensuales</h3>
        </div>
        <div class="canva">
            <canvas id="" width="100%"></canvas>
        </div>
    </div>
     <div class="table-container card-dark">

        <table id="table" class="admin-table display nowrap" cellspacing="0" >
    
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Moneda</th>
                    <th>Inicial</th>
                    <th>Meta</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
    
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="banner-create">
        <div class="banner-container create-file">
            
            <div id="response"></div>
            <form action="" method="POST" class="form create-file" id="form-proyect" enctype="multipart/form-data">
                <div class="preview">
                    <div class="preview-container" id="preview-container">

                    </div>
                </div>
                <div class="form-container">
                    <div class="form-control input-img">
                       
                        <input type="file" name="img" id="img">

                        <small id="smallImg"></small>
                    </div>
                    <div class="form-control input-title">
                        
                        <input type="text" autocomplete="off" id="title" name="title" placeholder="Título">

                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallTitle"></small>
                    </div>
                    <div class="form-control input-description">
                        
                        <input type="text" autocomplete="off" id="description" name="description" placeholder="Descripción">

                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallDescription"></small>
                    </div>
                    <div class="form-control input-subject placeholder">
                        
                        <select name="currency" id="currency">
                            <option value="GTQ">Quetzales</option>
                            <option value="USD">Dólares</option>
                        </select>
                        <div class="arrow-icon">
                            <i class="fas fa-chevron-down icon"></i>
                        </div>
                    </div>
                    <div class="form-control input-initial">
                    
                        <input type="text" autocomplete="off" id="initial" name="initial" placeholder="Cantidad Inicial">

                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallInitial"></small>
                    </div>
                    <div class="form-control input-final">
                        
                        <input type="text" autocomplete="off" id="final" name="final" placeholder="Cantidad Final">

                        <i class="inputIcon fas fa-check-circle iconCheck"></i>
                        <i class="inputIcon fas fa-exclamation-circle iconExclamation"></i>
                        <small id="smallFinal"></small>
                    </div>

                    <input type="hidden" name="ajax-proyect">
                    <button id="btnProyect" name="btnProyect">Crear Proyecto</button>
                </div>
            </form>
        </div>
    </div>
    <div class="close-donation" id="close-donation">
        <i class="fas fa-times icon"></i>
    </div>


</div>
<?php include('footer.php') ?>