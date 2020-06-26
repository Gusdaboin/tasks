<?php
namespace ClassPross;
use Classpross\DB;

/**
 * Auth
 */
class Auth extends DB
{
  function __construct()
  {
    $user= new DB;
    if($_SESSION['auth']['status']=='active'){
      if($user->getby_id('email',$_SESSION['auth']['email'],'users')['email']==$_SESSION['auth']['email']){
      }else{
        session_unset();
        session_destroy();
        header('Location: /');
      }
    }else{
      session_unset();
      session_destroy();
      header('Location: /');
    }
  }
}
