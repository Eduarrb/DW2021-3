<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Usuarios - Suscriptores</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <?php mostrar_msj(); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Correo</th>
                    <th>Convertir a Admin</th>
                    <th>Desactivar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    show_users_rol('suscriptor', 1, 'suscriptores');
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php usuarios_cambiar_rol('admin'); ?>
<?php usuarios_desactivar(); ?>
