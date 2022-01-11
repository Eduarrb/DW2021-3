<?php
    $id = limpiar_string(trim($_GET['edit']));
    $query = query("SELECT * FROM categorias WHERE cat_id = {$id}");
    confirmar($query);
    $fila = fetch_array($query);
?>
<hr>
<form action="" method="post">
    <div class="form-group">
        <label for="cat_nombre">Editar categoria</label>
        <input type="text" name="cat_nombre" id="cat_nombre" class="form-control" required value="<?php echo $fila['cat_nombre']; ?>">
    </div>
    <div class="form-group">
        <input type="submit" value="Editar" class="btn btn-success" name="editar">
    </div>
</form>
<?php categoria_editar($id); ?>