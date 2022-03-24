<?php if(isset($_SESSION['colorId']) && !is_null($_SESSION['colorId'])): ?>
    <?php unset($_SESSION['colorId']); ?>
<?php endif; ?>
<div class="row">
    <div class="col">
        <h1 class="bg-succes text-center mb-0">Categorías</h1>
        <a class="d-block float-right btn btn-dark mb-3" href="index.php?controller=CategoriaController&action=crear">
            Crear nueva
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th class="align-middle" align="center">Id</th>
                <th class="align-middle" align="center">Nombre</th>
                <th class="align-middle" align="center">Imagen</th>
                <?=isset($_SESSION['login']) ? '<th class="align-middle" align="center">Acción</th>' : ''?>
            </tr>
        </thead>
        <?php foreach($categorias as $cat): ?>
            <tr class="align-middle">
                <td class="align-middle" align="center"><?=$cat['id']?></td>
                <td class="align-middle" align="center">
                    <a href="<?=_URL_BASE_?>?controller=prendaController&action=indexByCategory&categoriaId=<?=$cat['id']?>&categoria=<?=$cat['categoria']?>">
                        <?=$cat['categoria']?>
                    </a>
                </td>
                <td>
                    <img class="img-thumbnail d-inline-block" src="<?=_URL_BASE_?>/assets/img/<?=$cat['imagen']?>" width="10%" />
                </td>
                <?php if(isset($_SESSION['login'])): ?>
                    <td align="center">
                        <a class="btn btn-info align-middle" href="<?=_URL_BASE_?>?controller=CategoriaController&action=crear&categoriaId=<?=$cat['id']?>">
                        Editar
                        </a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
