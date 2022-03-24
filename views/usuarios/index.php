<h1>Usuarios</h1>
<section>
    <?php if(isset($result) && !empty($result) && !is_null($result)): ?>

        <table>
            <tr>
            <th>Nombre:</th>
            <th>Apellidos</th>
            <th>email</th>
            <th>rol</th>
            <th>fecha</th>
    </tr>
        <?php foreach($result as $row): ?>
            <tr>
                <td><?=$row->nombre?></td>
                <td><?=$row->apellidos?></td>
                <td><?=$row->email?></td>
                <td><?=$row->rol?></td>
                <td><?=$row->fecha?></td>
            </tr>
        <?php endforeach; ?>
            </table>
       
        <?php else: ?>
<?="No hay categorías todavía"?>
<?php endif; ?>



</section>