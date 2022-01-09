<?php
    ob_start();
    session_start();
    // if (a > b) {
    //     echo 'a es mayor';
    // }
    // else {
    //     echo "b es mayor";
    // }

    // a > b ? echo 'a es mayor' : 'b es mayor'; 

    defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

    // echo DIRECTORY_SEPARATOR;

    # c:/www/public/admin
    # c:\www\public\admin

    // ⚡⚡ RUTAS RELATIVAS
    defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
    defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");

    // echo __DIR__;
    // echo "<br>";
    // echo TEMPLATE_FRONT;

    // ⚡⚡ DEFINIR PARAMETROS DE CONEXION CON CONSTANTES
    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "root");
    defined("DB_PASS") ? null : define("DB_PASS", "");
    defined("DB_NAME") ? null : define("DB_NAME", "cms_2021_3");

    $conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // if($conexion){
    //     echo "felicidades, estas conectado 👍";
    // }

    require_once("functions.php");
    
?>