<?php

namespace App\model;

use App\config\ConnextionBdd;
use Error;

class TypeBreedModel
{

  public function index()
  {
    try{
      $db = ConnextionBdd::connect();
      $types = $db->query("SELECT * FROM type_elevage");
     return $types->fetchAll();
    } catch (\PDOException $th) {
      throw $th;
    } 
  }

  public function getTypeBreedByName(string $name) : array
  {
    try{
      $db = ConnextionBdd::connect();
      $types = $db->query("SELECT * FROM type_elevage WHERE nom_type = ".$name);
     return $types->fetchAll();
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function store($request) 
  {
    $date = date("m-d-y", time());
    $name = $request->get('type_animal');
    try {
      $db = ConnextionBdd::connect();
      $db->query('INSERT INTO type_elevage (nom_type, created_at, updated_at) VALUES ("'.$name.'",'.$date.','.$date.')');
      return true;
    } catch (\PDOException $th) {
      throw $th;
    }
  }

}