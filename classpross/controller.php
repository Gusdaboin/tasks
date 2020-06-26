<?php
namespace ClassPross;

/**
 * Explode Controller and Method
 */
class Controller
{

  private static function explode(string $controller)
  {
    return explode('@', $controller);
  }

  public static function prog_controller(string $controller, array $param)
  {
    $controller = Controller::explode($controller);
    include_once 'app/controllers/'.$controller[0].'.php';
    $class=ucfirst($controller[0]);
    $class = new $class;
    $class->{$controller[1]}($param);
  }

}
