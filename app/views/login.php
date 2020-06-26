<div class="container">
  <h1 class="text-center my-5" style="color:black">Inicia Sesión</h1>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="tarjeta shadow-sm border-rounded-0 mb-5">
        <div class="tarjeta-body">
          <form action="/login" method="post">
            <?=$csrf_i;?>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input class="form-control" type="email" name="email" placeholder="@mail.com" maxlength="55" required id="email">
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input class="form-control" type="password" name="password" placeholder="********" maxlength="35" required id="password">
            </div>
            <div class="form-group">
              <input class="btn-outline-gold float-right" type="submit" value="Iniciar Sesión" >
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
