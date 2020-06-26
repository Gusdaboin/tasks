<?php
namespace ClassPross;

/**
 * Param
 */
class Parameter
{

  static function valid_uri($uri, $uri_p)
  {
    $uri=explode('/', $uri);
    $uri_p=explode('/', $uri_p);
    foreach ($uri_p as $key => $value) {
      if($value=="@"){
        $uri_p[$key]=$uri[$key];
      }
    }
    return implode('/', $uri_p);
  }

  private static function process_uri($uri, $uri_p, $parameters)
  {
      $uri=explode('/', $uri);
      $uri_p=explode('/', $uri_p);
      $parametersf= array();
      $i=0;
      foreach($uri_p as $key => $value){
      	if($value=="@"){
      		$parametersf[$parameters[$i++]]=$uri[$key];
      	}
      }
      return $parametersf;
  }

  public static function parameters($uri, $uri_p, $parameters)
  {
    return Parameter::process_uri($uri, $uri_p, $parameters);
  }
}
