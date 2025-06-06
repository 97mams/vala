<?php

namespace App\model;

use App\config\ConnextionBdd;
use Error;

class TraitementModel
{

  public function index():array
  {
    $getArgs  = func_get_args();
    $db = ConnextionBdd::connect();
    $query = "SELECT * FROM traitement JOIN type_elevage on traitement.id_type=type_elevage.id_type";

    if (!empty($getArgs)) {
      $query = "SELECT ". GenerateFields::get($getArgs) ." FROM traitement JOIN type_elevage on traitement.id_type=type_elevage.id_type";
    }
    try {
      $result = $db->query($query);
      return $result->fetchAll();
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }

  public function getTraitementLastReccord():array
  {
    $db = ConnextionBdd::connect();
    try {
      $result = $db->query("SELECT * FROM traitement Order by id_traitement DESC LIMIT 0,1");
      return $result->fetchAll();
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }

  public function countTreatmentByIdBreed(int $idBreed):int
  {
    $db = ConnextionBdd::connect();
    try {
      $result = $db->query("SELECT id_type FROM traitement WHERE id_type=".$idBreed);
      return count($result->fetchAll());
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }

  public function getTraitementByIdBreed($idBreed):array
  {
    $db = ConnextionBdd::connect();
    try {
      $result = $db->query('SELECT * FROM traitement JOIN type_elevage on traitement.id_type=type_elevage.id_type WHERE traitement.id_type = '.(int)$idBreed);
      return $result->fetchAll();
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }

  public function store($request):bool
  {
    $date = date("y-m-d H:i:s", time());
    $db = ConnextionBdd::connect();
    $type = $request->get('type');
    $description = $request->get('description');
    $name = $request->get('name');
    $duration = $request->get('duration');
    $breed = $request->get('idBreed');
    try {
      $db->query('INSERT INTO traitement(type,nom_traitement, description, duree, id_type, created_at, updated_at) VALUES ("'.$type.'","'.$name.'", "'.$description.'", '.(int)$duration.', '.(int)$breed.',"'.$date.'","'.$date.'")');
      return true;
    } catch (\PDOException $th) {
      throw new Error($th);
    }
  }

  public function updateDate($idTreament)
  {
    $date = date("y-m-d H:m:s");
    $db = ConnextionBdd::connect();
    try {
      $db->query('UPDATE traitement set updated_at = "'.$date.'" WHERE id_traitement='.$idTreament);
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }

  public function delete($id)
  {
    $db = ConnextionBdd::connect();
    try {
      $db->query("DELETE FROM traitement WHERE id_traitement = ".(int)$id);
      (new TreatModel())->delete($id);
      return true;
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }

}