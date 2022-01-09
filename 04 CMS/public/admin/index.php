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
                    
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include(TEMPLATE_BACK . DS . "footer.php"); ?> 