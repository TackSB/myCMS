<?php

/**
 * 
 */
class AuthController
{

  // pass
  public function checkLoginAction ()
  {
    // Проверяем наличие сессии, если False вызываем LoginController
    if ( isset($_SESSION['login']) )
    {
      // Получаем пароль с DB
      $password = R::findAll( 'login' );
      $password = $password[1]['password'];

      // Получаем пароль с сессии
      $login = $_SESSION['login'];

      // Проверка
      if ( $password != $login )
      {
        unset( $_SESSION['login'] );
        header( 'location: http://localhost/tack/login' );
      }
    }
    else
    {
      header( 'location: http://localhost/tack/login' );
    }
  }

}