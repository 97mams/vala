<?php

namespace App\controller;

use App\model\TreatModel;
use Symfony\Component\HttpFoundation\Request;

class TreatController
{
  
  /**
   * get treat animal is pendin
   * @param int $id
   * @return array
   */
  public function getAnimalById(int $id):array
  {
    $treats = (new TreatModel())->getTreatByAnimal($id);
    $treatPendin = array_filter($treats,  function($treat) {
      if ((int)$treat['status'] === 0) {
        return $treat;
      } 
    });
    return $treatPendin;
  }

  public function updateStatus(Request $request):bool
  {
    $treat =  new TreatModel();
    $treat->store($request->get('id_animal'), $request->get('id_treat'));
    $treat->updateStatus($request->get('id_treat'));
    return true;
  }

}