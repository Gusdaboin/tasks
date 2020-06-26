<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TASKS<?=$facade->include_var('title')?></title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body style="overflow-x:hidden!important;">
    <div class="gdaboin-grid">
      <nav class="nav-bar nav-bar-sticky shadow-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <div class="nav-bar-title text-center">
                <a href="/" class="text-decoration-none"><h1 class="d-inline gold">TASKS</h1><h1 class="d-inline dark-grey">#</h1></a>
              </div>
            </div>
            <div class="col-md-8 mb-2">
              <div class="nav-content">
                <div class="text-center pt-auto">
                  <div class="nav-item <?=$facade->include_var('activeH')?>"><a class="nav-link" href="/">Home</a></div>
                  <div class="nav-item <?=$facade->include_var('activeT')?>"><a class="nav-link" href="/admin/tasks">Tareas</a></div>
                  <div class="nav-item <?=$facade->include_var('activeU')?>"><a class="nav-link" href="/admin/users">Usuarios</a></div>
                </div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <div class="nav-ac">
                <a class="nav-link float-right font-weight-bold" href="/logout">Cerrar Sesión <i class="ion-log-out"></i></a>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <div class="content mb-5">
        <div class="row">
          <div class="col-md-2 bg-dark position-fixed shadow-lg hidden-sm-down">
            <div class="container text-center py-5">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <i class="<?php if($facade->include_var('list')=='active'){echo 'ion-ios-list-outline';}else{echo "ion-pound";}?> white" style="font-size:80px;"></i>
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
              <hr style="color:#e9ac4c!important;">
            </div>
          </div>
          <div class="col-md-10 ml-auto">
            <?php
              include_once($view);
            ?>
          </div>
        </div>
      </div>
      <footer class="footer pt-5">
        <div class="row">
          <div class="col-md-10 ml-auto">
            <hr class="container" style="background-color:white;">
            <div class="container-fluid">
              <div class="row py-4">
                <div class="col-md-2 text-center">
                  <a href="/" class="text-decoration-none footer-title"><h1 class="d-inline gold">TASKS</h1><h1 class="d-inline dark-grey">#</h1></a>
                </div>
                <div class="col-md-8 text-center">
                  <p class="secondary">© 2020 TASK #, Inc. Todos los derechos reservados.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
