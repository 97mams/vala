<?php

namespace App\model;

use App\config\ConnextionBdd;
use Error;

class TreatModel
{
  public function index():array
  {
    try {
      $db = ConnextionBdd::connect();
      $query = $db->query("SELECT * FORM traiter");
      return $query->fetchAll();
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function getTreatByAnimal($idAnimal):array
  {
    try {
      $db = ConnextionBdd::connect();
      $query = $db->query("SELECT * FORM traiter WHERE id_animale=".$idAnimal);
      return $query->fetchAll();
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function store($aniaml, $treatment) : void
  {
    $status = 0;
    try {
      $db = ConnextionBdd::connect();
      $db->query("INSERT INTO traiter (id_animale, id_traitement,status) VALUES(".(int)$aniaml.", ".(int)$treatment.", ".$status.")");
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }
}