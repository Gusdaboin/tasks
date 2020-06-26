<div class="container mb-5">
  <h1 class="my-5">Lista de Usuarios</h1>
  <div class="row">
    <div class="col-md-12 mx-auto text-center">
      <div class="tarjeta shadow-sm">
        <div class="tarjeta-body">
          <a href="/admin/user/create" class="btn-outline-gold float-right shadow-sm my-3">Crear</a>
          <div class="table-responsive my-3">
            <div class="table table-borderless">
              <table class="table table-bordeless">
                <thead class="bg-dark text-black-50">
                  <tr class="text-light text-center">
                    <th scope="col" class="white">ID</th>
                    <th scope="col" class="white">Nombre</th>
                    <th scope="col" class="white">Username</th>
                    <th scope="col" class="white">Ocupacion</th>
                    <th scope="col" class="white">Fecha de creación</th>
                    <th scope="col" class="white">Fecha de atualización</th>
                    <th scope="col" class="white">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($facade->include_var('users')[0]): ?>
                    <?php foreach ($facade->include_var('users') as $user): ?>
                      <tr class="text-light text-center">
                        <th scope="row"><?=$user['id'];?></th>
                        <td><?=$user['name'];?></td>
                        <td><?=$user['username'];?></td>
                        <td><?=$user['occupation'];?></td>
                        <td><?=$user['creation_date'];?></td>
                        <td><?=$user['update_date'];?></td>
                        <td>
                          <form action="/admin/user/trash" method="post">
                            <?=$csrf_i;?>
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id_user" value="<?=$user['id'];?>">
                            <a href="/admin/user/<?=$user['id'];?>" class="btn-link text-black"><i class="ion-ios-eye"></i></a>
                            <a href="/admin/user/<?=$user['id'];?>/edit" class="btn-link text-black"><i class="ion-edit"></i></a>
                            <button type="submit" class="btn-link text-black">
                              <i class="ion-ios-trash"></i>
                            </button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <h1 class="text-center text-black">Aún no hay Usuarios Creados</h1>
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
