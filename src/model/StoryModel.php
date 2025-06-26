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
   * get story for a bread by idBread
   * @param string $nameAnimal
   * @return array [breads]
   */
  public function getStory( $nameAnimal)
  {
    try {
      $hitoriques = $this->db->query('SELECT nomAnimale, nomTreament FROM historiques where nomAnimale = "'. $nameAnimal .'" ');
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
    $nameTreatment = $request->get('nameTreatmen');
    $nameAnimal    = $request->get('nameAnimal');
    try {
      $this->db->query('INSERT INTO historiques (nom_traitment, nom_animale, date_traitement) 
      VALUES("'. $nameAnimal .'", "'.$nameTreatment.'")');
    } catch (\PDOException $th) {
      echo $th;
    }
  }

}