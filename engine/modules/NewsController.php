<?php

/**
 * 
 */
class NewsController
{
  
  function get ( $id = NULL )
  {
    echo 'Новость с id ' . $id;
    $this->index ();
  }

  public function index ()
  {
    // pass
  }
}