<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">CATEGORIAS</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <div>
            <?php mostrar_msj(); ?>
        </div>
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
        <?php
            if(isset($_GET['edit'])){
                include(TEMPLATE_BACK . DS . "categorias_edit.php");
            }
            
            categoria_delete();
        ?>
    </div>
    <div class="col-md-6">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Categoría</th>
                </tr>
            </thead>
            <tbody>
                <?php show_categorias_admin(); ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".delete_link").on('click', function(){
            const id = $(this).attr('rel');
            const delete_url = "index.php?categorias&delete=" + id;
            $(".modal-title").html("Borrar Categoria");
            $(".modal-body").html("¿Estas seguro de borrar el elemento?");
            $(".btn_delete_link").attr("href", delete_url);
            $("#deleteModal").modal('show');
        });
    })
</script>

