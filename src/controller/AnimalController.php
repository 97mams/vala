<?php

namespace App\controller;

use App\model\AnimalModel;
use Silex\Controller;
use Symfony\Component\HttpFoundation\Response;

class AnimalController
{
 
  public function getAnimals()
  {
    $model = new AnimalModel();
    $animals = $model->getAnimals();
    $name = $animals->getName();
    $genre = $animals->getGenre();
    $type = $animals->getType();
    $sexe = $animals->getSexe();
    $age = $animals->getAge();
    return [
      'name' => $name,
      'genre' => $genre,
      'type' => $type,
      'name' => $name,
      'age' => $age,
    ];
  }

}