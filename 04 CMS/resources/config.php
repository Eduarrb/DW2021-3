<?php
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
    
?>