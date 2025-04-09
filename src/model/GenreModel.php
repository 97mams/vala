<?php

namespace App\model;

use App\config\ConnextionBdd;
 
class AnimalModel
{

  public function index()
  {
    try{
      $db = ConnextionBdd::connect();
      $types = $db->query("SELECT * FROM genre");
     return $types->fetchAll();
    } catch (\PDOException $th) {
      throw $th;
    } 
  }

  public function store($request)
  {
    $name = $request->get('name_type');
    try{
      $db = ConnextionBdd::connect();
      $types = $db->query('INSERT INTO genre (nom_genre) VALUES ("'.$name.'")');
     return $types->fetchAll();
    } catch (\PDOException $th) {
      throw $th;
    } 
  }

}