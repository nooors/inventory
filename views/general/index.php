<?php if(isset($_SESSION)): ?>
<?php utils::unsetSession(); ?>
<?php endif; ?>

<section>
      <div class="image"><a class="option" href="<?=_URL_BASE_?>?controller=CategoriaController&action=index"><img src="assets/img/default.png"></a>
        <p>Categorías</p>
      </div>
      <div class="image"><a class="option" href="<?=_URL_BASE_?>?controller=FamiliaController&action=index"><img src="assets/img/default.png"></a>
        <p>Familías</p>
      </div>
      <div class="image"><a class="option" href="<?=_URL_BASE_?>?controller=MarcaController&action=index"><img src="assets/img/default.png"></a>
        <p>Marcas</p>
      </div>
      <div class="image"><a class="option" href="<?=_URL_BASE_?>?controller=ModeloController&action=index"><img src="assets/img/default.png"></a>
        <p>Modelos</p>
      </div>
      <div class="image"><a class="option" href="<?=_URL_BASE_?>?controller=ProveedorController&action=index"><img src="assets/img/default.png"></a>
        <p>Proveedores</p>
      </div>
      <div class="image"><a class="option" href="<?=_URL_BASE_?>?controller=UsuarioController&action=index"><img src="assets/img/default.png"></a>
        <p>Usuarios</p>
      </div>
    </section>