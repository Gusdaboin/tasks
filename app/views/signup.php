<div class="container">
  <h1 class="text-center my-5" style="color:black">Registrate</h1>
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="tarjeta shadow-sm border-rounded-0 mb-5">
        <div class="tarjeta-body">
          <form action="/signup" method="post">
            <?=$csrf_i;?>
            <div class="form-group">
              <label for="">Nombre</label>
              <input class="form-control" type="text" name="name" maxlength="80" required>
            </div>
            <div class="form-group">
              <label for="">Apellido</label>
              <input class="form-control" type="text" name="lastname" maxlength="80" required>
            </div>
            <div class="form-group">
              <label for="">E-mail</label>
              <input class="form-control" type="email" name="email" placeholder="@mail.com" maxlength="55" required>
            </div>
            <div class="form-group">
              <label for="">Usuario</label>
              <input class="form-control" type="text" name="username" maxlength="25" required>
            </div>
            <div class="form-group">
              <label for="">Contraseña</label>
              <input class="form-control" type="password" name="password" placeholder="********" maxlength="35" required>
            </div>
            <div class="form-group">
              <label for="">Ocupación</label>
              <input class="form-control" type="text" name="occupation" maxlength="80" required>
            </div>
            <div class="form-group">
              <input class="btn-outline-gold float-right" type="submit" name="" value="Registrar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
