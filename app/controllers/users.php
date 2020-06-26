<?php
use ClassPross\View as View;
use ClassPross\CSRF;
use ClassPross\Middleweare;
use App\Models\User;
use App\Models\Userb;

 /**
  * Users
  */
 class Users extends Middleweare
 {

   function __construct()
  {
    $this->middleware('admin');
  }

   public function show()
   {
     $facade=new View;
     $facade->add_vars([
       'activeU' => 'active',
       'title' => ' - Usuarios',
       'users' => (new User)->getby_table(),
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/users/users.php';
     include_once 'app/views/layouts/admin.php';
   }

   public function usershow($id)
   {
     $user=(new User)->getby_id('id', $id['id']);
     if(is_object($user)){
       $facade=new View;
       $facade->add_vars([
         'title' => ' - Usuario',
         'user' => $user,
       ]);
       $view = 'app/views/users/user.php';
       include_once 'app/views/layouts/admin.php';

     }else {
       View::redirect('/errors');
     }
   }

   public function usereditshow($id)
   {
     $user=(new User)->getby_id('id', $id['id']);
     if(is_object($user)){
       $facade=new View;
       $facade->add_vars([
         'title' => ' - Editar Usuario',
         'user' => $user
       ]);

       $csrf_i = CSRF::input_csrf_token();
       $view = 'app/views/users/useredit.php';
       include_once 'app/views/layouts/admin.php';

     }else {
       View::redirect('/errors');
     }
   }

   public function useredit($id)
   {
     $user=(new User)->getby_id('id', $id['id']);
     if(is_object($user)){

       if($_POST['name'] AND $_POST['email'] AND $_POST['lastname'] AND $_POST['username'] AND $_POST['occupation'] AND $_POST['user_level']){
         $request=[
           'username' => $_POST['username'],
           'name' => ucwords($_POST['name']),
           'lastname' => ucwords($_POST['lastname']),
           'email' => $_POST['email'],
           'occupation' => $_POST['occupation'],
           'user_level' => $_POST['user_level'],
           'update_date' => (new DateTime())->format('Y-m-d H:i:s')
         ];

           $user=new User;
           if ($user->update($request, ['id'=>'id', 'value'=>$id['id']])=='Update exitoso') {
             View::redirect('/admin/users');
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

   public function usercreateshow()
   {
     $facade=new View;
     $facade->add_vars([
       'title' => ' - Crear Usuario',
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/users/makeuser.php';
     include_once 'app/views/layouts/admin.php';
   }

   public function usercreatestore()
   {
     if($_POST['name'] AND $_POST['email'] AND $_POST['password'] AND $_POST['lastname'] AND $_POST['username'] AND $_POST['occupation'] AND $_POST['user_level']){
       $request=[
         'username' => $_POST['username'],
         'name' => ucwords($_POST['name']),
         'lastname' => ucwords($_POST['lastname']),
         'email' => $_POST['email'],
         'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
         'occupation' => $_POST['occupation'],
         'user_level' => $_POST['user_level']
       ];
     }else {
       View::redirect('/errors');
     }

     $user = new User;
     if ($user->insert($request) == 'Insert exitoso') {
       View::redirect('/admin/users');
     }else {
       View::redirect('/errors');
     }
   }

   public function userdelet()
   {
      $user=(new User)->getby_id('id', $_POST['id_user']);
     if (is_object($user)) {
       $user_backup=new Userb;
       if($user_backup->insert(get_object_vars($user)) == 'Insert exitoso'){
         if((new User)->delete('id', $_POST['id_user']) == 'Delete exitoso'){
           View::redirect('/admin/users');
         }else {
           View::redirect('/errors1');
         }
       }else {
         View::redirect('/errors2');
       }
     }else {
       View::redirect('/errors3');
     }
   }

   public function userpassreset($id)
   {
     $user=(new User)->getby_id('id', $id['id']);
     if (is_object($user)) {
       $user=new User;
       if ($user->update(['password' => password_hash('12345678', PASSWORD_BCRYPT), 'update_date' => (new DateTime())->format('Y-m-d H:i:s')], ['id'=>'id', 'value'=>$id['id']])=='Update exitoso') {
         View::redirect('/admin/users');
       }else {
         View::redirect('/errors');
       }
     }else {
       View::redirect('/errors');
     }
   }

 }
