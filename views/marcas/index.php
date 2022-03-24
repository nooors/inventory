<?php if(isset($_SESSION['colorId']) && !is_null($_SESSION['colorId'])): ?>
    <?php unset($_SESSION['colorId']); ?>
<?php endif; ?>
<div class="create">
    <h1 class="section-title">Categorías</h1>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'manage') : ?>
        <a class="create" href="index.php?controller=MarcaController&action=crear">
            Crear nueva
        </a>
        <?php endif; ?>
    </div>

<section>
<?php if(isset($result) && !empty($result) && !is_null($result)): ?>
    <?php foreach ($result as $marca):?>
        <div class="image">
            <a class="option" href="<?=_URL_BASE_?>?controller=prendaController&action=indexByMarca&marcaId=<?=$marca->id?>&marca=<?=$marca->marca?>">
                <img src="assets/img/<?=$marca->imagen?>">
            </a>
            <p><?=$marca->marca?></p>
        </div>
        <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'edit'):?>
            
            <a class=" btn btn-info" href="<?=_URL_BASE_?>?controller=MarcaController&action=crear&marcaId=<?=$marca->id?>">
                Editar
            </a>

        <?php endif; ?>
        
    <?php endforeach; ?>
    <?php else: ?>
<?="No se hay marcas en la base de datos"?>
<?php endif; ?>
   

</section>