<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">AGREGAR NOTICIA</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="noti_titulo">Título</label>
                <input type="text" name="noti_titulo" id="noti_titulo" class="form-control">
            </div>
            <div class="form-group">
                <label for="noti_autor">Autor</label>
                <input type="text" name="noti_autor" id="noti_autor" class="form-control">
            </div>
            <div class="form-group">
                <label for="noti_cat_id">Categoría</label>
                <select name="noti_cat_id" id="noti_cat_id" class="form-control" required>
                    <option value="" disabled selected>Selecciona una categoria</option>
                    <?php categorias_mostrar_options(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="noti_resumen">Resumen</label>
                <textarea name="noti_resumen" id="noti_resumen" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="noti_contenido">Contenido</label>
                <textarea name="noti_contenido" id="noti_contenido" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="noti_img">Imagen</label>
                <input type="file" name="noti_img" id="noti_img" class="form-control">
            </div>
            <div class="form-group">
                <label for="noti_status">Estado</label>
                <select name="noti_status" id="noti_status" class="form-control" required>
                    <option value="" disabled selected>Selecciona un estado</option>
                    <option value="publicado">publicado</option>
                    <option value="pendiente">pendiente</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary btn-lg" name="guardar">
            </div>
        </form>
    </div>
</div>
<?php noticia_agregar(); ?>