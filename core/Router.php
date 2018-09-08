<?php

/*

  Получает URI
  Делает поиск машрута
  Подключает класс и делает его экземпляр с последующим вызова метода

  Возвращает массив $view

*/
class Router
{

  private $routes;

  // Присваивает свойству routes маршруты
  public function __construct()
  {
    $this->routes = req( 'core/routes.php' );
  }

  public function getUri() // Получает URI, возвращает URI
  {
    if( isset( $_SERVER['REQUEST_URI'] ) )
    {
      $uri = trim($_SERVER['REQUEST_URI'], '/');
    }
    return $uri;
  }

  public function start() // Возвращает view и данные
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

        // Подключение контроллера
        req( 'core/controllers/' . $nameController . '.php' ); 

        // Создание экземпляра контроллера и метода
        $controller = new $nameController();
        $view = $controller->$nameAction(); // Возвращает вью и данные

        // Тестовая часть
        // req( 'core/controllers/PagesController.php' );
        // $pages = new PagesController($elements);
        // $view = $pages->start();

        return $view; // Массив
      }
    }

    // Подключение Контроллера и вызов метода
  }

}