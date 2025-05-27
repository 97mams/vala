<?php

namespace App\controller;

use App\model\TreatModel;
use Symfony\Component\HttpFoundation\Request;

class TreatController
{
  
  private $treatModel;

  public function __construct()
  {
    $this->treatModel = new TreatModel();
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
    $treat->store($request->get('id_animal'), $request->get('id_treatment'));
    $treat->updateStatus($request->get('id_treat'));
    return true;
  }

  /**
   * check last reccord treat
   * @param int $newIdTreat
   * @return bool
   */
  public function checkLastTreat($newIdTreat): bool
  {
    $id = $newIdTreat - 1;
    $this->treatModel->getTreatByAnimal($id);
    return true;
  }

}