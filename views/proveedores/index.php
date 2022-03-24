<h1>Proveedores</h2>
    <section>
        <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'manage') : ?>
            <a class="" href="index.php?controller=ColorController&action=crear">
                Crear nuevo
            </a>
        <?php endif; ?>
        <?php if (isset($result) && !empty($result) && !is_null($result)) : ?>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Persona Contacto</th>
                    <?= isset($_SESSION['login']) ? '<th>Acción</th>' : '' ?>
                </tr>
                <?php foreach ($result as $prov) : ?>
                    <tr>
                        <td><?= $prov->nombre ?></td>
                        <td><?= $prov->email ?></td>
                        <td><?= $prov->telefono ?></td>
                        <td><?= $prov->contacto ?></td>
                        <?php if (isset($_SESSION['login']) && isset($_GET['page']) && $_GET['page'] == 'edit') : ?>
                            <td>
                                <a class=" btn btn-info" href="<?= _URL_BASE_ ?>?controller=ProveedorController&action=crear&proveedorId=<?= $prov->id ?>">
                                    Editar
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <?= "No hay proveedores todavía" ?>
        <?php endif; ?>
    </section>