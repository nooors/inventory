<?php if(isset($_SESSION['colorId']) && !is_null($_SESSION['colorId'])): ?>
    <?php unset($_SESSION['colorId']); ?>
<?php endif; ?>
<div class="row justify-content-center">
    <div class="col">
        <h1 class="text-center">Familias</h1>
        <a
            class="btn btn-dark float-right"
            href="index.php?controller=ColorController&action=crear">
            Crear nueva
        </a>
    </div>
</div>
    <div class="row justify-content-center">
        <table class="table mb-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Familia</th>
                    <?=isset($_SESSION['login']) ? '<th>Acción</th>' : ''?>
                </tr>
            </thead>
            <?php while ($fam = $familias->fetch_object()): ?>
                <tr>
                    <td><?=$fam->id?></td>
                    <td>
                        <a href="<?=_URL_BASE_?>?controller=prendaController&action=indexByFamily&familiaId=<?=$fam->id?>&familia=<?=$fam->familia?>">
                            <?=$fam->familia?>
                        </a>
                    </td>
                    <?php if(isset($_SESSION['login'])): ?>
                    <td>
                        <a class=" btn btn-info" href="<?=_URL_BASE_?>?controller=FamiliaController&action=crear&familiaId=<?=$fam->id?>">
                        Editar
                     </a>
                    <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>