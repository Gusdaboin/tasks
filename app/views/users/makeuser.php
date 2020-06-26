<div class="container mb-5">
  <h1 class="my-5">Crear Usuario</h1>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="tarjeta shadow-sm bg-dark">
        <div class="tarjeta-body">
          <form class="white" action="/admin/user/create" method="post">
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
              <label for="">Nivel de Usuario</label>
              <select class="form-control" name="user_level">
                <option value="admin">Administrador</option>
                <option value="regular">Regular</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn-outline-gold float-right" value="Crear">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
