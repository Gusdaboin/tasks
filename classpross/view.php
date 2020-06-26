<?php
namespace ClassPross;

/**
 * view
 */
class View
{

  var $var;

  public function add_vars(array $value)
  {
    $this->var=$value;
  }

  public function include_var($value)
  {
    if(isset($this->var[$value])){
      return $this->var[$value];
    }
  }

  public static function redirect($url)
  {
    header('Location: '.$url);
  }
}
