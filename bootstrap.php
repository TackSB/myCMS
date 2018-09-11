<?php

session_start();
// Подключение DB
req( 'engine/db.php' );
// Подключение роутера
req( 'engine/Router.php' );
$router = new Router();
// Возвращает массив $view
$view = $router->start();
// Проверка наличие View
if ( !isset( $view['view'] ) )
{
  $view['view'] = 'notFound';
}

req( 'engine/views/' . $view['view'] . '.php' );

?>