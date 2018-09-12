<?php

define( 'ROOT' , dirname(__FILE__) );

function req ($filename)
{
  return require ROOT . '/' . $filename ;
}

req ('engine/Cms.php');
$cms = new Cms ();
$cms->run();
