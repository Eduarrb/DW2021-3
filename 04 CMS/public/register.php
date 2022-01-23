<?php 
    require_once("../resources/config.php"); 
    include(TEMPLATE_FRONT . DS . "head_user.php");
?>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crear tu cuenta</h1>
                            </div>
                            <div>
                                <?php
                                    mostrar_msj();

                                    validar_user_reg();
                                ?>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="user_nombres" name="user_nombres"
                                            placeholder="Nombres" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="user_apellidos" name="user_apellidos"
                                            placeholder="Apellidos" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="user_email" name="user_email"
                                        placeholder="Correo electrónico" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="user_pass"
                                            id="user_pass" placeholder="Contraseña" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="user_pass_confirmar"
                                            id="user_pass_confirmar" placeholder="Confirmar Contraseña" required>
                                    </div>
                                </div>
                                <input type="submit" value="Resgistra tu cuenta" class="btn btn-primary btn-user btn-block" name="registrar">
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">¿Olvidate tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">¿Ya tienes una cuenta? Inicia sesión</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>