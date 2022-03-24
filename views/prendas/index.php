<div class="row justify-content-center">
    <div class="col">
        <h1 class="text-center">Prendas</h1>
        <a class="btn btn-dark float-right" href="index.php?controller=PrendaController&action=crear">
            Crear nueva
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <table class="table mb-5">
        <thead>
            <tr class="fixed">
                <th>Id</th>
                <th>Categoría</th>
                <th>Familia</th>
                <th>Modelo</th>
                <th>Talla</th>
                <th>Color</th>
                <th>Cantidad</th>
                <?=isset($_SESSION['login']) ? '<th>Acción</th>' : ''?>

            </tr>
        </thead>
        <?php while ($pren = $prendas->fetch_object()): ?>
        <tr>
            <td><?=$pren->id?></td>
            <td><?=$pren->Categoria?></td>
            <td><?=$pren->Familia?></td>
            <td><?=$pren->Modelo?></td>
            <td><?=$pren->Talla?></td>
            <td>
                <svg width="30" height="30" class="mr-3">
                    <rect width="30" height="30" style="fill:#<?=$pren->Codigo?>;stroke:black;stroke-widht:1" />
                </svg><?=$pren->Color?>
            </td>
            <td><?=$pren->Cantidad?></td>
            <?php if(isset($_SESSION['login'])): ?>
                <td>
                    <a class=" btn btn-danger" href="<?=_URL_BASE_?>?controller=PrendaController&action=delete&prendaId=<?=$pren->id?>">
                    Eiminar
                    </a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endwhile; ?>
    </table>
</div>