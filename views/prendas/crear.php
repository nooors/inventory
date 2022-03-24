<div class="row align-content-center">
    <div class="col">
        <h3>Creación de prendas</h3>
    </div>
</div>
<div>
    <form
        action="index.php?controller=PrendaController&action=save"
        method="POST"
        enctype="multipart/form-data">
        <div class="row">
            <div class="col">

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Escoge la categoria</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="categoria">
                        <?php $categorias = Utils::showCategorias() ?>
                        <?php while($categoria = $categorias->fetch_object()): ?>

                        <option value="<?=$categoria->id?>"><?=$categoria->categoria?></option>

                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="familias">Escoge la familia</label>
                    <select class="form-control" id="familias" name="familia">
                        <?php $familias = Utils::showFamilias() ?>
                        <?php while($familia = $familias->fetch_object()): ?>

                        <option value="<?=$familia->id?>"><?=$familia->familia?></option>

                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="form-group">
                    <label>Ecoge los colores</label>
                    <?php $colores = Utils::showColores(); ?>
                    <?php while($color = $colores->fetch_object()): ?>
                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="<?=$color->id?>"
                            id="color"
                            name="color[]"/>
                        <label class="form-check-label" for="color">
                            <?=$color->color?>
                        </label>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label>Ecoge las tallas</label>
                    <?php $tallas = Utils::showTallas(); ?>
                    <?php while($talla = $tallas->fetch_object()): ?>
                    <div class="form-check">

                        <input
                            class="form-check-input"
                            type="checkbox"
                            value="<?=$talla->id?>"
                            id="talla"
                            name="talla[]"/>
                        <label class="form-check-label" for="talla">
                            <?=$talla->talla?>
                        </label>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="proveedores">Escoge el proveedor</label>
                    <select class="form-control" id="proveedores" name="proveedor">
                        <?php $proveedores = Utils::showProveedores(); ?>
                        <?php while($proveedor = $proveedores->fetch_object()): ?>

                        <option value="<?=$proveedor->id?>"><?=$proveedor->nombre?></option>

                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="marcas">Escoge la marca</label>
                    <select class="form-control" id="marcas" name="marca">
                        <?php $marcas = Utils::showMarcas(); ?>
                        <?php while($marca = $marcas->fetch_object()): ?>

                        <option value="<?=$marca->id?>"><?=$marca->marca?></option>

                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="modelos">Escoge el modelo</label>
                    <select class="form-control" id="modelos" name="modelo">
                        <?php $modelos = Utils::showModelos(); ?>
                        <?php while($modelo = $modelos->fetch_object()): ?>

                        <option value="<?=$modelo->id?>"><?=$modelo->modelo?></option>

                        <?php endwhile; ?>
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="referencia">Introduce la referencia</label>
                    <input
                        type="text"
                        class="form-control"
                        name="referencia"
                        placeholder="Puedes dejarla en blanco"/>
                    <small class="form-text text-muted">Introduce la referencia</small>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="imagen">Sube o cambia la imágen</label>
                    <input type="file" name="imagen" />
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </form>
</div>