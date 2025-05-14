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
      $query = $db->query("SELECT * FROM traiter JOIN traitement on traiter.id_traitement=traitement.id_traitement  WHERE traiter.id_animale=".$idAnimal);
      return $query->fetchAll();
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  /**
   * 
   * @param int $animal
   * @param int $treatment
   * 
   */
  public function store($animal, $treatment) : void
  {
    $date = date("y-m-d H:is", time());
    $status = 0;
    try {
      $db = ConnextionBdd::connect();
      $db->query("INSERT INTO traiter (id_animale, id_traitement, status, created_at, updated_at) VALUES(".(int)$animal.", ".(int)$treatment.", ".$status.",'".$date."','".$date."')");
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function updateStatus($idAnimal)
  {
    $date = date("y-m-d H:is", time());
    $status = 1;
    try {
      $db = ConnextionBdd::connect();
      $db->query('UPDATE traiter SET status ='.$status.' , updated_at="'.$date.'" WHERE id_animale ='.(int)$idAnimal);
    } catch (\PDOException $th) {
      throw new Error($th);
    } 
  }

  public function delete($id)
  {
    $db = ConnextionBdd::connect();
    try {
      $db->query("DELETE FROM traiter WHERE id_traiter = ".(int)$id);
      return true;
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }
}