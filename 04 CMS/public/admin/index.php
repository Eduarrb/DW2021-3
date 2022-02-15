<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK . DS . "head.php"); ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include(TEMPLATE_BACK . DS . "sidebar.php"); ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include(TEMPLATE_BACK . DS . "topnav.php"); ?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?php

                        if(isset($_GET['categorias'])){
                            include(TEMPLATE_BACK . DS . "categorias.php");
                        }
                        if(isset($_GET['noticias'])){
                            include(TEMPLATE_BACK . DS . "noticias.php");
                        }
                        if(isset($_GET['noticias_agregar'])){
                            include(TEMPLATE_BACK . DS . "noticias_agregar.php");
                        }
                        if(isset($_GET['noticias_editar'])){
                            include(TEMPLATE_BACK . DS . "noticias_editar.php");
                        }
                        if(isset($_GET['comentarios'])){
                            include(TEMPLATE_BACK . DS . "comentarios.php");
                        }
                        if(isset($_GET['suscriptores'])){
                            include(TEMPLATE_BACK . DS . "user_suscriptores.php");
                        }
                        if(isset($_GET['administradores'])){
                            include(TEMPLATE_BACK . DS . "user_administradores.php");
                        }
                        if(isset($_GET['desactivados'])){
                            include(TEMPLATE_BACK . DS . "user_desactivados.php");
                        }
                    
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(TEMPLATE_BACK . DS . "footer.php"); ?> 