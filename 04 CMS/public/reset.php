<?php 
    require_once("../resources/config.php"); 
    include(TEMPLATE_FRONT . DS . "head_user.php");
?>

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Cambiar Contraseña</h1>
                                    </div>
                                    <?php
                                        password_reset();
                                    ?>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingrese tu contraseña nueva" name="user_pass" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Confirma tu contraseña nueva" name="user_pass_confirmar" required>
                                        </div>
                                        
                                        <input type="submit" value="Continuar" class="btn btn-primary btn-user btn-block" name="confirmar">
                                        <input type="hidden" class="hide" name="user_token" value="<?php echo token_generador(); ?>">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">¿Olvidate tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">¡Crea una cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>