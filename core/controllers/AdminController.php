<?php

req('core/controllers/AuthController.php');

/**
 * 
 */
class AdminController extends AuthController
{

  public function __construct()
  {
    $this->checkLoginAction();
  }

  public function indexAction ()
  {
    $view['view'] = 'main';
    return $view;
  }

}