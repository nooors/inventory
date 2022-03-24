<div class="row justify-content-center">
    <div class="col">
        <h1 class="text-center">Tallas</h1>
        <a
            class="btn btn-dark float-right"
            href="index.php?controller=TallaController&action=crear">
            Crear nueva
        </a>
    </div>
</div>
    <div class="row justify-content-center">
        <table class="table mb-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <?=isset($_SESSION['login']) ? '<th>Acción</th>' : ''?>
            </tr>
            </thead>
                <?php while ($tall = $tallas->fetch_object()): ?>
                    <tr>
                        <td><?=$tall->id?></td>
                        <td><?=$tall->talla?></td>
                        <?php if(isset($_SESSION['login'])): ?>
                        <td>
                            <a class=" btn btn-info" href="<?=_URL_BASE_?>?controller=TallaController&action=crear&tallaId=<?=$tall->id?>">
                            Editar
                            </a>
                        <?php endif; ?>
                       </td>
                    </tr>
                <?php endwhile; ?>
        </table>
    </div>
</div>