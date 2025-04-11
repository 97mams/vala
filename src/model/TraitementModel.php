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

  public function store($request)
  {
    $db = ConnextionBdd::connect();
    $type = $request->get('type');
    $description = $request->get('description');
    $name = $request->get('name');
    $duration = $request->get('duration');
    $breed = $request->get('idBreed');
    try {
      $db->query('INSERT INTO traitement(type,nom_traitement, description, duree, id_type) VALUES ("'.$type.'","'.$name.'", "'.$description.'", '.(int)$duration.', '.(int)$breed.')');
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
      return true;
    } catch (\PDOException $th) {
      throw new Error( $th);
    }
  }

}