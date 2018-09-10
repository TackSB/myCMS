<?php

req('core/controllers/AuthController.php');
req('core/models/NewsModel.php');

/**
 * 
 */
class NewsController extends AuthController
{

  private $model;

  public function __construct()
  {
    $this->checkLoginAction();
    $this->model = new NewsModel();
  }

  public function addAction()
  {
    if ( isset( $_POST['doAdd'] ) )
    {
      // Получаем данные из POST
      $caption = $_POST['caption'];
      // Проверяем была ли выбрана категория
      if ( isset( $_POST['category'] ) )
      {
        $category = $_POST['category'];
      }
      else
      {
        $category = 'other';
      }
      $discription = $_POST['discription'];
      $model = $this->model;
      $model->addAction($caption, $category, $discription);
    }
    return $this->indexAction();
  }

  public function indexAction ()
  {
    $view['view'] = 'news';
    return $view;
  }

}