<?php

namespace App\controller;

use App\model\StoryModel;
use Symfony\Component\HttpFoundation\Request;

class StoryCotroller
{
  private $modelSotry;

  public function __construct()
  {
    $this->modelSotry = new StoryModel();
  }

  public function index(int $idAnimal):array | null
  {
    $model = $this->modelSotry;
    return $model->getStory($idAnimal);
  }

  public function store(Request $request): bool
  {
    $model = $this->modelSotry;
    $model->store($request);
    return true;
  }

}