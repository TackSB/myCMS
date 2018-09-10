<?php

/**
 * 
 */
class LoginController
{


  public function changeAction ()
  {
    if ( isset( $_POST['doChange'] ) )
    {
      // Получаем пароли из формы
      $passwordOld = $_POST['passwordOld'];
      $passwordNew = $_POST['passwordNew'];
      // Получаем пароль из Db
      $password = R::findAll( 'login' );
      $password = $password[1]['password'];
      // Сравниваем старый с текущем
      if ( $password == $passwordOld )
      {
        $password = R::find( 'login', 1);
        $password->password = 'qwe';
        R::store($password);
        echo 'ГУУД';
      }
      return $this->indexAction();
    }
  }

  public function exitAction ()
  {
    if ( isset($_SESSION['login']) )
    {
      unset($_SESSION['login']);
      return $this->indexAction();
    }
    else
    {
      return $this->indexAction();
    }
  }

  // Логинет
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
        header('location: http://localhost/tack/admin'); // Редирект на Админ Панель
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