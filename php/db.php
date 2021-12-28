<?php

    $server = "localhost";
    $nameServer = "root";
    $password = "";
    $db = "bd_fundacion";

    $connection = new mysqli($server, $nameServer, $password, $db);

    if($connection->connect_error){
        die("No se pudo conectar a la base de datos, error: ". $connection->connect_error);
    }

?>