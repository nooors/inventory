<?php if(isset($control) && $control == true): ?>
<div
    class="row justify-content-center border border-right-0 border-left-0 border-bottom-0">
    <div class="alert alert-danger" role="alert">
        Esta marca ya tiene un modelo con este nombre.
    </div>
</div>
<?php endif; ?>

<div class="row align-content-center">
    <h3>Creación de modelos</h3>
</div>

<div>
    <form action="index.php?controller=ModeloController&action=<?=isset($edit) && $edit == true ? 'edit' : 'save'?>" method="POST">
        <div class="form-group">
            <label for="exampleFormControlSelect1">Escoge la marca</label>
            <select class="form-control" id="exampleFormControlSelect1" name="marca">
            <?php $marcas = Utils::showMarcas() ?>
                <?php while($marca = $marcas->fetch_object()): ?>
                   

                <option value="<?=$marca->id?>" <?=isset($modelo) && $marca->id == $modelo -> id_marca ? "selected = 'selected'" : ''?>><?=$marca->marca?></option>
                
               
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="modelo">Nuevo modelo</label>
            <input type="text" class="form-control" name="modelo" required="required" value="<?=isset($edit) && $edit == true ? $modelo->modelo : '' ?>"/>
            <?php if(isset($edit) && $edit == true): ?>
                <input type="hidden" name="id" value="<?=$modelo->id?>"/>
            <?php endif; ?>
            <small class="form-text text-muted">Introduce el nombre del modelo</small>
        </div>
        <div>
            <img src="<?=_URL_BASE_?>/assets/img/<?=$modelo->imagen?>" width="15%" />
        </div>
        <div class="form-group">
            <label for="imagen">Imagen</label>
            <input type="file" name="imagen">
            <small class="form-text text-muted">Añade o cambia la imagen del modelo</small>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary mb-4"><?=isset($edit) && $edit == true ? 'Editar' : 'Crear'?></button>
        <?php if(isset($edit) && $edit == true): ?>
                <button class="btn btn-danger float-right">
                    <a href="<?=_URL_BASE_?>/index.php?controller=ModeloController&action=delete&id=<?=$modelo->id?>" style="color:white">
                    Eliminar
                    </a>
                </button>
                <?php endif; ?>
        
        </div>
    </form>
</div>