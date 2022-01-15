<?php 
    $fila = mostrar_noticia_editar();
?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">EDITAR NOTICIA</h1>
</div>
<div class="row">
    <div class="col-md-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="noti_titulo">Título</label>
                <input type="text" name="noti_titulo" id="noti_titulo" class="form-control" required value="<?php echo $fila['noti_titulo']; ?>">
            </div>
            <div class="form-group">
                <label for="noti_autor">Autor</label>
                <input type="text" name="noti_autor" id="noti_autor" class="form-control" required value="<?php echo $fila['noti_autor']; ?>">
            </div>
            <div class="form-group">
                <label for="noti_cat_id">Categoría</label>
                <select name="noti_cat_id" id="noti_cat_id" class="form-control" required>
                    <?php
                        mostrar_options_cat_editar($fila['noti_cat_id']); 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="noti_resumen">Resumen</label>
                <textarea name="noti_resumen" id="noti_resumen" cols="30" rows="5" class="form-control"><?php echo $fila['noti_resumen']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="noti_contenido">Contenido</label>
                <textarea name="noti_contenido" id="noti_contenido" cols="30" rows="5" class="form-control"><?php echo $fila['noti_contenido']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="noti_img">Imagen</label>
                <br>
                <img src="../img/<?php echo $fila['noti_img'] ?>" alt="" width="350" class="mb-2">
                <input type="file" name="noti_img" id="noti_img" class="form-control">
            </div>
            <div class="form-group">
                <label for="noti_status">Estado</label>
                <select name="noti_status" id="noti_status" class="form-control" required>
                    <option value="<?php echo $fila['noti_status']; ?>"><?php echo $fila['noti_status']; ?></option>
                    <?php mostrar_options_status_editar($fila['noti_status']); ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Editar" class="btn btn-success btn-lg" name="editar">
            </div>
        </form>
    </div>
</div>
<?php noticia_editar($fila['noti_id'], $fila['noti_img']); ?>