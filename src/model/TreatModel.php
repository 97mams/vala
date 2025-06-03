<?php

namespace App\model;

use App\config\ConnextionBdd;
use Error;

class TreatModel
{
  public function index():array
  {
    $getArgs = func_get_args();
    $query = "SELECT * FROM traiter JOIN traitement on traiter.id_traitement=traitement.id_traitement";
    if(!empty($getArgs)){
      $query ="SELECT ". GenerateFields::get($getArgs) ." FROM traiter JOIN traitement  on traiter.id_traitement=traitement.id_traitement";
    }
    try {
      $db = ConnextionBdd::connect();
      $query = $db->query($query);
      return $query->fetchAll();
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function countTreatByTreatmentId(int $idTreatment):int
  {
    try {
      $db = ConnextionBdd::connect();
      $query = $db->query("SELECT id_traitement FROM traiter WHERE id_traitement = ".(int)$idTreatment." AND status=1");
      return count($query->fetchAll());
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function getTreatByAnimal($idAnimal):array
  {
    try {
      $db = ConnextionBdd::connect();
      $query = $db->query("SELECT 
      traitement.id_traitement,
      traiter.id_traiter,
      traiter.id_animale,
      traitement.id_type as id_breed,
      traitement.nom_traitement, 
      traitement.type, 
      traitement.description, 
      traitement.duree,
      status,
      traitement.created_at as created_at_treatment,
      traitement.updated_at as updated_at_treatment,
      traiter.created_at as created_at_treat,
      traiter.updated_at as updated_at_treat
      FROM traiter 
      JOIN traitement 
      on traiter.id_traitement=traitement.id_traitement  
      WHERE traiter.id_animale=".$idAnimal);
      return $query->fetchAll();
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  /**
   * get animals story
   * 
   */
  public function getTreatByUpdatedAt(int $id):array
  {
    try {
      $db = ConnextionBdd::connect();
      $query = $db->query("SELECT * FROM traiter JOIN traitement on traiter.id_traitement=traitement.id_traitement  WHERE traiter.id_animale=".$id." AND status=1 ");
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
    $date = date("y-m-d H:m:s", time());
    $status = 0;
    try {
      $db = ConnextionBdd::connect();
      $db->query("INSERT INTO traiter (id_animale, id_traitement, status, created_at, updated_at) VALUES(".(int)$animal.", ".(int)$treatment.", ".$status.",'".$date."','".$date."')");
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function updateStatus($idTreat)
  {
    $date = date("y-m-d H:m:s", time());
    $status = 1;
    try {
      $db = ConnextionBdd::connect();
      $db->query('UPDATE traiter SET status ='.$status.' , updated_at="'.$date.'" WHERE id_traiter ='.(int)$idTreat);
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