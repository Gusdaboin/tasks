<div class="container mb-5">
  <h1 class="my-5">ID Usuario: <span class="gold"><?=$facade->include_var('user')->id;?></span></h1>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="tarjeta shadow-lg border-none bg-dark">
        <div class="tarjeta-body ml-5 orange">
          <h3>Nombre: <span class="white"><?=$facade->include_var('user')->name;?></span></h3>
          <h3>Apellido: <span class="white"><?=$facade->include_var('user')->lastname;?></span></h3>
          <h3>Usuario: <span class="white"><?=$facade->include_var('user')->username;?></span></h3>
          <h3>E-mail: <span class="white"><?=$facade->include_var('user')->email;?></span></h3>
          <h3>Ocupación: <span class="white"><?=$facade->include_var('user')->occupation;?></span></h3>
          <h3>Nivel de Usuario: <span class="white"><?=$facade->include_var('user')->user_level;?></span></h3>
          <h3>Fecha de creación: <span class="white"><?=$facade->include_var('user')->creation_date;?></span></h3>
          <h3>Fecha de actualizacion: <span class="white"><?=$facade->include_var('user')->update_date;?></span></h3>
        </div>
      </div>
    </div>
  </div>
</div>
