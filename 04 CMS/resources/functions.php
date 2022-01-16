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
        $query = query("SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_id != {$id_excluyente} AND noti_status = 'publicado' ORDER BY noti_id DESC");
        confirmar($query);
        while($fila = fetch_array($query)){
            $fecha_res = fecha_formato($fila['noti_fecha']);
            $noticias = <<<DELIMITADOR
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="post.php?id={$fila['noti_id']}"><img class="card-img-top" src="img/{$fila['noti_img']}" alt="{$fila['noti_titulo']}" /></a>
                        <div class="card-body">
                            <div class="small text-muted">{$fecha_res}</div>
                            <h2 class="card-title h4">{$fila['noti_titulo']}</h2>
                            <p class="card-text">{$fila['noti_resumen']}</p>
                            <a class="btn btn-primary" href="post.php?id={$fila['noti_id']}">Leer más →</a>
                        </div>
                    </div>
                </div>
DELIMITADOR;
            echo $noticias;
        }
    }

    function noticia_individual_mostrar(){
        if(isset($_GET['id'])){
            $id = limpiar_string(trim($_GET['id']));
            $query = query("UPDATE noticias SET noti_vistas = noti_vistas + 1 WHERE noti_id = {$id}");
            confirmar($query);
            $query = query("SELECT * FROM noticias WHERE noti_id = {$id}");
            confirmar($query);
            return $fila = fetch_array($query);
        }
    }

    function comentario_crear($noti_id){
        if(isset($_POST['enviar'])){
            $com_nombre = limpiar_string(trim($_POST['com_nombre']));
            $com_email = limpiar_string(trim($_POST['com_email']));
            $com_mensaje = limpiar_string(trim($_POST['com_mensaje']));

            $query = query("INSERT INTO comentarios(com_noti_id, com_nombre, com_email, com_mensaje, com_status, com_fecha) VALUES ({$noti_id}, '{$com_nombre}', '{$com_email}', '{$com_mensaje}', 'pendiente', NOW())");
            confirmar($query);
            set_mensaje(display_success_msj('Tu comentario a sido enviado satisfactoriamente. Espere la aprobación del admin'));
            redirect("post.php?id={$noti_id}");
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
                        <a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['cat_id']}" table="categorias">borrar</a>
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
    
    // ⚡⚡ funcion global para eliminar data
    function elemento_delete($tabla, $campo){
        if(isset($_GET['delete'])){
            $id = limpiar_string(trim($_GET['delete']));
            $query = query("DELETE FROM {$tabla} WHERE {$campo} = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("Elemento eliminado correctamente 👍"));
            redirect("index.php?{$tabla}");
        }
    }

    function noticias_mostrar_admin(){
        $query = query("SELECT * FROM noticias a INNER JOIN categorias b ON a.noti_cat_id = b.cat_id ORDER BY a.noti_id DESC");
        confirmar($query);
        while($fila = fetch_array($query)){
            $noticias = <<<DELIMITADOR
                <tr>
                    <td>{$fila['noti_id']}</td>
                    <td><a href="../categorias.php?id={$fila['noti_cat_id']}" target="_blank">{$fila['cat_nombre']}</a></td>
                    <td><a href="../post.php?id={$fila['noti_id']}" target="_blank">{$fila['noti_titulo']}</a></td>
                    <td>{$fila['noti_autor']}</td>
                    <td>{$fila['noti_resumen']}</td>
                    <td>{$fila['noti_contenido']}</td>
                    <td><img src="../img/{$fila['noti_img']}" alt="" width="150"></td>
                    <td>{$fila['noti_fecha']}</td>
                    <td>{$fila['noti_status']}</td>
                    <td>{$fila['noti_vistas']}</td>
                    <td><a href="index.php?noticias_editar&edit={$fila['noti_id']}" class="btn btn-small btn-success">editar</a></td>
                    <td><a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['noti_id']}" table="noticias">borrar</a></td>
                </tr>
DELIMITADOR;
            echo $noticias;
        }
    }

    function categorias_mostrar_options(){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $categorias = <<<DELIMITADOR
                <option value="{$fila['cat_id']}">{$fila['cat_nombre']}</option>
DELIMITADOR;
            echo $categorias;
        }
    }

    function noticia_agregar(){
        if(isset($_POST['guardar'])){
            $noti_titulo = limpiar_string(trim($_POST['noti_titulo']));
            $noti_autor = limpiar_string(trim($_POST['noti_autor']));
            $noti_cat_id = limpiar_string(trim($_POST['noti_cat_id']));
            $noti_resumen = limpiar_string(trim($_POST['noti_resumen']));
            $noti_contenido = limpiar_string(trim($_POST['noti_contenido']));
            $noti_img = limpiar_string(trim($_FILES['noti_img']['name']));
            $noti_img_tmp = $_FILES['noti_img']['tmp_name'];
            $noti_status = limpiar_string(trim($_POST['noti_status']));

            // gatito.png => [gatito, png]
            // 35486784354.png
            $noti_img = md5(uniqid()) . "." . explode('.', $noti_img)[1];

            move_uploaded_file($noti_img_tmp, "../img/{$noti_img}");

            $query = query("INSERT INTO noticias(noti_cat_id, noti_titulo, noti_resumen, noti_contenido, noti_fecha, noti_img, noti_autor, noti_status) VALUES ({$noti_cat_id}, '{$noti_titulo}', '{$noti_resumen}', '{$noti_contenido}', NOW(), '{$noti_img}', '{$noti_autor}', '{$noti_status}')");
            confirmar($query);
            set_mensaje(display_success_msj('La notica fue guardada exitosamente'));
            redirect('index.php?noticias');
        }
    }

    function mostrar_noticia_editar(){
        if(isset($_GET['noticias_editar']) && isset($_GET['edit'])){
            $id = limpiar_string(trim($_GET['edit']));
            $query = query("SELECT * FROM noticias WHERE noti_id = {$id}");
            confirmar($query);
            return $fila = fetch_array($query);
        }
        else{
            redirect('index.php?noticias');
        }
    }

    function mostrar_options_cat_editar($table_cat_id){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $cat_id = $fila['cat_id'];
            $cat_nombre = $fila['cat_nombre'];

            if($cat_id == $table_cat_id){
                ?>
                    <option value="<?php echo $cat_id; ?>" selected><?php echo $cat_nombre; ?></option>
            <?php }
            else{
                ?>
                    <option value="<?php echo $cat_id; ?>"><?php echo $cat_nombre; ?></option>
            <?php }
        }
    }

    function mostrar_options_status_editar($table_estado){
        if($table_estado == 'publicado'){
            ?>
                <option value="pendiente">pendiente</option>
        <?php }
        else{
            ?>
                <option value="publicado">publicado</option>
        <?php }
    }

    function noticia_editar($noti_id, $img){
        if(isset($_POST['editar'])){
            $noti_titulo = limpiar_string(trim($_POST['noti_titulo']));
            $noti_autor = limpiar_string(trim($_POST['noti_autor']));
            $noti_cat_id = limpiar_string(trim($_POST['noti_cat_id']));
            $noti_resumen = limpiar_string(trim($_POST['noti_resumen']));
            $noti_contenido = limpiar_string(trim($_POST['noti_contenido']));
            $noti_img = limpiar_string(trim($_FILES['noti_img']['name']));
            $noti_img_tmp = $_FILES['noti_img']['tmp_name'];
            $noti_status = limpiar_string(trim($_POST['noti_status']));

            if(empty($noti_img)){
                $noti_img = $img;
            } else {
                $imgLocation = "../img/{$img}";
                unlink($imgLocation);
                $noti_img = md5(uniqid()) . "." . explode('.', $noti_img)[1];
                move_uploaded_file($noti_img_tmp, "../img/{$noti_img}");
            }

            $query = query("UPDATE noticias SET noti_cat_id = {$noti_cat_id}, noti_titulo = '{$noti_titulo}', noti_resumen = '{$noti_resumen}', noti_contenido = '{$noti_contenido}', noti_img = '{$noti_img}', noti_autor = '{$noti_autor}', noti_status = '{$noti_status}' WHERE noti_id = {$noti_id}");
            confirmar($query);
            set_mensaje(display_success_msj('Noticia actualizada correctamente'));
            redirect('index.php?noticias');
        }
    }
?>