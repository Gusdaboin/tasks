<div class="container mb-5">
  <h1 class="my-5">Crear Tarea</h1>
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="tarjeta shadow-sm bg-dark">
        <div class="tarjeta-body">
          <form class="white" action="/regular/task/create" method="post">
            <?=$csrf_i;?>
            <div class="form-group">
              <label for="name">Nombre</label>
              <input class="form-control" type="text" name="name" id="name" maxlength="200" required>
            </div>
            <div class="form-group">
              <label for="tag">Tag</label>
              <select class="form-control" name="tag" required>
                <option value="sports">Deportes</option>
                <option value="job">Trabajo</option>
                <option value="studies">Estudios</option>
                <option value="lifestyle">Estilo de vida</option>
                <option value="science">Ciencia</option>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Descipción</label>
              <textarea class="form-control" name="description" rows="8" cols="80" id="description" required></textarea>
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
