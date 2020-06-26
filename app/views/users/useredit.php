<div class="container mb-5">
  <h1 class="my-5">Editar Usuario</h1>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="tarjeta shadow-sm bg-dark">
        <div class="tarjeta-body">
          <form class="white" action="/admin/user/<?=$facade->include_var('user')->id;?>/edit/password" method="post">
            <?=$csrf_i;?>
            <div class="form-group">
              <label for="">Reiniciar Contraseña ?</label>
              <input name="active" type="submit" class="btn-outline-gold float-right" value="Reiniciar">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8 mx-auto mt-5">
      <div class="tarjeta shadow-sm bg-dark">
        <div class="tarjeta-body">
          <form class="white" action="/admin/user/<?=$facade->include_var('user')->id;?>/edit" method="post">
            <?=$csrf_i;?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label for="">Nombre</label>
              <input class="form-control" type="text" name="name" maxlength="80" value="<?=$facade->include_var('user')->name;?>" required>
            </div>
            <div class="form-group">
              <label for="">Apellido</label>
              <input class="form-control" type="text" name="lastname" maxlength="80" value="<?=$facade->include_var('user')->lastname;?>" required>
            </div>
            <div class="form-group">
              <label for="">E-mail</label>
              <input class="form-control" type="email" name="email" placeholder="@mail.com" maxlength="55" value="<?=$facade->include_var('user')->email;?>" required>
            </div>
            <div class="form-group">
              <label for="">Usuario</label>
              <input class="form-control" type="text" name="username" maxlength="25" value="<?=$facade->include_var('user')->username;?>" required>
            </div>
            <div class="form-group">
              <label for="">Ocupación</label>
              <input class="form-control" type="text" name="occupation" maxlength="80" value="<?=$facade->include_var('user')->occupation;?>" required>
            </div>
            <div class="form-group">
              <label for="">Nivel de Usuario</label>
              <select class="form-control" name="user_level">
                <option value="admin" <?php if($facade->include_var('user')->user_level=='admin'){echo "selected";} ;?> >Administrador</option>
                <option value="regular" <?php if($facade->include_var('user')->user_level=='regular'){echo "selected";} ;?> >Regular</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn-outline-gold float-right" value="Actualizar">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
