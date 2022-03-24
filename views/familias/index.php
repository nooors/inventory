<?php if(isset($_SESSION['colorId']) && !is_null($_SESSION['colorId'])): ?>
    <?php unset($_SESSION['colorId']); ?>
<?php endif; ?>

<div class="create">
    <h1 class="section-title">Familías</h1>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'manage') : ?>
        <a class="create" href="index.php?controller=FamiliaController&action=crear">
            Crear nueva
        </a>
        <?php endif; ?>
    </div>
    
<section>
<?php if(isset($result) && !empty($result) && !is_null($result)): ?>
    <?php foreach ($result as $fam) : ?>
        <div class="image">
            <a class="option" href="<?= _URL_BASE_ ?>?controller=prendaController&action=indexByFamily&familiaId=<?=$fam->id?>&familia=<?= $fam->familia?>">
                <img src="assets/img/<?=$fam->imagen?>">
            </a>
            <p><?=$fam->familia?></p>
        </div>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'edit') : ?>
        
        <a class="" href="<?= _URL_BASE_ ?>?controller=FamiliaController&action=crear&familiaaId=<?= $fam->id?>">
        Editar
    </a>
    
    <?php endif; ?>
    
    <?php endforeach; ?>
    <?php else: ?>
<?="No se han creado familias todavía"?>
<?php endif; ?>
   
</section>