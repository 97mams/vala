<?php

namespace App\model;

use App\config\ConnextionBdd;
use Symfony\Component\HttpFoundation\Request;

class StoryModel
{
  /** connect db */
  private $db;

  public function __construct()
  {
    $this->db = ConnextionBdd::connect();
  }

  /**
   * get story for a bread by idAnimal
   * @param string $idAnimal
   * @return array [breads]
   */
  public function getStory( $idAnimal)
  {
    try {
      $hitoriques = $this->db->query("SELECT nom_traitement, description, date_traiter FROM historiques where id_animale = ". $idAnimal);
      return $hitoriques->fetchAll();
    } catch (\PDOException $th) {
      echo $th;
    }
  }

  /**
   * register story
   * @param Request $request
   * @return void
   */
  public function store(Request $request):void
  {
    $nameTreatment = $request->get('nom_traitement');
    $idAnimal      = $request->get('id_animal');
    $description   = $request->get('description');
    $date          = $request->get('date');
    try {
      $this->db->query('INSERT INTO historiques (id_animale, nom_traitement, date_traiter, description) 
      VALUES('. $idAnimal .', "'.$nameTreatment.'", "'.$date.'", "'.$description.'")');
    } catch (\PDOException $th) {
      echo $th;
    }
  }

}