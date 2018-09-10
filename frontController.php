<?php

session_start();

global $view;

// Подключение DB
req('core/db.php');
// Подключение роутера, создание Экземпляра и вызов метода
req( 'core/Router.php' );
$router = new Router();
$view = $router->start(); // Возвращает массив $view
// Проверка наличие View
if( !isset($view['view']) )
{
  $view['view'] = 'notFound';
}

?>