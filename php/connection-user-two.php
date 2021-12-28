<?php


include('../php/db.php');

session_start();

if(isset($_COOKIE["login"])){
    include('../php/db.php');

    $cookie = $_COOKIE["login"];

    $verificarUsuario = mysqli_query($connection, "SELECT * FROM usuarios WHERE tokenId='$cookie'");
    
    if(mysqli_num_rows($verificarUsuario) > 0){
        $verificar = $verificarUsuario->fetch_array();
        $tokenId = $verificar['tokenId'];
        $privilegio = $verificar['privilegio'];

        $_SESSION["user"] = $tokenId;
        $_SESSION["priv"] = $privilegio;
    }
}

if(isset($_SESSION['priv']) && isset($_SESSION['user'])){
    $privilegio = $_SESSION['priv'];
    $nameUser = $_SESSION['user'];

    $sql = "SELECT * FROM usuarios WHERE tokenId = '$nameUser'";
    
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

}

?>