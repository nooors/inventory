<div class="row justify-content-center">
    <div class="col">
        <h1 class="text-center">Colores</h1>
        <a
            class="btn btn-dark float-right"
            href="index.php?controller=ColorController&action=crear">
            Crear nuevo
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <table class="table mb-5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Código</th>
                <th>Orden</th>
                <?=isset($_SESSION['login']) ? '<th>Acción</th>' : ''?>
            </tr>
        </thead>
        <?php while ($col = $colores->fetch_object()): ?>
        <tr>
            <td><?=$col->id?></td>
            <td><?=$col->color?></td>
            <td><svg width="30" height="30" class="mr-3">
                    <rect width="30" height="30" style="fill:#<?=$col->codigo?>;stroke:black;stroke-widht:1" />
                </svg>
                # <?=$col->codigo?>
            </td>
            <td><?=$col->orden?></td>
            <?php if(isset($_SESSION['login'])): ?>
                 <td>
                     <a class=" btn btn-info" href="<?=_URL_BASE_?>?controller=ColorController&action=crear&colorId=<?=$col->id?>">
                     Editar
                     </a>
                </td>
            <?php endif; ?>
        </tr>
        <?php endwhile; ?>
    </table>
</div>