<?php
namespace App\Routes;
use ClassPross\Route as Route;
use ClassPross\Parameter as Process;

switch ($uri) {
  //Ruta index
  case '':
    Route::get(['uri'=>$uri], 'home@show');
    break;

  //Ruta login
  case 'login':
    Route::get(['uri'=>$uri], 'login@show');
    Route::post(['uri'=>$uri], 'login@post');
    break;

  //Ruta de Registro
  case 'signup':
    Route::get(['uri'=>$uri], 'signup@show');
    Route::post(['uri'=>$uri], 'signup@store');
    break;

  //Ruta Home Usuario Administrador
  case 'admin':
    Route::get(['uri'=>$uri], 'admin@homeshow');
    break;

  //Ruta Tareas Usuario Administrador
  case 'admin/tasks':
    Route::get(['uri'=>$uri], 'admin@showtasks');
    break;

  //Ruta de Creación Tareas Usuario Administrador
  case 'admin/task/create':
    Route::get(['uri'=>$uri], 'admin@taskcreateshow');
    Route::post(['uri'=>$uri], 'admin@taskcreatestore');
    break;

  //Ruta Eliminar y Backup de Tarea Usuario Administrador
  case 'admin/task/trash':
    Route::delete(['uri'=>$uri], 'admin@taskdelet');
    break;

  //Ruta Muestra Tarea Usuario Administrador
  case Process::valid_uri($uri, 'admin/task/@'):
    Route::get(Process::parameters($uri, 'admin/task/@', ['id']), 'admin@taskshow');
    break;

  //Ruta Edición Tarea Usuario Administrador
  case Process::valid_uri($uri, 'admin/task/@/edit'):
    Route::get(Process::parameters($uri, 'admin/task/@/edit', ['id']), 'admin@taskeditshow');
    Route::put(Process::parameters($uri, 'admin/task/@/edit', ['id']), 'admin@taskedit');
    break;

  //Ruta de Tareas de Usuario Regular
  case 'regular/tasks':
    Route::get(['uri'=>$uri], 'regular@show');
    break;

  //Ruta de Creación Tareas de Usuario Regular
  case 'regular/task/create':
    Route::get(['uri'=>$uri], 'regular@taskcreateshow');
    Route::post(['uri'=>$uri], 'regular@taskcreatestore');
    break;

  //Ruta Eliminar y Backup de Tarea Usuario Regular
  case 'regular/task/trash':
    Route::delete(['uri'=>$uri], 'regular@taskdelet');
    break;

  //Ruta Muestra Tarea Usuario Regular
  case Process::valid_uri($uri, 'regular/task/@'):
    Route::get(Process::parameters($uri, 'regular/task/@', ['id']), 'regular@taskshow');
    break;

  //Ruta Edición Tarea Usuario Regular
  case Process::valid_uri($uri, 'regular/task/@/edit'):
    Route::get(Process::parameters($uri, 'regular/task/@/edit', ['id']), 'regular@taskeditshow');
    Route::put(Process::parameters($uri, 'regular/task/@/edit', ['id']), 'regular@taskedit');
    break;

  //Ruta de Usuarios de Usuario Administrador
  case 'admin/users':
    Route::get(['uri'=>$uri], 'users@show');
    break;

  //Ruta de Creación Usuario de Usuario Administrador
  case 'admin/user/create':
    Route::get(['uri'=>$uri], 'users@usercreateshow');
    Route::post(['uri'=>$uri], 'users@usercreatestore');
    break;

  //Ruta Eliminar y Backup de Usuario, Usuario Administrador
  case 'admin/user/trash':
    Route::delete(['uri'=>$uri], 'users@userdelet');
    break;

  //Ruta Muestra Usuario Usuario Administrador
  case Process::valid_uri($uri, 'admin/user/@'):
    Route::get(Process::parameters($uri, 'admin/user/@', ['id']), 'users@usershow');
    break;

  //Ruta Edición Usuario, Usuario Administrador
  case Process::valid_uri($uri, 'admin/user/@/edit'):
    Route::get(Process::parameters($uri, 'admin/user/@/edit', ['id']), 'users@usereditshow');
    Route::put(Process::parameters($uri, 'admin/user/@/edit', ['id']), 'users@useredit');
    break;

  //Ruta Reinicio contraseña, Usuario Administrador
  case Process::valid_uri($uri, 'admin/user/@/edit/password'):
    Route::post(Process::parameters($uri, 'admin/user/@/edit/password', ['id']), 'users@userpassreset');
    break;

  //Ruta de cerrar sesion
  case 'logout':
    Route::get(['uri'=>$uri], 'logout@index');
    break;

  default:
    include_once 'app/views/errors.php';
    break;
}
