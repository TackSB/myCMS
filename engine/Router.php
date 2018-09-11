<?php

/*

  Получает URI
  Делает поиск машрута
  Подключает класс и делает его экземпляр с последующим вызова метода
  Возвращает массив $view

*/
class Router
{

  // Маршруты
  private $routes;

  // Получаем маршруты
  public function __construct()
  {
    $this->routes = req( 'engine/routes.php' );
  }

  // Получаем URI
  public function getUri()
  {
    if( isset( $_SERVER['REQUEST_URI'] ) )
    {
      $uri = trim($_SERVER['REQUEST_URI'], '/');
    }
    return $uri;
  }

  public function hasAdminLogin( $nameController, $nameAction, $uri )
  {
    /*
      Если имя контроллера LoginController
        то не выполняем проверку авторизации
    */
    if ( $nameController != 'LoginController' )
    {
      if ( $uri == 'admin' ){
        if ( !isset($_SESSION['login']) )
        {
          $nameController = 'LoginController';
          $nameAction = 'indexAction';
        }
      }
    }
  }

  // Возвращает массив $view
  public function start()
  {
    // Получение URI
    $uri = $this->getUri();
    // Получение маршрутов
    $routes = $this->routes;
    // Поиск маршрута
    foreach ( $routes as $pattern => $path ) {
      if ($uri == $pattern)
      {
        // Получение имени Контроллера и Метода
        $elements = explode('/', $path);
        $nameController = ucfirst( array_shift($elements) );
        $nameController = $nameController . 'Controller'; // Имя контроллера
        $nameAction = array_shift($elements);
        $nameAction = $nameAction . 'Action'; // Имя метода

        // Проверка авторизации
        $uri = explode('/', $uri)[0];
        $this->hasAdminLogin( $nameController, $nameAction, $uri );

        // Подключение контроллера
        req( 'engine/controllers/' . $nameController . '.php' ); 

        // Создание экземпляра контроллера и вызов метода
        $controller = new $nameController();

        // Возвращает вью и данные
        $view = $controller->$nameAction();

        // Возвращаем массив $view
        return $view;
      }
    }
  }

}