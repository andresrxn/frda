<?php

session_start();

session_destroy();

header('location:../');

if(isset($_COOKIE["login"])){
    setcookie("login","", 1, "/",false, false);
}



?>