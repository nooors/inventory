<?php if(isset($control) && $control == true): ?>
<div
    class="row justify-content-center border border-right-0 border-left-0 border-bottom-0">
    <div class="alert alert-danger" role="alert">
        El color ya existe.
    </div>
</div>
<?php endif; ?>

<div class="row align-content-center">
    <h2>Creación de colores</h2>
</div>
<div>
    <form action="index.php?controller=ColorController&action=<?=isset($edit) && $edit == true ? 'edit' : 'save'?>" method="POST">
        <div class="form-group">
            <label for="color">Nuevo color</label>
            <input type="text" class="form-control" name="color" required="required" value="<?=isset($edit) && $edit == true ? $color->color : ''?>"/>
            <small class="form-text text-muted">Introduce el nombre del color</small>
            <?php if(isset($edit) && $edit == true): ?>
                <input type="hidden" name="id" value="<?=$color->id?>"/>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="codigo">Código del color</label>
            <input
                type="text"
                class="form-control"
                name="codigo"
                placeholder="Lo podrás seleccionar más tarde"
                value="<?=isset($edit) && $edit == true ? $color->codigo : ''?>" />
            <small class="form-text text-muted">Introduce el código del color</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?=isset($edit) && $edit == true ? 'Editar' : 'Crear'?></button>
        </div>
    </form>
</div>