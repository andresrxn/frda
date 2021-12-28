<?php

include ('db.php');

$datos = array(
    "img" => 0,
    "titulo" => 0,
    "descripcion" => 0,
    "inicial" => 0,
    "final" => 0,
);

function validate($campo){
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}
function inputError($small, $message, $input){
    echo   "
       
    document.getElementById('$small').innerHTML='$message';
    document.querySelector('$input').classList.remove('success');
    document.querySelector('$input').classList.add('error');
            
    document.getElementById('btnProyect').innerHTML = 'Crear Proyecto';
    document.getElementById('btnProyect').classList.add('btn-error'); 
    setTimeout(() => {
        document.getElementById('btnProyect').classList.remove('btn-error');
    }, 500);
 ";
}


echo '<script>';
if(isset($_POST["ajax-proyect"])){
   
    $title = validate($_POST["title"]);
    $description = validate($_POST["description"]);
    $initial = validate($_POST["initial"]);
    $final = validate($_POST["final"]);
    if(isset($_POST["currency"])){
        $currency = validate($_POST["currency"]);
    }

    if(empty($_FILES["img"]["tmp_name"])){
        inputError($small = 'smallImg', $message = 'Ingresa la imágen del proyecto', $input = '.input-img');
        $datos["img"] = 0;
    }
    if(empty($title)){
        inputError($small = 'smallTitle', $message = 'Ingresa el título del proyecto', $input = '.input-title');
        $datos["titulo"] = 0;
    }
    if(empty($description)){
        inputError($small = 'smallDescription', $message = 'Ingresa la descripción del proyecto', $input = '.input-description');
        $datos["descripcion"] = 0;
    }
    if(empty($initial)){
        inputError($small = 'smallInitial', $message = 'Ingresa la cantidad inicial del proyecto', $input = '.input-initial');
        $datos["inicial"] = 0;
    }
    if(empty($final)){
        inputError($small = 'smallFinal', $message = 'Ingresa la cantidad objetivo del proyecto', $input = '.input-final');
        $datos["final"] = 0;
    }

    if(!empty($_FILES["img"]["tmp_name"])){
        $datos["img"] = 1;
    }
    if(!empty($title)){
        $datos["titulo"] = 1;
    }
    if(!empty($description)){
        $datos["descripcion"] = 1;
    }
    if(!empty($initial)){
        $datos["inicial"] = 1;
    }
    if(!empty($final)){
        $datos["final"] = 1;

    }

    if($datos["titulo"] == 1 && $datos["descripcion"] == 1 && $datos["img"] == 1 && $datos["inicial"] == 1 && $datos["final"] == 1  ){
        
        setlocale(LC_ALL,"es_ES");
        date_default_timezone_set('America/Guatemala');
    
        $mes = array('en.', 'febr.', 'mzo.', 'abr.', 'my.', 'jun.', 'jul.', 'agt.', 'sept.', 'oct.', 'nov.', 'dic.');
        $date = date("j") . " de " . $mes[date("m")-1] . " " . date("Y");
        
        
        if(isset($_FILES["img"])){
            
            $newImgName =  strtr($title, ".", " ");
            $newImgName = trim($newImgName);
            $newImgName = $newImgName . ".jpg";

                   
            $newFileName =  strtr($title, ",", " ");
            $newFileName =  strtr($newFileName, ".", " ");
            $newFileName = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $newFileName);
            $newFileName = strtr($newFileName, " ", "-"). ".php";
            $newFileName = strtolower($newFileName);

            
            
            $link = $newFileName;

            $name_tmp = $_FILES["img"]["tmp_name"];
            
            
            $directorioImg = '../nuestros-proyectos/img';
            $directorioFile = '../nuestros-proyectos/';
            
            $dir = opendir($directorioImg);
            $urlFile = $directorioImg . "/" . $newImgName;
            
            move_uploaded_file($name_tmp, $urlFile);
            
            closedir($dir);
            
            $page = fopen($directorioFile . "/" .$newFileName,'w+');
            
            
            fclose($page);  
            
            
        }
        $newPage = fopen('../nuestros-proyectos/' . $newFileName, 'w');
        $fileContent = file_get_contents('../nuestros-proyectos/content.txt');
        
        fwrite($newPage, $fileContent.PHP_EOL);
        fclose($newPage);
        $title = strtolower($title);
        $title = ucfirst($title);
        $newImgName = ucfirst($newImgName);
    
        $description = ucfirst($description);
        $state = "En Curso";

       
        
        $sqlInsert = "INSERT INTO proyectos(imagen, titulo, link, descripcion, moneda, cantidad_inicial, cantidad_final, estado, fecha, fecha_orden)  VALUES('$newImgName','$title', '$link', '$description', '$currency', '$initial','$final','$state','$date', NOW())";

        $result = $connection->query($sqlInsert);
        if($result && $page){
            echo "
            document.getElementById('btnProyect').style.pointerEvents = 'none';
            document.getElementById('btnProyect').style.background = '#2ecc71';
        
            document.getElementById('btnProyect').innerHTML = 'Hecho'; 
            

            setTimeout(() => {
                document.querySelector('.input-img').classList.remove('success');
                document.querySelector('.input-title').classList.remove('success');
                document.querySelector('.input-description').classList.remove('success');
                document.querySelector('.input-initial').classList.remove('success');
                document.querySelector('.input-final').classList.remove('success');
                document.getElementById('form-proyect').reset();
                document.getElementById('preview-container').innerHTML = '';
                
                document.getElementById('btnProyect').style.background = 'linear-gradient(-45deg, var(--celeste-claro), var(--celeste-oscuro))';
        
                document.getElementById('btnProyect').innerHTML = 'Crear Proyecto';
            
                document.getElementById('btnProyect').style.pointerEvents = 'auto';
        
            }, 1000);
        ";
        }
    }
}
echo '</script>';

?>


