<?php

namespace App\model;

use App\config\ConnextionBdd;
use Error;

class TraitementModel
{

  public function index():array
  {
    $db = ConnextionBdd::connect();
    try {
      $result = $db->query("SELECT * FROM traitement JOIN type_elevage on traitement.id_type=type_elevage.id_type");
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
      $db->query('INSERT INTO traitement(type,nom_traitement, description, duree, id_type, created_at, updated_at) VALUES ("'.$type.'","'.$name.'", "'.$description.'", '.(int)$duration.', '.(int)$breed.','.$date.','.$date.')');
      return true;
    } catch (\PDOException $th) {
      throw new Error($th);
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