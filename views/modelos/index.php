<?php if (isset($_SESSION['colorId']) && !is_null($_SESSION['colorId'])) : ?>
    <?php unset($_SESSION['colorId']); ?>
<?php endif; ?>

<div class="create">
    <h1 class="section-title">Modelos</h1>
    <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'manage') : ?>
        <a class="create" href="index.php?controller=ModeloController&action=crear">
            Crear nuevo
        </a>
    <?php endif; ?>
</div>

<section>
    <?php if (isset($result) && !empty($result) && !is_null($result)) : ?>
        <?php foreach ($result as $modelo) : ?>
            <div class="image">
                <a href="<?= _URL_BASE_ ?>?controller=prendaController&action=indexByModel&modeloId=<?= $modelo->id ?>&modelo=<?= $modelo->modelo ?>">
                    <img src="assets/img/<?=$modelo->imagen?>">
                </a>
                <p><?= $modelo->modelo ?></p>

            </div>
            <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'edit') : ?>

                <a class="" href="<?= _URL_BASE_ ?>?controller=ModeloController&action=crear&modeloId=<?= $modelo->id ?>">
                    Editar
                </a>
            <?php endif; ?>

        <?php endforeach; ?>
    <?php else : ?>
        <?= "No hay modelos todavía" ?>
    <?php endif; ?>
</section>