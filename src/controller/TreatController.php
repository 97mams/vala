<?php

namespace App\controller;

use App\model\TraitementModel;
use App\model\TreatModel;
use Symfony\Component\HttpFoundation\Request;

class TreatController
{
  
  private $treatModel;
  private $treatmentModel;

  public function __construct()
  {
    $this->treatModel = new TreatModel();
    $this->treatmentModel = new TraitementModel();
  }

  /**
   * get treat animal is pendin
   * @param int $id
   * @return array
   */
  public function getAnimalById(int $id):array
  {
    $treats = $this->treatModel->getTreatByAnimal($id);
    $treatPendin = array_filter($treats,  function($treat) {
      if ((int)$treat['status'] === 0) {
        return $treat;
      } 
    });
    return $treatPendin;
  }

  public function updateStatus(Request $request):bool
  {
    $treat =  $this->treatModel; 
    $this->treatmentModel->updateDate( $request->get('id_treatment'));
    $treat->store($request->get('id_animal'), $request->get('id_treatment'));
    $treat->updateStatus($request->get('id_treat'));
    return true;
  }

}