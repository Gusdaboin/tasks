<?php
use ClassPross\View as View;
use ClassPross\CSRF;
use ClassPross\Middleweare;
use App\Models\User;
use App\Models\Task;
use App\Models\Taskb;

 /**
  * Regular
  */
 class Regular extends Middleweare
 {

   function __construct()
  {
    $this->middleware('auth');
  }

   public function show()
   {
     $facade=new View;
     $facade->add_vars([
       'activeT' => 'active',
       'title' => 'Tareas de Usuario',
       'tasks' => (new Task)->getby_id_all('user_id', (new User)->getby_id('email', $_SESSION['regular']['email'])->id)
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/regular/tasks.php';
     include_once 'app/views/layouts/regular.php';
   }

   public function taskcreateshow()
   {
     $facade=new View;
     $facade->add_vars([
       'title' => 'Crear Tarea',
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/regular/maketask.php';
     include_once 'app/views/layouts/regular.php';
   }

   public function taskcreatestore()
   {
     if ($_POST['name'] AND $_POST['tag'] AND $_POST['description']) {
       $request=[
         'user_id' => (new User)->getby_id('email', $_SESSION['regular']['email'])->id,
         'tag' => $_POST['tag'],
         'name' => ucwords($_POST['name']),
         'description' => $_POST['description'],
         'status' => 'waiting'
       ];

       $task=new Task;
       if ($task->insert($request) == 'Insert exitoso') {
         View::redirect('/regular/tasks');
       }else {
         View::redirect('/errors');
       }

     }else {
       View::redirect('/regular/task/create');
     }
   }

   public function taskshow($id)
   {
     $task=(new Task)->getby_id('id', $id['id']);
     if($task->user_id == (new User)->getby_id('email', $_SESSION['regular']['email'])->id){

       $facade=new View;
       $facade->add_vars([
         'title' => 'Tarea',
         'task' => $task
       ]);

       $view = 'app/views/regular/task.php';
       include_once 'app/views/layouts/regular.php';

     }else {
       View::redirect('/errors');
     }
   }

   public function taskeditshow($id)
   {
     $task=(new Task)->getby_id('id', $id['id']);
     if($task->user_id == (new User)->getby_id('email', $_SESSION['regular']['email'])->id){

       $facade=new View;
       $facade->add_vars([
         'title' => 'Editar Tarea',
         'task' => $task
       ]);

       $csrf_i = CSRF::input_csrf_token();
       $view = 'app/views/regular/taskedit.php';
       include_once 'app/views/layouts/regular.php';

     }else {
       View::redirect('/errors');
     }
   }

   public function taskedit($id)
   {
     $task=(new Task)->getby_id('id', $id['id']);
     if($task->user_id == (new User)->getby_id('email', $_SESSION['regular']['email'])->id){

       if($_POST['name'] AND $_POST['tag'] AND $_POST['status'] AND $_POST['description']){
         $request=[
           'name' => ucwords($_POST['name']),
           'tag' => $_POST['tag'],
           'status' => $_POST['status'],
           'description' => $_POST['description'],
           'update_date' => (new DateTime())->format('Y-m-d H:i:s')
         ];
       }

       $task=new Task;
       if ($task->update($request, ['id'=>'id', 'value'=>$id['id']])=='Update exitoso') {
         View::redirect('/regular/tasks');
       }else {
         View::redirect('/errors');
       }

     }else {
       View::redirect('/errors');
     }
   }

   public function taskdelet()
   {
      $task=(new Task)->getby_id('id', $_POST['id_task']);
     if ($task->user_id == (new User)->getby_id('email', $_SESSION['regular']['email'])->id) {
       $task_backup=new Taskb;
       if($task_backup->insert(get_object_vars($task)) == 'Insert exitoso'){
         if((new Task)->delete('id', $_POST['id_task']) == 'Delete exitoso'){
           View::redirect('/regular/tasks');
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
