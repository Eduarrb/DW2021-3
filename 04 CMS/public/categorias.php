<?php 
    require_once("../resources/config.php"); 
    include(TEMPLATE_FRONT . DS . "head.php");
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
            
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row noticias">
                        <!-- Blog post-->

                    </div>
                    <!-- Pagination-->
                    <nav aria-label="Pagination">
                        <hr class="my-0" />
                        <ul class="pagination justify-content-center my-4">
                            
                        </ul>
                    </nav>
                </div>
                <!-- Side widgets-->
                <?php include(TEMPLATE_FRONT . DS . "sidebar.php"); ?>
            </div>
        </div>
        <!-- Footer-->
        <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>