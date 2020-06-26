<div class="container mb-5">
  <h1 class="my-5">Panel de Administrador</h1>
  <div class="row">
    <div class="col-12 dmx-auto my-3">
      <div class="tarjeta shadow border-none">
        <div class="tarjeta-body">
          <div class="row">
            <div class="col-md-4 text-center mx-auto">
              <div class="tarjeta shadow-sm">
                <div class="tarjeta-body">
                  <div class="d-inline-block">
                    <h2 class="gold d-inline">Tareas</h2><h3 class="dark-grey d-inline">#</h3>
                    <h2 class="dark-grey d-block"><?=$facade->include_var('num_tasks');?></h2>
                  </div>
                  <div class="d-inline-block">
                    <i class="ion-ios-list-outline ml-5" style="font-size:96px;"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center mx-auto">
              <div class="tarjeta shadow-sm">
                <div class="tarjeta-body">
                  <div class="d-inline-block">
                    <h2 class="gold d-inline">Usuarios</h2><h3 class="dark-grey d-inline">#</h3>
                    <h2 class="dark-grey"><?=$facade->include_var('num_users');?></h2>
                  </div>
                  <div class="d-inline-block">
                    <i class="ion-android-contacts ml-5" style="font-size:96px;"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
