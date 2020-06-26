<div class="container mb-5">
  <h1 class="my-5">Tarea ID: <span class="gold"><?=$facade->include_var('task')->id;?></span></h1>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="tarjeta shadow-lg border-none bg-dark">
        <div class="tarjeta-body ml-5 orange">
          <h3>Nombre: <span class="white"><?=$facade->include_var('task')->name;?></span></h3>
          <h3>Tag: <span class="white"><?=$facade->include_var('task')->tag;?></span></h3>
          <h3>Estado: <span class="white"><?=$facade->include_var('task')->status;?></span></h3>
          <h3>Usuario asignado: <span class="white"><?=$facade->include_var('task')->username;?></span></h3>
          <h3>ID Usuario: <span class="white"><?=$facade->include_var('task')->user_id;?></span></h3>
          <h3>Fecha de creación: <span class="white"><?=$facade->include_var('task')->creation_date;?></span></h3>
          <h3>Fecha de actualizacion: <span class="white"><?=$facade->include_var('task')->update_date;?></span></h3>
          <h3>Descipción:</h3>
          <p class="white"> <?=$facade->include_var('task')->description;?></p>
        </div>
      </div>
    </div>
  </div>
</div>
