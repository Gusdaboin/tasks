<?php
namespace ClassPross;
use Classpross\CSRF as CSRF;
use Classpross\Controller as Controller;

/**
 * Routes
 */
class Route
{
    /**
     * Metodo get(), procesa las peticiones de tipo get y devuelve la vista requerida
     */
    public static function get(array $param, string $controller)
    {
      if(!$_POST){
        Controller::prog_controller($controller,$param);
      }
    }

    /**
     * Metodo post(), procesa las peticiones de tipo post, verifica el token csrf y devuelve la vista requerida
     */
    public static function post(array $param, string $controller)
    {
      if($_POST AND !isset($_POST['_method'])){
        if ($_POST['_tokenCSRF'] AND CSRF::csrf_token_verify($_POST['_tokenCSRF'])) {
          Controller::prog_controller($controller,$param);
        }else {
          include_once 'app/views/errors.php';
        }
      }
    }

    /**
     * Metodo put(), procesa las peticiones de tipo put, verifica el token csrf y devuelve la vista requerida
     */
    public static function put(array $param, string $controller)
    {
      if(isset($_POST['_method'])){
        if($_POST['_method']=='PUT'){
          if ($_POST['_tokenCSRF'] AND CSRF::csrf_token_verify($_POST['_tokenCSRF'])) {
            Controller::prog_controller($controller,$param);
          }else {
            include_once 'app/views/errors.php';
          }
        }else {
          include_once 'app/views/errors.php';
        }
      }
    }

    /**
     * Metodo delete(), procesa las peticiones de tipo delete, verifica el token csrf y devuelve la vista requerida
     */
    public static function delete(array $param, string $controller)
    {
      if (isset($_POST['_method'])) {
        if ($_POST['_method']=='DELETE') {
          if ($_POST['_tokenCSRF'] AND CSRF::csrf_token_verify($_POST['_tokenCSRF'])) {
            Controller::prog_controller($controller,$param);
          }else {
            include_once 'app/views/errors.php';
          }
        }else {
          include_once 'app/views/errors.php';
        }
      }
    }

}
