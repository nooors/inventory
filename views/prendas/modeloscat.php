<?php if (isset($_SESSION) && isset($_SESSION['categoria'])): ?>
    <?php $title = $_SESSION['categoria']; ?>
<?php endif; ?>

<div class="create">
    <h1 class="section-title"><?=$title?></h1>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'manage') : ?>
        <a class="create" href="index.php?controller=ModeloController&action=crear">
            Crear nuevo
        </a>
        <?php endif; ?>
</div>

<section>
    
<?php if(isset($result) && !empty($result) && !is_null($result)): ?>
    <?php foreach ($result as $modelo) : ?>
        <div class="image">
            <a class="option" href="<?=_URL_BASE_?>?controller=prendaController&action=indexByModel&modeloId=<?=$modelo->id_modelo?>&modelo=<?=$modelo->modelo?>">
                <img src="assets/img/<?=$modelo->imagen?>">
            </a>
            <p><?=$modelo->modelo?></p>
            <p><?=$modelo->familia?></p>
        </div>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'edit') : ?>
        
        <a class="" href="<?= _URL_BASE_ ?>?controller=ModeloController&action=edit&modeloId=<?= $modelo->id?>">
        Editar
    </a>
    
    <?php endif; ?>
    
    <?php endforeach; ?>
<?php else: ?>
<?="No hay modelos en esta categoria"?>
<?php endif; ?>
</section>