<?php
namespace ClassPross;
use Classpross\DB;

/**
 * Midelweares de permisos de acceso a vistas
 */
class Middleweare
{

  public function middleware($value)
  {
    switch ($value) {
      case 'auth':
        $this->Auth();
        break;
      case 'guest':
        $this->Guest();
        break;
      case 'admin':
        $this->Admin();
        break;
      default:
        return 'error middleware no found';
        break;
    }
  }

  private function Auth()
  {
    if($_SESSION['regular']['status']=='active'){
      if((new DB())->getby_id('email',$_SESSION['regular']['email'],'users')->email==$_SESSION['regular']['email']){
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

  private function Admin()
  {
    if($_SESSION['admin']['status']=='active'){
      if((new DB())->getby_id('email',$_SESSION['admin']['email'],'users')->email==$_SESSION['admin']['email']){
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

  private function Guest()
  {
    if(isset($_SESSION['regular'])){
      if ($_SESSION['regular']['status']=='active') {
        header('Location: /regular/tasks');
      }else {
        session_unset();
        session_destroy();
        header('Location: /');
      }
    }elseif (isset($_SESSION['admin'])) {
      if ($_SESSION['admin']['status']=='active') {
        header('Location: /admin');
      }else {
        session_unset();
        session_destroy();
        header('Location: /');
      }
    }
  }

}
