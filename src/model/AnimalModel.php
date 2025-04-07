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
    $query = $db->query("SELECT * from animale where id_animale=".$id );

    return $query->fetch();
  }

  public function store($request):bool
  {
    $name = $request->get('name');
    $genre = $request->get('genre');
    $type = $request->get('type');
    $traitement = $request->get('traitement');
    $age = $request->get('age');
    try {
    $db = ConnextionBdd::connect();
    $b = $db->query('INSERT INTO animale (nom_animale, genre_animale, age,id_type, id_traitement) Values("'.$name.'", "'.$genre.'", "'.$age.'", "'.$type.'", '.$traitement.')');
      return true;
    } catch (\Throwable $th) {
      return false;
     }
  }

  public function delete($id)
  {
    $db = ConnextionBdd::connect();
    $query = $db->query("DELETE FROM animale where id_animale = ".(int)$id );
  }
}