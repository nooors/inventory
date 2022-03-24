<div class="row">
    <div class="col-5">
        <h1 class="bg-succes text-start mb-1"><?=isset($_SESSION['modelo']) ? $_SESSION['modelo'] : ''?></h1>
        <div>
        
        <?php if(isset($_SESSION['imagen']) && !is_null($_SESSION['imagen'])): ?>
            <img
                class="border-secondary img-thumbnail my-2"
                width="90%"
                src="<?=_URL_BASE_?>/assets/img/<?=$_SESSION['imagen']?>">
        <?php elseif(isset($imagenModelo) && !is_null($imagenModelo)): ?>
            <img
                class="border-secondary img-thumbnail my-2"
                width="90%"
                src="<?=_URL_BASE_?>/assets/img/<?=$imagenModelo?>">
        <?php else: ?>
            <img
                class="border-secondary img-thumbnail my-2"
                width="90%"
                src="<?=_URL_BASE_?>/assets/img/default.png">
        <?php endif; ?>
        </div>
        <div>
            <?=isset($_SESSION['categoria']) ? $_SESSION['categoria'] : ''?>
            /
            <?= isset($_SESSION['familia']) ? $_SESSION['familia'] : ''?>
        </div>
        <?php if(isset($_SESSION['login'])): ?>
        <div class="form-group">
            <form action="<?=_URL_BASE_?>/index.php?controller=PrendaController&action=updateImagen" method="POST" enctype="multipart/form-data">
                <input type="file" name="imagen">
                <small class="form-text text-muted">Añade o cambia la imagen del modelo</small>
                <input class="btn btn-info float-right mr-2 mb-5" type="submit" value="Editar"/>
            </form>
        </div>
        <?php endif; ?>
    </div>
    <div class="col">
        <h3>Colores</h3>

        <div class="row justify-content-start mb-5">
            <?php $colores = Utils::showColores(); ?>
            <form action="<?=_URL_BASE_?>/index.php?controller=PrendaController&action=indexByModelColor" method="POST">
                <?php while ($color = $colores->fetch_object()): ?>
                <button
                    name="color"
                    value="<?=$color->id?>"
                    style="background-color:#<?=$color->codigo?>"
                    title=<?=$color->color?>>
                    <svg width="30" height="50" class="mr-3">
                        <rect
                            width="30"
                            height="30"
                            style="fill:#<?=$color->codigo?>;"
                            alt="<?=$color->color?>"/>
                    </svg>
                </button>
                <?php endwhile; ?>
            </form>
        </div>
        <?php if(isset($prenda) || isset($_SESSION['colorId'])): ?>
            <table class="table text-center">
                <thead>
                    <th>Color</th>
                    <th>Talla</th>
                    <th>Cantidad</th>
                    <th>Modificar</th>
                </thead>
                <form
                    action="<?=_URL_BASE_?>/index.php?controller=PrendaController&action=updateCantidad"
                    method="POST">
                <?php if(!is_null($prenda) || !empty($prenda)): ?>
                    <?php foreach($prenda as $row): ?>
                        <tr>
                            <td><?=$row->color?></td>
                            <td>
                                <?=$row->talla?>
                            </td>
                            <td>
                                <?=$row->cantidad?>
                            </td>
                            <td>
                                <input type="hidden" name="id[]" value="<?=$row->id?>"/>
                                <div class="d-block">
                                    <input type="number" name="cantidad[]" value="<?=$row->cantidad?>" min="0"/>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h2>No hay prendas de este color</h2>
                <?php endif; ?>
                   

                </table>
                <input class="btn btn-dark float-right mr-2 mb-5" type="submit" value="Actualizar"/>
             
            </form>
        <?php endif; ?>

    </div>
</div>

<!--<td> <=$prenda->cantidad?> <button type="button" class="btn btn-dark btn-sm
ml-1">+</button> <button type="button" class="btn btn-dark btn-sm">-</button>
<form> <input type="hidden" name="id" value="<$prenda->id>"/> <input
type="hidden" name="cantidad" value="<$count>"/> </form> </td> -->