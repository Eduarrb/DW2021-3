<?php
    $meses = ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Dic'];

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

    function fecha_formato($fecha_db){
        global $meses;
        $fecha_array = explode("-", $fecha_db);
        return "{$meses[$fecha_array[1] - 1]} {$fecha_array[2]}, {$fecha_array[0]}";
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

    function noticia_mostrar_ultimo(){
        global $ultimo_id;
        $query = query("SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_status = 'publicado' ORDER BY noti_id DESC LIMIT 1");
        confirmar($query);
        $fila = fetch_array($query);
        $ultimo_id = $fila['noti_id'];
        $fecha_res = fecha_formato($fila['noti_fecha']);
        $noticia_ultima = <<<DELIMITADOR
            <div class="card mb-4">
                <a href="post.php?id={$fila['noti_id']}"><img class="card-img-top" src="img/{$fila['noti_img']}" alt="{$fila['noti_titulo']}" /></a>
                <div class="card-body">
                    <div class="small text-muted">{$fecha_res}</div>
                    <h2 class="card-title">{$fila['noti_titulo']}</h2>
                    <p class="card-text">{$fila['noti_resumen']}</p>
                    <a class="btn btn-primary" href="post.php?id={$fila['noti_id']}">Leer más →</a>
                </div>
            </div>
DELIMITADOR;
        echo $noticia_ultima;
    }

    function noticias_mostrar_resto($id_excluyente){
        $query = query("SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_id != {$id_excluyente} ORDER BY noti_id DESC");
        confirmar($query);
        while($fila = fetch_array($query)){
            $fecha_res = fecha_formato($fila['noti_fecha']);
            $noticias = <<<DELIMITADOR
                <div class="card mb-4">
                    <a href="post.php?id={$fila['noti_id']}"><img class="card-img-top" src="img/{$fila['noti_img']}" alt="{$fila['noti_titulo']}" /></a>
                    <div class="card-body">
                        <div class="small text-muted">{$fecha_res}</div>
                        <h2 class="card-title h4">{$fila['noti_titulo']}</h2>
                        <p class="card-text">{$fila['noti_resumen']}</p>
                        <a class="btn btn-primary" href="post.php?id={$fila['noti_id']}">Leer más →</a>
                    </div>
                </div>
DELIMITADOR;
            echo $noticias;
        }
    }

    // ⚡⚡ FUNCIONES ADMIN
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
                        <a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['cat_id']}">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $categorias;
        }
    }

    function categoria_editar($id){
        if(isset($_POST['editar'])){
            $cat_nombre = limpiar_string(trim($_POST['cat_nombre']));
            $query = query("UPDATE categorias SET cat_nombre = '{$cat_nombre}' WHERE cat_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("Categoría actualizada correctamente 😁"));
            redirect("index.php?categorias");
        }
    }
    
    function categoria_delete(){
        if(isset($_GET['delete'])){
            $id = limpiar_string(trim($_GET['delete']));
            $query = query("DELETE FROM categorias WHERE cat_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("Categoria eliminada correctamente 👍"));
            redirect("index.php?categorias");
        }
    }

    function noticias_mostrar_admin(){
        $query = query("SELECT * FROM noticias a INNER JOIN categorias b ON a.noti_cat_id = b.cat_id ORDER BY a.noti_id DESC");
        confirmar($query);
        while($fila = fetch_array($query)){
            $noticias = <<<DELIMITADOR
                <tr>
                    <td>{$fila['noti_id']}</td>
                    <td><a href="../post.php?id={$fila['noti_id']}" target="_blank">{$fila['noti_titulo']}</a></td>
                    <td>{$fila['noti_titulo']}</td>
                    <td>{$fila['noti_autor']}</td>
                    <td>{$fila['noti_resumen']}</td>
                    <td>{$fila['noti_contenido']}</td>
                    <td><img src="../img/{$fila['noti_img']}" alt="" width="150"></td>
                    <td>{$fila['noti_fecha']}</td>
                    <td>{$fila['noti_status']}</td>
                    <td>{$fila['noti_vistas']}</td>
                    <td><a href="#" class="btn btn-small btn-success">editar</a></td>
                    <td><a href="#" class="btn btn-small btn-danger">borrar</a></td>
                </tr>
DELIMITADOR;
            echo $noticias;
        }
    }
?>