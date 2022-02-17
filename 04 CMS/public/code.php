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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Ingresa el código de verificación</h1>
                                    </div>
                                    <div>
                                        <?php
                                            validar_codigo();
                                        ?>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Ingresa tu código..." name="user_token" required>
                                        </div>
                                        <input type="submit" value="Continuar" class="btn btn-primary btn-user btn-block" name="restablecer">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">¡Crear una cuenta!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.html">¿Ya tienes una cuenta? ¡Inicia Sesión!</a>
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