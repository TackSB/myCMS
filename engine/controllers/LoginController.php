<?php

/**
 * 
 */
class LoginController
{

  // Удаляем сессию
  public function exitAction ()
  {
    if ( isset($_SESSION['login']) )
    {
      unset($_SESSION['login']);
    }
    return $this->indexAction();
  }

  // callback, создаем сессию
  public function doLoginAction ()
  {
    // Проверка запроса
    if ( isset( $_POST['doLogin'] ) )
    {
      // Получаем пароль с DB в $password
      $password = R::findAll( 'login' );
      $password = $password[1]['password'];
      // Сравниваем пароли
      $passwordPost = $_POST['password']; // Пароль из пост запроса
      if ( $password == $passwordPost )
      {
        $_SESSION['login'] = $password; // Логинем
        header('location: http://localhost/admin/'); // Редирект на Админ Панель
      }
      else
      {
        return $this->indexAction();
      }
    }
    else
    {
      return $this->indexAction();
    }
  }

  public function indexAction ()
  {
    $view['view'] = 'login';
    return $view;
  }

}