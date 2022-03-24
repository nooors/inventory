<?php if(isset($control) && $control == true): ?>
<div
    class="row justify-content-center border border-right-0 border-left-0 border-bottom-0">
    <div class="alert alert-danger" role="alert">
        La Marca ya existe.
    </div>
</div>
<?php endif; ?>

<div class="row align-content-center">
    <h2>Creación de Marcas</h2>
</div>
<div>
    <form action="index.php?controller=MarcaController&action=<?=isset($edit) && $edit == true ? 'edit' : 'save'?>" method="POST">
        <div class="form-group">
            <label for="marca">Nueva marca</label>
            <input type="text" class="form-control" name="marca" required="required" value="<?=isset($edit) && $edit == true ? $marca->marca : '' ?>" />
            <?php if(isset($edit) && $edit == true): ?>
                <input type="hidden" name="id" value="<?=$marca->id?>"/>
            <?php endif; ?>
            <small class="form-text text-muted">Introduce el nombre de la marca</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?=isset($edit) && $edit == true ? 'Editar' : 'Crear'?></button>
        </div>
    </form>
</div>