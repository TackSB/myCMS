<?php

define( 'ROOT' , dirname( __FILE__ ) );

function req($fileName)
{
  return require ROOT . '/' . $fileName;
}

req('bootstrap.php');