<?php

/**
 * 
 */
class Router
{

  private $routes = array();

  public function __construct ()
  {
    $this->routes = req('engine/config/routes.php');
  }

  // Получает uri и возвращает
  public function getUri ()
  {
    $uri = trim ( $_SERVER['REQUEST_URI'] , '/' );

    return $uri;
  }

  public function run ()
  {
    // Получаем uri
    $uri = $this->getUri ();
    // Разбиваем uri на элементы
    $uriElements = explode ( '/' , $uri );
    //Проверка куда пришел запрос
    $controllerDir = 'engine/controllers/';
    $firstElementUri = $uriElements[0];
    if ( $firstElementUri == 'cms' )
    {
      array_shift($uriElements);
      $controllerDir = 'engine/modules/';
    }
    // Поиск маршрута
    foreach ( $this->routes as $pattern => $path ) {
      if ( preg_match( $pattern , $uri , $param ) )
      {
        // Разбиваем path на элементы
        $elements = explode( '/' , $path );
        // Получаем имя Контроллера и Метода
        $nameController = array_shift ( $elements );
        $nameController = ucfirst ( $nameController ) . 'Controller';
        $nameAction =  array_shift ( $elements );
        // Получаем параметр
        $param = $param[1];
        // Подключаем контроллер
        req ( $controllerDir . $nameController . '.php' );
        // Создаем экземпляр контроллера и вызываем его метод
        $controller = new $nameController ();
        $controller->$nameAction ( $param );
        
      }
    }

  }
}