<?php

namespace App\model;

use App\config\ConnextionBdd;

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

  public function store($request) 
  {
    $name = $request->get('type_animal');
    try {
      $db = ConnextionBdd::connect();
      $query = $db->query('INSERT INTO type_elevage (nom_type) VALUES ("'.$name.'")');
      
      return true;
    } catch (\PDOException $th) {
      throw $th;
    }
  }

}