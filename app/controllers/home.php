<?php
use ClassPross\View as View;
use ClassPross\CSRF;
use ClassPross\Middleweare;
use ClassPross\AccountLink;
use App\Models\User;

 /**
  * index
  */
 class Home extends Middleweare
 {

   function __construct()
  {
    $this->middleware('guest');
  }

   public function show()
   {
     $facade=new View;
     $facade->add_vars([
       'activeH' => 'active',
       'title' => '',
     ]);
     $csrf_i = CSRF::input_csrf_token();
     $view = 'app/views/index.php';
     include_once 'app/views/layouts/guest.php';
   }

 }
