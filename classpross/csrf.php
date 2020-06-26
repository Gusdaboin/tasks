<?php
namespace ClassPross;

/**
 * Manage Token csrf
 */
class CSRF
{

  public static function csrf_token()
  {
    return $token=password_hash('SECRET TOKEN CSRF', PASSWORD_BCRYPT);
  }

  public static function csrf_token_verify(string $token)
  {
    return password_verify('SECRET TOKEN CSRF', $token);
  }

  public static function input_csrf_token()
  {
    return '<input type="text" name="_tokenCSRF" value="'.CSRF::csrf_token().'" style="display:none;"/>';
  }
}
