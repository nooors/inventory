<?php if(isset($control) && $control == true): ?>
<div
    class="row justify-content-center border border-right-0 border-left-0 border-bottom-0">
    <div class="alert alert-danger" role="alert">
        El proveedor ya existe.
    </div>
</div>
<?php endif; ?>

<div class="row align-content-center">
    <h2>Creación de proveedores</h2>
</div>
<div>
    <form
        action="index.php?controller=ProveedorController&action=<?=isset($edit) && $edit == true ? 'edit' : 'save'?>"
        method="POST">
        <div class="form-group">
            <label for="nombre">Nuevo proveedor</label>
            <input type="text" class="form-control" name="nombre" required="required" value="<?=isset($edit) && $edit == true ? $proveedor->nombre : '' ?>"/>
            <?php if(isset($edit) && $edit == true): ?>
                <input type="hidden" name="id" value="<?=$proveedor->id?>"/>
            <?php endif; ?>
            <small class="form-text text-muted">Introduce el nombre del proveedor</small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                class="form-control"
                name="email"
                placeholder="Lo podrás seleccionar más tarde"
                value="<?=isset($edit) && $edit == true ? $proveedor->email : '' ?>"/>
            <small class="form-text text-muted">Introduce email</small>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input
                type="text"
                class="form-control"
                name="telefono"
                placeholder="Lo podrás seleccionar más tarde"
                value="<?=isset($edit) && $edit == true ? $proveedor->telefono : '' ?>" />
            <small class="form-text text-muted">Introduce el número de teléfono</small>
        </div>
        <div class="form-group">
            <label for="contacto">Contacto</label>
            <input
                type="text"
                class="form-control"
                name="contacto"
                placeholder="Lo podrás seleccionar más tarde"
                value="<?=isset($edit) && $edit == true ? $proveedor->contacto : '' ?>"/>
            <small class="form-text text-muted">Introduce el nombre de la persona de contacto</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary"><?=isset($edit) && $edit == true ? 'Editar' : 'Crear'?></button>
        </div>
    </form>
</div>