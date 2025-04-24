<?php

namespace App\model;

use App\config\ConnextionBdd;
use Error;
use PDOStatement;

class AnimalModel
{

  public function getAnimals():PDOStatement
  {
    $db = ConnextionBdd::connect();
    $query = $db->query('SELECT * from animale JOIN genre on animale.id_genre=genre.id_genre JOIN type_elevage on animale.id_type= type_elevage.id_type');
    return $query;
  }
  
  public function getAnimalById(int $id)
  {
    $db = ConnextionBdd::connect();
    $query = $db->query('SELECT * from animale JOIN genre on animale.id_genre=genre.id_genre JOIN type_elevage on animale.id_type= type_elevage.id_type where id_animale='.$id);

    return $query->fetch();
  }

  public function getAnimalByName(String $name)
  {
    $db = ConnextionBdd::connect();
    $query = $db->query('SELECT * from animale where nom_animale="'.$name.'"');
    
    return $query->fetch();
  }
  
  public function store($request):bool
  {
    $date = date("y-m-d H:i:s", time());

    $name = $request->get('name');
    $genre = $request->get('genre');
    $type = $request->get('type');
    $age = $request->get('age');
    //unique name animal
    $verif = $this->uniqueNameAnimal($name);
    $createdAt = $date;
    $updatedAt = $date;
    $db = ConnextionBdd::connect();
    if ($verif) {
      return false;
    } else {
      $d = $db->query('INSERT INTO animale (nom_animale, id_genre, age, id_type, created_at, update_at) Values("'.$name.'", '.(int)$genre.', '.(int)$age.', '.(int)$type.', '.$createdAt.' '.$updatedAt.')');
      return true;
    }
    try {
    } catch (\Throwable $th) {
     throw new Error($th);
    }
  }

  public function update($request):bool
  {
    $db = ConnextionBdd::connect();
    try {
      $d = $db->query('UPDATE animale 
                  SET nom_animale="'.$request->get('nom_animale').'"
                  WHERE id_animale='.(int)$request->get('id_animale'));
      return true;
    } catch (\PDOException $th) {
      throw $th->getMessage();
    }
  }

  public function delete($id)
  {
    $db = ConnextionBdd::connect();
    $query = $db->query("DELETE FROM animale where id_animale = ".(int)$id );
  }

  private function uniqueNameAnimal(string $name):bool
  { $db = ConnextionBdd::connect();
    $query = $db->query('SELECT * FROM animale WHERE nom_animale = "'.$name.'"');
    $row = count($query->fetchAll());
    if($row) {
      return true;
    }
    return false;
  }
}