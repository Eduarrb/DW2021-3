<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">CATEGORIAS</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <?php categorias_agregar(); ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="cat_nombre">Agregar Categoria</label>
                <input type="text" name="cat_nombre" id="cat_nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Guardar" class="btn btn-primary" name="guardar">
            </div>
        </form>
    </div>
</div>