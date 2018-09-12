<?php

/**
 * 
 */
class Cms
{



  public function __construct ()
  {
    // Подключаем сервисы
    $this->reqServices();
  }

  // подключает сервисы, ничего не возвращает
  public function reqServices ()
  {
    // Получаем массив сервисов
    $services = scandir( ROOT . '/engine/services' );
    array_shift($services);
    array_shift($services);

    // Подключаем сервисы
    foreach ( $services as $service ) {
      req ( 'engine/services/' . $service );
    }
  }

  public function run ()
  {
    $router = new Router ();
    $router->run();
  }
}