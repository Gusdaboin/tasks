<div class="container mb-5">
  <h1 class="my-5">Editar Tarea</h1>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="tarjeta shadow-sm bg-dark">
        <div class="tarjeta-body">
          <form class="white" action="/admin/task/<?=$facade->include_var('task')->id;?>/edit" method="post">
            <?=$csrf_i;?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input class="form-control" type="text" name="name" id="name" maxlength="200" value="<?=$facade->include_var('task')->name;?>" required>
            </div>
            <div class="form-group">
              <label for="tag">Tag</label>
              <select class="form-control" name="tag" required>
                <option value="sports" <?php if($facade->include_var('task')->tag=='sports'){echo "selected";} ;?> >Deportes</option>
                <option value="job" <?php if($facade->include_var('task')->tag=='job'){echo "selected";} ;?> >Trabajo</option>
                <option value="studies" <?php if($facade->include_var('task')->tag=='studies'){echo "selected";} ;?> >Estudios</option>
                <option value="lifestyle" <?php if($facade->include_var('task')->tag=='lifestyle'){echo "selected";} ;?> >Estilo de vida</option>
                <option value="science" <?php if($facade->include_var('task')->tag=='science'){echo "selected";} ;?> >Ciencia</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Estado</label>
              <select class="form-control" name="status" required>
                <option value="waiting" <?php if($facade->include_var('task')->status=='waiting'){echo "selected";} ;?> >Por realizar</option>
                <option value="doing" <?php if($facade->include_var('task')->status=='doing'){echo "selected";} ;?> >En proceso</option>
                <option value="finalized" <?php if($facade->include_var('task')->status=='finalized'){echo "selected";} ;?> >Realizado</option>
              </select>
            </div>
            <div class="form-group">
              <label for="name">Usuario asignado</label>
              <select class="form-control" name="user_id" required>
                <?php foreach ($facade->include_var('users') as $user): ?>
                  <option value="<?=$user['id'];?>" <?php if($facade->include_var('task')->user_id==$user['id']){echo "selected";} ?> ><?=$user['username'];?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Descipción</label>
              <textarea class="form-control" name="description" rows="8" cols="80" id="description" required><?=$facade->include_var('task')->description;?></textarea>
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
