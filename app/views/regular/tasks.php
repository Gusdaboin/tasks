<div class="container mb-5">
  <h1 class="my-5">Lista de Tareas</h1>
  <div class="row">
    <div class="col-md-12 mx-auto text-center">
      <div class="tarjeta shadow-sm">
        <div class="tarjeta-body">
          <a href="/regular/task/create" class="btn-outline-gold float-right shadow-sm my-3">Crear</a>
          <div class="table-responsive my-3">
            <div class="table table-borderless">
              <table class="table table-bordeless">
                <thead class="bg-dark text-black-50">
                  <tr class="text-light text-center">
                    <th scope="col" class="white">ID</th>
                    <th scope="col" class="white">Nombre</th>
                    <th scope="col" class="white">Tag</th>
                    <th scope="col" class="white">Estado</th>
                    <th scope="col" class="white">Fecha de creación</th>
                    <th scope="col" class="white">Fecha de atualización</th>
                    <th scope="col" class="white">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($facade->include_var('tasks')[0]): ?>
                    <?php foreach ($facade->include_var('tasks') as $task): ?>
                      <tr class="text-light text-center">
                        <th scope="row"><?=$task->id;?></th>
                        <td><?=$task->name;?></td>
                        <td><?=$task->tag;?></td>
                        <td><?=$task->status;?></td>
                        <td><?=$task->creation_date;?></td>
                        <td><?=$task->update_date;?></td>
                        <td>
                          <form action="/regular/task/trash" method="post">
                            <?=$csrf_i;?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id_task" value="<?=$task->id;?>">
                            <a href="/regular/task/<?=$task->id;?>" class="btn-link text-black"><i class="ion-ios-eye"></i></a>
                            <a href="/regular/task/<?=$task->id;?>/edit" class="btn-link text-black"><i class="ion-edit"></i></a>
                            <button type="submit" class="btn-link text-black">
                              <i class="ion-ios-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <h1 class="text-center text-black">Aún no tiene una tarea asignada</h1>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
