<?php if (isset($_SESSION['colorId']) && !is_null($_SESSION['colorId'])) : ?>
    <?php unset($_SESSION['colorId']); ?>
<?php endif; ?>


<div class="create">
    <h1 class="section-title">Categorías</h1>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'manage') : ?>
        <a class="create" href="index.php?controller=CategoriaController&action=crear">
            Crear nueva
        </a>
    <?php endif; ?>
</div>
    
<section>
<?php if(isset($result) && !empty($result) && !is_null($result)): ?>
    <?php foreach ($result as $cat) : ?>
        <div class="image">
            <a class="option" href="<?= _URL_BASE_ ?>?controller=prendaController&action=indexByCategory&categoriaId=<?=$cat->id?>&categoria=<?= $cat->categoria?>">
                <img src="assets/img/<?=$cat->imagen?>">
            </a>
            <p><?=$cat->categoria?></p>
        </div>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'edit') : ?>
        
        <a class="" href="<?= _URL_BASE_ ?>?controller=CategoriaController&action=crear&categoriaId=<?= $cat->id?>">
        Editar
        </a>
    
    <?php endif; ?>
    
    <?php endforeach; ?>
    <?php else: ?>
<?="No hay categorías todavía"?>
<?php endif; ?>
</section>