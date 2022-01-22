<?php 
    require_once("../resources/config.php"); 
    include(TEMPLATE_FRONT . DS . "head.php");
?>
        <!-- Responsive navbar-->
        <?php include(TEMPLATE_FRONT . DS . "nav.php"); ?>
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <?php 
                        $fila = noticia_individual_mostrar(); 
                    ?>
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1">
                                <?php echo $fila['noti_titulo']; ?>
                            </h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Publicado en <?php echo fecha_formato($fila['noti_fecha']); ?> por <?php echo $fila['noti_autor']; ?></div>
                            <!-- Post categories-->
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                                </div>
                                <div>
                                <i class="fas fa-eye text-secondary"></i> <?php echo $fila['noti_vistas']; ?>
                                </div>
                            </div>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded" src="img/<?php echo $fila['noti_img']; ?>" alt="<?php echo $fila['noti_titulo']; ?>" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <?php echo $fila['noti_contenido']; ?>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <div>
                        <?php mostrar_msj(); ?>
                    </div>
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4" method="post">
                                    <div class="form-group mb-3">
                                        <input type="text" name="com_nombre" class="form-control" placeholder="Tu nombre">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="email" name="com_email" class="form-control" placeholder="Tu correo">
                                    </div>
                                    <div class="form-group mb-3">
                                        <textarea class="form-control" rows="3" placeholder="Tu mensaje" name="com_mensaje"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Enviar" class="btn btn-primary" name="enviar">
                                    </div>
                                </form>
                                <?php comentario_crear($fila['noti_id']); ?>
                                <!-- Single comment-->
                                <?php comentarios_mostrar($fila['noti_id']); ?>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Side widgets-->
                <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>
                
            </div>
        </div>
        <!-- Footer-->
        <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
        