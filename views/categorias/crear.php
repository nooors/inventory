<?php if(isset($control) && $control == true): ?>
<div
    class="row justify-content-center border border-right-0 border-left-0 border-bottom-0">
    <div class="alert alert-danger" role="alert">
        La Categoría ya existe.
    </div>
</div>
<?php endif; ?>

<div class="row align-content-center">
    <h2>Creación de categorias</h2>
</div>
<div>
    <form
        action="index.php?controller=CategoriaController&action=<?=isset($edit) && $edit == true ? 'edit' : 'save'?>"
        method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="categoria">Nueva categoria</label>
            <input type="text" class="form-control" name="categoria" required="required" value="<?=isset($edit) && $edit == true ? $categoria->categoria : ''?>"/>
            <?php if(isset($edit) && $edit == true): ?>
                <input type="hidden" name="id" value="<?=$categoria->id?>"/>
                <?php endif; ?>
            <small class="form-text text-muted">Introduce el nombre de la categoría</small>
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen">
            <small class="form-text text-muted">Añade o cambia la imagen de categoría</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?=isset($edit) && $edit == true ? 'Editar' : 'Crear'?></button>
            <?php if(isset($edit) && $edit == true): ?>
                <button class="btn btn-danger float-right">
                    <a href="<?=_URL_BASE_?>/index.php?controller=CategoriaController&action=delete&id=<?=$categoria->id?>" style="color:white">
                    Eliminar
                    </a>
                </button>
                <?php endif; ?>
        </div>
    </form>
</div>