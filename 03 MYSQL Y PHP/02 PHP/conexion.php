<?php 

    $conexion = mysqli_connect('localhost', 'root', '', 'dw2021_3');

    // if($conexion){
    //     echo 'conexion exitosa';
    // }
    if(!$conexion){
        die('Fallo en la conexión ' . mysqli_error($conexion));
    }
?>