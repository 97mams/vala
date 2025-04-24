<?php

namespace App\model;

use App\config\ConnextionBdd;
 
class GenreModel
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
    $date = date("m-d-y", time());
    $name = $request->get('name_type');
    try{
      $db = ConnextionBdd::connect();
      $types = $db->query('INSERT INTO genre (nom_genre, created_at, update_at) VALUES ("'.$name.'"'.$date.', '.$date.')');
     return $types->fetchAll();
    } catch (\PDOException $th) {
      throw $th;
    } 
  }

}