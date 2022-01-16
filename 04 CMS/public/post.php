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
                                <?php //comentario_crear($fila['noti_id']); ?>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
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
        