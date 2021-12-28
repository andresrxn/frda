<?php
class Conexion{
    public static function Conectar(){
        define('servidor', 'localhost');
        define('nombre_db', 'bd_fundacion');
        define('usuario', 'root');
        define('password', '');
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_db, usuario, password, $opciones);
            return $conexion;
        }catch(Exception $e){
            die("No se pudo conectar, error: ". $e->getMessage());
        }
    }
}


$object = new Conexion();
$conexion = $object->Conectar();

$sql = "SELECT * FROM proyectos";
$result = $conexion->prepare($sql);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion=null;

?>