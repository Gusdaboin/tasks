<?php
use ClassPross\View as View;
use ClassPross\CSRF;
use ClassPross\Middleweare;
use App\Models\User;
use App\Models\Task;
use App\Models\Taskb;

 /**
  * Admin
  */
 class Admin extends Middleweare
 {

   function __construct()
  {
    $this->middleware('admin');
  }

   public function homeshow()
   {
     $facade=new View;
     $facade->add_vars([
       'activeH' => 'active',
       'title' => ' - Panel Administrador',
       'admin' => (new User)->getby_id('email', $_SESSION['admin']['email']),
       'num_tasks' => count((new Task)->getby_table()),
       'num_users' => count((new User)->getby_table())
     ]);
     $view = 'app/views/admin/home.php';
     include_once 'app/views/layouts/admin.php';
   }

   public function showtasks()
   {
     $facade=new View;
     $facade->add_vars([
       'activeT' => 'active',
       'list' => 'active',
       'title' => ' - Tareas',
       'admin' => (new User)->getby_id('email', $_SESSION['admin']['email']),
       'tasks' => (new Task)->getby_table(),
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/admin/tasks.php';
     include_once 'app/views/layouts/admin.php';
   }

   public function taskshow($id)
   {
     $task=(new Task)->getby_id('id', $id['id']);
     if(is_object($task)){

       $task->username=(new User)->getby_id('id', $task->user_id)->username;

       $facade=new View;
       $facade->add_vars([
         'title' => ' - Tarea',
         'list' => 'active',
         'task' => $task,
         'admin' => (new User)->getby_id('email', $_SESSION['admin']['email']),
       ]);

       $view = 'app/views/admin/task.php';
       include_once 'app/views/layouts/admin.php';

     }else {
       View::redirect('/errors');
     }
   }

   public function taskeditshow($id)
   {
     $task=(new Task)->getby_id('id', $id['id']);
     if(is_object($task)){
       $users=(new User)->getby_table();
       $facade=new View;
       $facade->add_vars([
         'title' => ' - Editar Tarea',
         'list' => 'active',
         'task' => $task,
         'users' => $users
       ]);

       $csrf_i = CSRF::input_csrf_token();
       $view = 'app/views/admin/taskedit.php';
       include_once 'app/views/layouts/admin.php';

     }else {
       View::redirect('/errors');
     }
   }

   public function taskedit($id)
   {
     $task=(new Task)->getby_id('id', $id['id']);
     if(is_object($task)){

       if($_POST['name'] AND $_POST['tag'] AND $_POST['status'] AND $_POST['description'] AND $_POST['user_id']){
         $request=[
           'name' => ucwords($_POST['name']),
           'tag' => $_POST['tag'],
           'status' => $_POST['status'],
           'description' => $_POST['description'],
           'user_id' => $_POST['user_id'],
           'update_date' => (new DateTime())->format('Y-m-d H:i:s')
         ];
       }

       $task=new Task;
       if ($task->update($request, ['id'=>'id', 'value'=>$id['id']])=='Update exitoso') {
         View::redirect('/admin/tasks');
       }else {
         View::redirect('/errors');
       }

     }else {
       View::redirect('/errors');
     }
   }

   public function taskcreateshow()
   {
     $facade=new View;
     $users=(new User)->getby_table();
     $facade->add_vars([
       'title' => ' - Crear Tarea',
       'list' => 'active',
       'users' => $users
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/admin/maketask.php';
     include_once 'app/views/layouts/admin.php';
   }

   public function taskcreatestore()
   {
     if ($_POST['name'] AND $_POST['tag'] AND $_POST['description'] AND $_POST['user_id']) {
       $request=[
         'user_id' => $_POST['user_id'],
         'tag' => $_POST['tag'],
         'name' => ucwords($_POST['name']),
         'description' => $_POST['description'],
         'status' => 'waiting'
       ];

       $task=new Task;
       if ($task->insert($request) == 'Insert exitoso') {
         View::redirect('/admin/tasks');
       }else {
         View::redirect('/errors');
       }

     }else {
       View::redirect('/regular/task/create');
     }
   }

   public function taskdelet()
   {
      $task=(new Task)->getby_id('id', $_POST['id_task']);
     if (is_object($task)) {
       $task_backup=new Taskb;
       if($task_backup->insert(get_object_vars($task)) == 'Insert exitoso'){
         if((new Task)->delete('id', $_POST['id_task']) == 'Delete exitoso'){
           View::redirect('/admin/tasks');
         }else {
           View::redirect('/errors');
         }
       }else {
         View::redirect('/errors');
       }
     }else {
       View::redirect('/errors');
     }
   }

 }
