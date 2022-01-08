<?php include "conexion.php"; ?>
<?php ob_start(); ?>
<?php
    // echo 'se borro tu archivo';
    if(isset($_GET['id'])){
        $id_delete = $_GET['id'];
        // echo $id_delete;
        $query = "DELETE FROM peliculas WHERE peli_id = {$id_delete}";
        $query_res = mysqli_query($conexion, $query);
        if(!$query_res){
            die("Fallo en la conexion " . mysqli_error($conexion));
        }
        header("Location: ./");
    }
?>