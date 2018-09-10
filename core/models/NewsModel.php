<?php

/**
 * 
 */
class NewsModel
{

  public function addAction ($caption, $category, $discription)
  {
    $news = R::dispense('news');
    $news->caption = $caption;
    $news->discription = $discription;
    $news->category = $category;
    R::store($news);
  }

}