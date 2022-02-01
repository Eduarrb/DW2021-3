<?php
    require_once("../resources/config.php");
    session_destroy();
    if(isset($_COOKIE['email'])){
        setcookie('email', '', time() - 80000000);
        redirect('./');
    }
    redirect('./');
?>