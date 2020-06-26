<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>TASKS<?=$facade->include_var('title')?></title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
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
                  <div class="nav-item <?=$facade->include_var('activeH')?>"><a class="nav-link" href="/">HOME</a></div>
                </div>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <div class="nav-ac">
                <a class="nav-link float-right font-weight-bold" href="/signup">Registrate <i class="ion-android-person-add"></i></a>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <div class="content pb-5">
        <?php
          include_once($view);
        ?>
      </div>
      <footer class="footer mt-5">
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
      </footer>
    </div>
  </body>
</html>
