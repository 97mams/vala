<?php

namespace App\model;

use App\config\ConnextionBdd;
use App\entity\Animal;
use PDO;
use PDOStatement;

class AnimalModel
{

  public function getAnimals():PDOStatement
  {
    $animal = new Animal();
    $db = ConnextionBdd::connect();
    $query = $db->query('SELECT * from animale');
    return $query;
  }

  public function getAnimal(int $id)
  {
    $db = ConnextionBdd::connect();
    $query = $db->query("SELECT * from animale where id=".$id );

    return $query->fetch();
  }

  public function store($request):bool
  {
     try {
      $name = $request->get('name');
      $genre = $request->get('genre');
      $type = $request->get('type');
      $sexe = $request->get('sexe');
      $age = $request->get('age');
      $db = ConnextionBdd::connect();
      $db->query("INSERT INTO animale (name, genre, type, sexe, age) Values('".$name."', '".$genre."', '".$type."', '".$sexe."', ".$age.")");
      return true;
  } catch (\Throwable $th) {
      return false;
     }
  }
}