<?php if(isset($_SESSION['colorId']) && !is_null($_SESSION['colorId'])): ?>
    <?php unset($_SESSION['colorId']); ?>
<?php endif; ?>
<div class="row justify-content-center">
    <div class="col">
        <h1 class="text-center">Marcas</h1>
        <a
            class="btn btn-dark float-right"
            href="index.php?controller=ColorController&action=crear">
            Crear nueva
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <table class="table mb-5 mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Marca</th>
                <?=isset($_SESSION['login']) ? '<th>Acción</th>' : ''?>
            </tr>
        </thead>
        <?php while ($marca = $marcas->fetch_object()): ?>
        <tr>
            <td><?=$marca->id?></td>
            <td>
                <a href="<?=_URL_BASE_?>?controller=prendaController&action=indexByMarca&marcaId=<?=$marca->id?>&marca=<?=$marca->marca?>">
                    <?=$marca->marca?>
                </a>
            </td>
            <?php if(isset($_SESSION['login'])): ?>
                <td>
                    <a class=" btn btn-info" href="<?=_URL_BASE_?>?controller=MarcaController&action=crear&marcaId=<?=$marca->id?>">
                    Editar
                    </a>
                </td>
            <?php endif; ?>
            
        </tr>
        <?php endwhile; ?>
    </table>
</div>