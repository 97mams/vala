<?php

namespace App\controller;

use App\model\TreatModel;

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
    $treatPendin = array_filter($treats,  function($treat) {$treat['status'] === 0; });
    return $treatPendin;
  }

}