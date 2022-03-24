<?php if (isset($_SESSION) && isset($_SESSION['categoria'])): ?>
    <?php $title = $_SESSION['categoria']; ?>
<?php endif; ?>

<div class="row justify-content-center">
    <div class="col">
        <h1 class="text-center"><?=$title?></h1>
        <a
            class="btn btn-dark float-right"
            href="index.php?controller=ModeloController&action=crear">
            Crear nuevo
        </a>
    </div>
</div>
<?php if(isset($result) && !empty($result) && !is_null($result)): ?>
<div class="row justify-content-center">
    <table class="table mb-5 mt-3">
        <thead>
            <tr>
                <th>modelo</th>
                <th>familia</th>
            </tr>
        </thead>
        <?php foreach ($result as $modelo): ?>
        <tr>
            
            <td>
                <a href="<?=_URL_BASE_?>?controller=prendaController&action=indexByModel&modeloId=<?=$modelo->id_modelo?>&modelo=<?=$modelo->modelo?>">
                    <?=$modelo->modelo?>
                </a>
            </td>
                    
            <td><?=$modelo->familia?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php else: ?>
<?="No hay productos en esta categoría"?>
<?php endif; ?>