<?php
error_reporting(0);

$uri = urldecode(
    parse_url($_GET['k'], PHP_URL_PATH)
);

spl_autoload_register(function($clase){
  include_once(str_replace('\\', '/', strtolower($clase)).'.php') ;
});

if ($uri !== '/' && is_file(__DIR__.'/public/'.$uri)) {
    include_once 'public/index.php';
}else {
    session_start();
    include_once 'app/routes/web.php';
}
?>
