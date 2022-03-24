<nav>
    <ul>
        <li>
            <a href="<?=_URL_BASE_?>?controller=GeneralController&action=index" role="button">Consultas</a>

        </li>
        <?php if(isset($_SESSION['login'])):?>
        <li>
            <a href="<?=_URL_BASE_?>?controller=CategoriaController&action=index&page=edit" role="button">Edición</a>

        </li>
        <li>
            <a href="<?=_URL_BASE_?>?controller=CategoriaController&action=index&page=manage" role="button">Gestión</a>

        </li>
        <?php endif; ?>
    </ul>
</nav>