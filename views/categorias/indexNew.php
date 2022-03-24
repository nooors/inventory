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

<?php $counter = 0; ?>
<?php while ($counter < count($result)): ?>
    <div class="row">
        <?php $counter_col = 1; ?>
        <?php while($counter_col <= 3): ?>
            <div class="col">
                <img class="img-thumbnail" width="30%" src="<?=_URL_BASE_?>/assets/img/<?=$result[$counter]->imagen?>" />
                <?=$result[$counter]->categoria?>
                <?php $counter++?>
            </div>
                <?php if($counter == count($result)): ?>
                    <?php break; ?>
                <?php endif; ?>
            <?php $counter_col++; ?>
        <?php endwhile; ?>
    </div>
<?php endwhile; ?>


   


