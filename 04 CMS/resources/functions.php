<?php
    // ⚡⚡ FUNCIONES BASICAS
    function query($sql){
        global $conexion;
        return mysqli_query($conexion, $sql);
    }

    function confirmar($query){
        global $conexion;
        if(!$query){
            die("Fallo en la conexión " . mysqli_error($conexion));
        }
    }

    function fetch_array($query){
        return mysqli_fetch_array($query);
    }

    function limpiar_string($str){
        global $conexion;
        return mysqli_real_escape_string($conexion, $str);
    }

    function redirect($location){
        header("Location: $location");
    }

    function set_mensaje($msj){
        if(!empty($msj)){
            $_SESSION['mensaje'] = $msj;
        }
        else{
            $msj = '';
        }
    }

    function mostrar_msj(){
        if(isset($_SESSION['mensaje'])){
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']);
        }
    }

    function display_success_msj($msj){
        $msj = <<<DELIMITADOR
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> $msj.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
DELIMITADOR;
        return $msj;
    }

    // ⚡⚡ FUNCIONES FRONT
    function show_categorias(){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $categorias = <<<DELIMITADOR
                <li class="nav-item"><a class="nav-link" href="#">{$fila['cat_nombre']}</a></li> 
DELIMITADOR;
            echo $categorias;
        }
    }

    // ⚡⚡ FUNCIONES BACK
    function categorias_agregar(){
        if(isset($_POST['guardar'])){
            $cat_nombre = limpiar_string(trim($_POST['cat_nombre']));

            $query = query("INSERT INTO categorias (cat_nombre) VALUES ('{$cat_nombre}')");
            confirmar($query);
            // set_mensaje('categoria creada correctamente');
            set_mensaje(display_success_msj("Categoria agregada correctamente 😁"));
            redirect("index.php?categorias");
        }
    }

    function show_categorias_admin(){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $categorias = <<<DELIMITADOR
                <tr>
                    <td>{$fila['cat_id']}</td>
                    <td>{$fila['cat_nombre']}</td>
                    <td>
                        <a href="index.php?categorias&edit={$fila['cat_id']}" class="btn btn-small btn-success">editar</a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-small btn-danger">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $categorias;
        }
    }
?>