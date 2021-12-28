<?php

include ('db.php');

$datos = array(
    "img" => 0,
    "titulo" => 0,
    "tiempo" => 0,
    "lugar" => 0,
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
            
    document.getElementById('btnNews').innerHTML = 'Crear Noticia';
    document.getElementById('btnNews').classList.add('btn-error'); 
    setTimeout(() => {
        document.getElementById('btnNews').classList.remove('btn-error');
    }, 500);
 ";
}
echo '<script>';
if(isset($_POST["ajax-news"])){
   
    $title = validate($_POST["title"]);
    $reading = validate($_POST["reading"]);
    if(isset($_POST["category"])){
        $category = validate($_POST["category"]);
    }
    $place = validate($_POST["place"]);

    if(empty($_FILES["img"]["tmp_name"])){
        inputError($small = 'smallImg', $message = 'Ingresa la imágen de la noticia', $input = '.input-img');
        $datos["img"] = 0;
    }
    if(empty($title)){
        inputError($small = 'smallTitle', $message = 'Ingresa el título de la noticia', $input = '.input-title');
        $datos["titulo"] = 0;
    }
    if(empty($reading)){
        inputError($small = 'smallReading', $message = 'Ingresa el tiempo de lectura', $input = '.input-reading');
        $datos["tiempo"] = 0;
    }
    if(empty($reading)){
        inputError($small = 'smallReading', $message = 'Ingresa el tiempo de lectura', $input = '.input-reading');
        $datos["tiempo"] = 0;
    }
    if(empty($place)){
        inputError($small = 'smallPlace', $message = 'Ingresa el lugar donde se generó la noticia', $input = '.input-place');
        $datos["lugar"] = 0;
    }
    if(!empty($_FILES["img"]["tmp_name"])){
        $datos["img"] = 1;
    }
    if(!empty($title)){
        $datos["titulo"] = 1;
    }
    if(!empty($reading)){
        $datos["tiempo"] = 1;
    }
    if(!empty($place)){
        $datos["lugar"] = 1;
    }


    if($datos["titulo"] == 1 && $datos["tiempo"] == 1 && $datos["lugar"] == 1 && $datos["img"] == 1){
        
        setlocale(LC_ALL,"es_ES");
        date_default_timezone_set('America/Guatemala');
    
        $month = array('en.', 'febr.', 'mzo.', 'abr.', 'my.', 'jun.', 'jul.', 'agt.', 'sept.', 'oct.', 'nov.', 'dic.');
        

        $day = date('j');
        $month = $month[date("m")-1];
        $year = date('Y');
        $hour = date('g').":".date('i').date('a');
        
        if(isset($_FILES["img"])){
            
            $newImgName =  strtr($title, ".", " ");
            $newImgName = trim($newImgName);
            $newImgName = $newImgName . ".jpg";

                   
            $newFileName =  strtr($title, ",", " ");
            $newFileName =  strtr($newFileName, ".", " ");
            $newFileName = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $newFileName);
            $newFileName = strtr($newFileName, " ", "-"). ".php";
            $newFileName = strtolower($newFileName);
            
            

            $name_tmp = $_FILES["img"]["tmp_name"];
            
           
            $directorioImg = '../noticias/img';
            $directorioFile = '../noticias/' . $category;
            
            $dir = opendir($directorioImg);
            $urlFile = $directorioImg . "/" . $newImgName;
            
            move_uploaded_file($name_tmp, $urlFile);
            
            closedir($dir);
            
            $page = fopen($directorioFile . "/" .$newFileName,'w+');
            
            
            fclose($page);  
            
        }
        $link = $newFileName;
        
        $newPage = fopen('../noticias/' . $category. "/" . $newFileName, 'w');
        $fileContent = file_get_contents('../noticias/content.txt');
        $title = strtolower($title);
        $title = ucfirst($title);
        $newImgName = ucfirst($newImgName);

        
        
        fwrite($newPage, $fileContent.PHP_EOL);
        fclose($newPage);



        $sqlInsert = "INSERT INTO noticias(imagen, titulo, link, categoria, tiempo_lectura, dia, mes, año, hora, fecha_orden, lugar)  VALUES('$newImgName', '$title', '$link', '$category', '$reading', '$day','$month','$year','$hour', NOW(), '$place')";

        $result = $connection->query($sqlInsert);

        if($result && $page){
          
            echo "
            document.getElementById('btnNews').style.pointerEvents = 'none';
            document.getElementById('btnNews').style.background = '#2ecc71';
       
            document.getElementById('btnNews').innerHTML = 'Hecho'; 
           
       
            setTimeout(() => {
                document.querySelector('.input-img').classList.remove('success');
                document.querySelector('.input-title').classList.remove('success');
                document.querySelector('.input-place').classList.remove('success');
                document.querySelector('.input-reading').classList.remove('success');
               
                document.getElementById('form-news').reset();
                document.getElementById('preview-container').innerHTML = '';
               
                document.getElementById('btnNews').style.background = 'linear-gradient(-45deg, var(--celeste-claro), var(--celeste-oscuro))';
       
                document.getElementById('btnNews').innerHTML = 'Crear Noticia';
           
                document.getElementById('btnNews').style.pointerEvents = 'auto';
       
            }, 1000);

            "; 

        }
    }
}
echo '</script>';


?>
