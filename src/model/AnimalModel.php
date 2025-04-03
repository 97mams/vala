<?php

namespace App\model;

use App\config\ConnextionBdd;
use App\entity\Animal;

class AnimalModel
{

  public function getAnimals():Animal
  {
    $animal = new Animal();
    $db = ConnextionBdd::connect();
    $query = $db->query('SELECT * from animale');
    $row = $query->fetch();

    $animal->setName($row['name']);
    $animal->setGenre($row['genre']);
    $animal->setType($row['type']);
    $animal->setSexe($row['sexe']);
    $animal->setAge($row['age']);
    return $animal;
  }

  public function getAnimal(int $id)
  {
    $db = ConnextionBdd::connect();
    $query = $db->query("SELECT * from animale where id=".$id );

    return $query->fetch();
  }
}