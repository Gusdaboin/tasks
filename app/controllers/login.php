<?php
use ClassPross\View as View;
use ClassPross\CSRF;
use ClassPross\Middleweare;
use App\Models\User;

 /**
  * Inicio de Sesión
  */
 class Login extends Middleweare
 {

  function __construct()
  {
    $this->middleware('guest');
  }

   public function show()
   {
     $facade=new View;
     $facade->add_vars([
       'title' => ' - Incio de Sesión',
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/login.php';
     include_once 'app/views/layouts/guest.php';
   }

   public function post()
   {
     if($_POST['email'] AND $_POST['password']){
       $request=[
         'email' => $_POST['email'],
         'password' => $_POST['password']
       ];
       $login=new User;
       $das=$login->getby_id('email', $request['email']);
       if (password_verify($_POST['password'], $das->password)) {
         if ($das->user_level=='regular') {
           $_SESSION['regular']=[
            'status' => 'active',
            'email' => $das->email
          ];
          View::redirect('/regular/tasks');
        }elseif ($das->user_level=='admin') {
          $_SESSION['admin']=[
            'status' => 'active',
            'email' => $das->email
          ];
          View::redirect('/admin');
        }
      }else {
        View::redirect('/errors');
      }
    }else {
      View::redirect('/errors');
    }
   }

 }
