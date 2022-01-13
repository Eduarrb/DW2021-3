<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">NOTICIAS</h1>
</div>
<div class="row">
    <div class="col-md-12 mb-4">
        <a href="index.php?noticias_agregar" class="btn btn-primary">+ Agregar Noticia</a>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <?php mostrar_msj(); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Categoria</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Resumen</th>
                    <th>Contenido</th>
                    <th>IMG</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Vistas</th>
                </tr>
            </thead>
            <tbody>
                <?php noticias_mostrar_admin(); ?>
            </tbody>
        </table>
    </div>
</div>