<?php
    $_SESSION['db_pass'] = '';
    $_SESSION['db_host'] = 'localhost';
    $_SESSION['db_user'] = 'root';
    $_SESSION['db_name'] = 'cms_2021_3';

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

    function display_success_msjV5($msj){
        $msj = <<<DELIMITADOR
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong> $msj
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
DELIMITADOR;
        return $msj;
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

    function display_danger_msj($msj){
        $msj = <<<DELIMITADOR
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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

    function contar_filas($query){
        return mysqli_num_rows($query);
    }

    function email_existe($email){
        $query = query("SELECT * FROM usuarios WHERE user_email = '{$email}'");
        confirmar($query);
        if(contar_filas($query) >= 1){
            return true;
        }
        return false;
    }
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    function send_email($email, $asunto, $mensaje, $headers = null){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'c81a2a50dfe3c4';
        $mail->Password = '718d0a2fba003a';
        $mail->Port = 465;
        $mail->SMTPSecure = 'tls';
        $mail->isHTML(true);
        $mail->CharSet = "UTF-8";

        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress($email);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        if($mail->send()){
            $emailSent = true;
        }
    }

    // ⚡⚡ FUNCIONES FRONT
    function validar_user_reg(){
        $min = 4;
        $max = 10;

        $errores = [];

        if(isset($_POST['registrar'])){
            $user_nombres = limpiar_string(trim($_POST['user_nombres']));
            $user_apellidos = limpiar_string(trim($_POST['user_apellidos']));
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_pass_confirmar = limpiar_string(trim($_POST['user_pass_confirmar']));

            if(strlen($user_nombres) < $min){
                $errores[] = "Tus nombres no deben tener menos de {$min} caracteres";
            }
            if(strlen($user_nombres) > $max){
                $errores[] = "Tus nombres no deben tener más de {$max} caracteres";
            }
            if(strlen($user_apellidos) < $min){
                $errores[] = "Tus apellidos no deben tener menos de {$min} caracteres";
            }
            if(strlen($user_apellidos) > $max){
                $errores[] = "Tus apellidos no deben tener más de {$max} caracteres";
            }
            if(email_existe($user_email)){
                $errores[] = "Lo sentimos, el correo {$user_email} ya existe 😢";
            }
            if($user_pass != $user_pass_confirmar){
                $errores[] = "Las contraseñas ingresadas deben ser iguales";
            }

            // echo count($errores);
            // print_r($errores);
            if(!empty($errores)){
                foreach($errores as $error){
                    echo display_danger_msj($error);
                }
            } else {
                if(registro_usuario($user_nombres, $user_apellidos, $user_email, $user_pass)){
                    set_mensaje(display_success_msj("Registro satisfactorio, por favor revisa tu correo o spam para la activación de tu cuenta. Esto puede tardar unos minutos"));
                    redirect("register.php");
                } else {
                    set_mensaje(display_danger_msj("Lo sentimos, no pudimos registrar tu cuenta. Intentelo más tarde"));
                    redirect("register.php");
                }
            }
        }
    }

    function registro_usuario($nombres, $apellidos, $correo, $pass){
        $user_nombres = limpiar_string(trim($nombres));
        $user_apellidos = limpiar_string(trim($apellidos));
        $user_email = limpiar_string(trim($correo));
        $user_pass = limpiar_string(trim($pass));

        $user_token = md5($user_email);
        $user_pass = password_hash($user_pass, PASSWORD_BCRYPT, array('cost' => 12));
        $query = query("INSERT INTO usuarios (user_nombres, user_apellidos, user_email, user_pass, user_token, user_rol) VALUES ('{$user_nombres}', '{$user_apellidos}', '{$user_email}', '{$user_pass}', '{$user_token}', 'suscriptor')");
        confirmar($query);
        $mensaje = "Por favor pulsa o has click en el enlace para activar tu cuenta. \n<a href='http://localhost/dw2021-3/04%20CMS/public/activate.php?email={$user_email}&token={$user_token}' target='_blank'>Activar cuenta</a>";
        $headers = "De: noreply@tudominio.com";
        send_email($user_email, 'Activación de cuenta', $mensaje, $headers);
        return true;
        // return false;
        // mas codigo de registro
    }

    function activar_usuario(){
        if(isset($_GET['email']) && isset($_GET['token'])){
            $user_email = limpiar_string(trim($_GET['email']));
            $user_token = limpiar_string(trim($_GET['token']));

            // echo $user_email . " " . $user_token;
            $query = query("SELECT user_id FROM usuarios WHERE user_email = '{$user_email}' AND user_token = '{$user_token}'");
            confirmar($query);
            $fila = fetch_array($query);
            $user_id = $fila['user_id'];
            if(contar_filas($query) == 1){
                $query = query("UPDATE usuarios SET user_status = 1, user_token = '' WHERE user_id = {$user_id}");
                confirmar($query);
                set_mensaje(display_success_msj("Su cuenta ha sido verificada y activada, por favor inicie sesión"));
                redirect("login.php");
            } else {
                set_mensaje(display_danger_msj("Los datos ingresados son erroneos. Vuelva a intentarlo"));
                redirect("register.php");
            }
        }
    }

    function validar_user_login(){
        if(isset($_POST['login'])){
            $user_email = limpiar_string(trim($_POST['user_email']));
            $user_pass = limpiar_string(trim($_POST['user_pass']));
            $user_recordarme = isset($_POST['user_recordarme']);

            if(login_user($user_email, $user_pass, $user_recordarme)){
                redirect('./');
            } else {
                set_mensaje(display_danger_msj("¡Tu correo o password son incorrectos 😢😢!"));
                redirect("login.php");
            }
        }
    }

    function login_user($email, $pass, $recordarme){
        $query = query("SELECT * from usuarios WHERE user_email = '{$email}' AND user_status = 1");
        confirmar($query);
        if(contar_filas($query) == 1){
            $fila = fetch_array($query);
            $user_id = $fila['user_id'];
            $user_pass = $fila['user_pass'];
            $user_rol = $fila['user_rol'];
            $user_nombres = $fila['user_nombres'];
            $user_apellidos = $fila['user_apellidos'];

            if(password_verify($pass, $user_pass)){
                if($recordarme == 'on'){
                    setcookie('email', $email, time() + 86400);
                } else {
                    setcookie('email', $email, time() + 600);
                }
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_nombres'] = $user_nombres;
                $_SESSION['user_apellidos'] = $user_apellidos;
                $_SESSION['user_rol'] = $user_rol;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function show_categorias(){
        $query = query("SELECT * FROM categorias");
        confirmar($query);
        while($fila = fetch_array($query)){
            $categorias = <<<DELIMITADOR
                <li class="nav-item">
                    <a class="nav-link" href="categorias.php?cat={$fila['cat_id']}">{$fila['cat_nombre']}</a>
                </li> 
DELIMITADOR;
            echo $categorias;
        }
    }

    function noticia_mostrar_ultimo(){
        global $ultimo_id;
        $query = query("SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_status = 'publicado' ORDER BY noti_id DESC LIMIT 1");
        confirmar($query);
        $fila = fetch_array($query);
        if(!empty($fila)){
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
    }


    // ⚡⚡ ya no son funcionales
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

    // ⚡⚡ ya no son funcionales
    function noticias_mostrar_porCategoria(){
        if(isset($_GET['cat'])){
            $cat_id = limpiar_string(trim($_GET['cat']));
            $query = query("SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_cat_id = {$cat_id} AND noti_status = 'publicado' ORDER BY noti_id DESC");
            confirmar($query);
            if(contar_filas($query) == 0){
                echo "<div class='col-md 12 text-center pt-4 pb-4'>Ninguna publicacion encontrada referente a la categoria 😢😢</div>";
            } else {
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
        }
    }

    function noticias_buscar(){
        if(isset($_GET['noti_titulo'])){
            $noti_titulo = limpiar_string(trim($_GET['noti_titulo']));
            $query = query("SELECT noti_id, noti_img, noti_fecha, noti_titulo, noti_resumen FROM noticias WHERE noti_titulo LIKE '%{$noti_titulo}%' AND noti_status = 'publicado' ORDER BY noti_id DESC");
            confirmar($query);
            if(contar_filas($query) == 0){
                echo "<div class='col-md 12 text-center pt-4 pb-4'>Ninguna publicacion encontrada referente al título 😢😢</div>";
            } else {
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
        }
    }


    function noticia_individual_mostrar(){
        if(isset($_GET['id'])){
            $id = limpiar_string(trim($_GET['id']));
            $query = query("UPDATE noticias SET noti_vistas = noti_vistas + 1 WHERE noti_id = {$id}");
            confirmar($query);
            $query = query("SELECT * FROM noticias a INNER JOIN usuarios b ON a.noti_user_id = b.user_id WHERE noti_id = {$id}");
            confirmar($query);
            return $fila = fetch_array($query);
        } else {
            redirect('./');
        }
    }

    function comentario_crear($noti_id, $user_id){
        if(isset($_POST['enviar'])){
            $com_mensaje = limpiar_string(trim($_POST['com_mensaje']));

            $query = query("INSERT INTO comentarios(com_noti_id, com_user_id, com_mensaje, com_status, com_fecha) VALUES ({$noti_id}, {$user_id}, '{$com_mensaje}', 'pendiente', NOW())");
            confirmar($query);
            set_mensaje(display_success_msjV5('Tu comentario a sido enviado satisfactoriamente. Espere la aprobación del admin'));
            redirect("post.php?id={$noti_id}");
        }
    }

    function comentarios_mostrar($noti_id){
        $query = query("SELECT CONCAT(b.user_nombres, ' ', b.user_apellidos) AS usuario, a.com_mensaje, b.user_img FROM comentarios a INNER JOIN usuarios b ON a.com_user_id = b.user_id WHERE com_noti_id = {$noti_id} AND com_status = 'aprobado'");
        confirmar($query);
        while($fila = fetch_array($query)){
            $user_img = $fila['user_img'];
            if(empty($user_img)){
                $user_img = 'https://dummyimage.com/50x50/ced4da/6c757d.jpg';
            }
            $comentarios = <<<DELIMITADOR
                <div class="d-flex mb-4">
                    <div class="flex-shrink-0"><img class="rounded-circle" src="{$user_img}" alt="..." / width="50"></div>
                    <div class="ms-3">
                        <div class="fw-bold">{$fila['usuario']}</div>
                        {$fila['com_mensaje']}
                    </div>
                </div>
DELIMITADOR;
            echo $comentarios;
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
    function elemento_delete($tabla, $campo, $imgCampo = null){
        if(isset($_GET['delete'])){
            $id = limpiar_string(trim($_GET['delete']));
            if($imgCampo != null){
                $query = query("SELECT * FROM {$tabla} WHERE {$campo} = {$id}");
                confirmar($query);
                $fila = fetch_array($query);
                $img = $fila[$imgCampo];
                $imgLocation = "../img/{$img}";
                unlink($imgLocation);
            }
            $query = query("DELETE FROM {$tabla} WHERE {$campo} = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj("Elemento eliminado correctamente 👍"));
            redirect("index.php?{$tabla}");
        }
    }

    function noticias_mostrar_admin(){
        if($_SESSION['user_rol'] == 'god'){
            $query = query("SELECT * FROM noticias a INNER JOIN categorias b ON a.noti_cat_id = b.cat_id INNER JOIN usuarios c ON a.noti_user_id = c.user_id  ORDER BY a.noti_id DESC");
            confirmar($query);
        } else {
            $query = query("SELECT * FROM noticias a INNER JOIN categorias b ON a.noti_cat_id = b.cat_id INNER JOIN usuarios c ON a.noti_user_id = c.user_id WHERE c.user_id = {$_SESSION['user_id']} ORDER BY a.noti_id DESC");
            confirmar($query);
        }
        while($fila = fetch_array($query)){
            $noticias = <<<DELIMITADOR
                <tr>
                    <td>{$fila['noti_id']}</td>
                    <td><a href="../categorias.php?id={$fila['noti_cat_id']}" target="_blank">{$fila['cat_nombre']}</a></td>
                    <td><a href="../post.php?id={$fila['noti_id']}" target="_blank">{$fila['noti_titulo']}</a></td>
                    <td>{$fila['user_nombres']} {$fila['user_apellidos']}</td>
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

            $query = query("INSERT INTO noticias(noti_cat_id, noti_user_id, noti_titulo, noti_resumen, noti_contenido, noti_fecha, noti_img, noti_status) VALUES ({$noti_cat_id}, {$_SESSION['user_id']},'{$noti_titulo}', '{$noti_resumen}', '{$noti_contenido}', NOW(), '{$noti_img}', '{$noti_status}')");
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

    function comentarios_mostrar_admin(){
        $query = query("SELECT a.com_id, b.noti_id, b.noti_titulo, CONCAT(c.user_nombres, ' ', c.user_apellidos) AS usuario, a.com_mensaje, a.com_fecha, a.com_status FROM comentarios a INNER JOIN noticias b ON a.com_noti_id = b.noti_id INNER JOIN usuarios c ON a.com_user_id = c.user_id WHERE a.com_status = 'pendiente' ORDER BY a.com_id DESC");
        confirmar($query);
        while($fila = fetch_array($query)){
            $comentarios = <<<DELIMITADOR
                <tr>
                    <td>
                        <a href="../post.php?id={$fila['noti_id']}" target="_blank">{$fila['noti_titulo']}</a>
                    </td>
                    <td>{$fila['usuario']}</td>
                    <td>{$fila['com_mensaje']}</td>
                    <td>{$fila['com_fecha']}</td>
                    <td>{$fila['com_status']}</td>
                    <td>
                        <a href="index.php?comentarios&aprobar={$fila['com_id']}" class="btn btn-small btn-success">aprobar</a>
                    </td>
                    <td>
                        <a href="javascript:void(0)" class="btn btn-small btn-danger delete_link" rel="{$fila['com_id']}" table="comentarios">borrar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $comentarios;
        }
    }

    function comentario_aprobar(){
        if(isset($_GET['aprobar'])){
            $com_id = limpiar_string(trim($_GET['aprobar']));
            $query = query("UPDATE comentarios SET com_status = 'aprobado' WHERE com_id = {$com_id}");
            confirmar($query);
            set_mensaje(display_success_msj('Comentario aprobado correctamente 😁😁'));
            redirect('index.php?comentarios');
        }
    }

    function show_users_rol($rol, $estado, $url){
        $query = query("SELECT * FROM usuarios WHERE user_rol = '{$rol}' AND user_status = {$estado}");
        confirmar($query);
        while($fila = fetch_array($query)){
            $usuarios = <<<DELIMITADOR
                <tr>
                    <td>{$fila['user_nombres']}</td>
                    <td>{$fila['user_apellidos']}</td>
                    <td>{$fila['user_email']}</td>
                    <td>
                        <a href="index.php?{$url}&admin={$fila['user_id']}" class="btn btn-small btn-success">Cambiar</a>
                    </td>
                    <td>
                        <a href="index.php?{$url}&deni={$fila['user_id']}" class="btn btn-small btn-danger">Desactivar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $usuarios;
        }
    }
    function show_users_desactivados(){
        $query = query("SELECT * FROM usuarios WHERE user_status = 0");
        confirmar($query);
        while($fila = fetch_array($query)){
            $usuarios = <<<DELIMITADOR
                <tr>
                    <td>{$fila['user_nombres']}</td>
                    <td>{$fila['user_apellidos']}</td>
                    <td>{$fila['user_email']}</td>
                    <td>{$fila['user_rol']}</td>
                    <td>
                        <a href="index.php?desactivados&enable={$fila['user_id']}" class="btn btn-small btn-success">Activar</a>
                    </td>
                </tr>
DELIMITADOR;
            echo $usuarios;
        }
    }
    function usuarios_cambiar_rol($rol){
        if(isset($_GET['admin']) && isset($_GET['suscriptores'])){
            $id = limpiar_string(trim($_GET['admin']));
            $query = query("UPDATE usuarios SET user_rol = 'admin' WHERE user_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj('El cambio de rol se hizo correctamente'));
            redirect('index.php?administradores');
        }
        if(isset($_GET['admin']) && isset($_GET['administradores'])){
            $id = limpiar_string(trim($_GET['admin']));
            $query = query("UPDATE usuarios SET user_rol = 'suscriptor' WHERE user_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj('El cambio de rol se hizo correctamente'));
            redirect('index.php?suscriptores');
        }
    }
    function usuarios_desactivar(){
        if(isset($_GET['deni'])){
            $id = limpiar_string(trim($_GET['deni']));
            $query = query("UPDATE usuarios SET user_status = 0 WHERE user_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj('Usuario desactivado con exito'));
            redirect('index.php?desactivados');
        }
    }
    function usuarios_activar(){
        if(isset($_GET['enable'])){
            $id = limpiar_string(trim($_GET['enable']));
            $query = query("UPDATE usuarios SET user_status = 1 WHERE user_id = {$id}");
            confirmar($query);
            set_mensaje(display_success_msj('Usuario reactivado con exito'));
            redirect('index.php?desactivados');
        }
    }

?>