<?php if (isset($_SESSION) && isset($_SESSION['marca'])): ?>
    <?php $title = $_SESSION['marca']; ?>
<?php endif; ?>

<div class="create">
    <h1 class="section-title">Categorías</h1>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'manage') : ?>
        <a class="create" href="index.php?controller=ModeloController&action=crear">
            Crear nueva
        </a>
    <?php endif; ?>
</div>
<?php if(isset($result) && !empty($result) && !is_null($result)): ?>
<div class="row justify-content-center">
    <table class="table mb-5 mt-3">
        <thead>
            <tr>
                <th>modelo</th>
                <th>categoria</th>
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
            <td><?=$modelo->categoria?></td>            
            <td><?=$modelo->familia?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php else: ?>
    <?="No hay productos de esta marca"?>
<?php endif; ?>