<?php

namespace App\controller;

use App\model\AnimalModel;
use Symfony\Component\HttpFoundation\Response;

class AnimalController
{
 
  public function getAnimals()
  {
    $model = new AnimalModel();
    $animals = $model->getAnimals();
    $name = $animals->getName();

    return new Response();
  }

}