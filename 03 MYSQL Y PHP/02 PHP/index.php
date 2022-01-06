<?php include "conexion.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
</head>
<body>
    <!-- 
        C - CREATE
        R - READ
        U - UPDATE
        D - DELETE
    -->
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos a Pelicomic</h1>
    <section class="container">
        <div class="row p-4">
            <a href="subir.php" class="btn btn-success">Cargar</a>
        </div>
        <div class="row">
            <?php
                $query = "SELECT a.peli_nombre, a.peli_estreno, CONCAT(b.dire_nombres, ' ', b.dire_apellidos) AS director, a.peli_restricciones FROM peliculas a INNER JOIN directores b ON a.peli_dire_id = b.dire_id";
                $query_resultado = mysqli_query($conexion, $query);

                // echo $query_resultado;
                // print_r($query_resultado);
                if(!$query_resultado){
                    die('Fallo en la conexión ' . mysqli_error($conexion));
                }
                
                $array1 = [1, 4324, 'casa', 'ps5', true];
                // echo $array1;
                // ⚡⚡ key - value pair ⚡⚡ ARRAY ASOSIATIVO
                $array2 = ["nombre" => "Juan", "apellido" => "Casas"];

                // print_r($array1);
                // echo '<br>';
                // print_r($array2);
                // echo '<br>';
                // echo $array2["nombre"];
                // echo '<br>';

                while($fila = mysqli_fetch_array($query_resultado)){
                    // print_r($fila);
                    // echo "<h1>{$fila['peli_nombre']}</h1>";
                    ?>
                        <div class="col-md-3 mb-3">
                            <img src="https://img.ecartelera.com/noticias/fotos/66900/66992/2.jpg" alt="" style="width: 100%; display: block;">
                            <h4 class="text-info"><?php echo $fila['peli_nombre']; ?></h4>
                            <div>
                                <strong>Fecha</strong>: <?php echo $fila['peli_estreno']; ?>
                            </div>
                            <div>
                                <strong>Director</strong>: <?php echo $fila['director']; ?>
                            </div>
                            <div>
                                <strong>Rating</strong>: <?php echo $fila['peli_restricciones']; ?>
                            </div>
                        </div>
                <?php }
            ?>
            <!-- <div class="col-md-3">
                <img src="http://placehold.it/200x400" alt="">
                <h4 class="text-info">Star Wars</h4>
                <div>
                    <strong>Fecha</strong>: 2019-12-25
                </div>
                <div>
                    <strong>Director</strong>: Eduardo Arroyo
                </div>
                <div>
                    <strong>Rating</strong>: PG-13
                </div>
            </div> -->
        </div>
    </section>
</body>
</html>