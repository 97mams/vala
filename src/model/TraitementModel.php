<?php

namespace App\model;

use App\config\ConnextionBdd;

class TraitementModel
{

  public function index():array
  {
    $db = ConnextionBdd::connect();
    try {
      $result = $db->query("SELECT * FROM traitement");
      return $result->fetchAll();
    } catch (\PDOException $th) {
      throw $th;
    }
  }

  public function store($request)
  {
    $db = ConnextionBdd::connect();
    $type = $request->get('type');
    $description = $request->get('description');
    $name = $request->get('name');
    $duration = $request->get('duration');
    $status = 0;
    try {
      $db->query('INSERT INTO traitement(type,nom_traitement, description, duree, status) VALUES ("'.$type.'","'.$name.'", "'.$description.'", '.(int)$duration.', '.$status.')');
      return true;
    } catch (\PDOException $th) {
      return false;
    }
  }

}