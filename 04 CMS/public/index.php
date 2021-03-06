<?php 
    require_once("../resources/config.php"); 
    include(TEMPLATE_FRONT . DS . "head.php");
    // ("../resources/templates/front/head.php");
    // ("..\resources\templates\front/head.php");
?>
        <!-- Responsive navbar-->
        <?php include(TEMPLATE_FRONT . DS . "nav.php"); ?>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Bienvenidos a mi Blog Personal</h1>
                    <p class="lead mb-0">Esta página esta hecha en el curso de PHP</p>
                </div>
            </div>
        </header>
        
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <?php
                        $ultimo_id;
                        noticia_mostrar_ultimo();
                    ?>
            
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row noticias">
                        <!-- Blog post-->
                        <?php //noticias_mostrar_resto($ultimo_id); ?>

                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            <li class="page-item me-2"><a class="page-link" href="#">Pagína 1</a></li>
                            <!-- <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                            <li class="page-item"><a class="page-link" href="#!">15</a></li> -->
                            <li class="page-item ms-2"><a class="page-link" href="#">Página 2</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>
            </div>
        </div>
        <!-- Footer-->
        <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>