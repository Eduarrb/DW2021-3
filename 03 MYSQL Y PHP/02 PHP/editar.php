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
    <h1 class="text-center pt-5 pb-5 bg-primary text-white">Bienvenidos a Pelicomic</h1>
    <section class="container">
        <div class="row p-4">
            <a href="./" class="btn btn-info">Regresar</a>
        </div>
        <div class="row justify-content-center">
            <h4 class="text-center col-md-12">Actualizar datos de pelicula</h4>
            
            <?php
                if(isset($_GET['id'])){
                    $peli_id = $_GET['id'];
                    $query = "SELECT * FROM peliculas WHERE peli_id = {$peli_id}";
                    $query_res = mysqli_query($conexion, $query);
                    if(!$query_res){
                        die("Fallo en la conexión " . mysqli_error($conexion));
                    }

                    $fila = mysqli_fetch_array($query_res);
                    // print_r($fila);
                }
            
            ?>
            <form action="" class="col-md-6" method="post">
                <div class="form-group">
                    <label for="peli_nombre">Nombre de pelicula</label>
                    <input type="text" name="peli_nombre" id="peli_nombre" class="form-control" value="<?php echo $fila['peli_nombre']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_genero">Género</label>
                    <input type="text" name="peli_genero" id="peli_genero" class="form-control" value="<?php echo $fila['peli_genero']; ?>">
                </div>
                <div class="form-group">
                    <label for="peli_estreno">Fecha de estreno</label>
                    <input type="date" name="peli_estreno" id="peli_estreno" class="form-control">
                </div>
                <div class="form-group">
                    <label for="peli_restricciones">Restricciones</label>
                    <input type="text" name="peli_restricciones" id="peli_restricciones" class="form-control">
                </div>
                <div class="form-group">
                    <label for="peli_img">Imagen URL</label>
                    <input type="text" name="peli_img" id="peli_img" class="form-control">
                </div>
                <div class="form-group">
                    <label for="peli_dire_id">Director</label>
                    <select name="peli_dire_id" id="peli_dire_id" class="form-control">
                        <?php
                            $query = "SELECT * FROM directores";
                            $query_resultado = mysqli_query($conexion, $query);

                            if(!$query_resultado){
                                die("Fallo en la conexión " . mysqli_error($conexion));
                            }

                            while($fila = mysqli_fetch_array($query_resultado)){
                                ?>

                                    <option value="<?php echo $fila['dire_id']; ?>">
                                        <?php echo $fila['dire_nombres'] . " " . $fila['dire_apellidos']; ?>
                                    </option>

                            <?php }
                        
                        ?>
                        <!-- <option value="2">Ridley ScotT</option> -->
                    </select>
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Guardar" class="btn btn-primary" name="guardar">
                </div>
            </form>
            <?php
                if(isset($_POST['guardar'])){
                    // echo 'funcionaaaaaaaa';
                    $peli_nombre = $_POST['peli_nombre'];
                    // echo $peli_nombre;
                    $peli_genero = $_POST['peli_genero'];
                    $peli_estreno = $_POST['peli_estreno'];
                    $peli_restricciones = $_POST['peli_restricciones'];
                    $peli_dire_id = $_POST['peli_dire_id'];
                    $peli_img = $_POST['peli_img'];

                    $query_guardar = "INSERT INTO peliculas (peli_nombre, peli_genero, peli_estreno, peli_restricciones, peli_dire_id, peli_img) VALUES ('{$peli_nombre}', '{$peli_genero}', '{$peli_estreno}', '{$peli_restricciones}', {$peli_dire_id}, '{$peli_img}')";
                    $query_guardar_res = mysqli_query($conexion, $query_guardar);

                    if(!$query_guardar_res){
                        die("Fallo en la conexión " . mysqli_error($conexion));
                    }

                }
            ?>
        </div>
    </section>
</body>
</html>