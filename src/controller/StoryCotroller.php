<?php

namespace App\controller;

use App\model\StoryModel;

class StoryCotroller
{
  private $modelSotry;

  public function __construct()
  {
    $this->modelSotry = new StoryModel();
  }

  public function index(string $nameAnimal):array
  {
    $model = $this->modelSotry;
    return $model->getStory($nameAnimal);
  }

}