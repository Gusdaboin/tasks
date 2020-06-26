<?php
use ClassPross\View;

/**
 * Logout
 */
class Logout
{
  public function index()
  {
    session_unset();
    session_destroy();
    View::redirect('/');
  }
}
