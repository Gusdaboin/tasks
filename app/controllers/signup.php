<?php
use ClassPross\View as View;
use ClassPross\CSRF;
use ClassPross\Middleweare;
use ClassPross\AccountLink;
use App\Models\User;

 /**
  * Registro
  */
 class Signup extends Middleweare
 {

   function __construct()
   {
     $this->middleware('guest');
   }

   public function show()
   {
     $facade=new View;
     $facade->add_vars([
       'title' => ' - Registro',
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/signup.php';
     include_once 'app/views/layouts/guest.php';
   }

   public function store()
  {
    if($_POST['name'] AND $_POST['email'] AND $_POST['password'] AND $_POST['lastname'] AND $_POST['username'] AND $_POST['occupation']){
      $request=[
        'username' => $_POST['username'],
        'name' => ucwords($_POST['name']),
        'lastname' => ucwords($_POST['lastname']),
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
        'occupation' => $_POST['occupation'],
        'user_level' => 'regular'
      ];
    }else {
      View::redirect('/errors');
    }

    $user = new User;
    if ($user->insert($request) == 'Insert exitoso') {
      $activeR='active';
      $facade=new View;
      $facade->add_vars(
        [
          'title' => ' - Registro',
        ]
      );
      View::redirect('/');
    }else {
      View::redirect('/errors');
    }

  }
 }
