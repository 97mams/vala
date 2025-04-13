<?php

namespace App\controller;

use App\model\AnimalModel;
use App\model\TraitementModel;
use App\model\TreatModel;
use Symfony\Component\HttpFoundation\Request;

class TreamentController
{

  private function treatStoreWithAnimal(int $idTraitement):void
  {
    $treat = new TreatModel();
    $animals = (new AnimalModel())->getAnimals()->fetchAll();
    $idTraitement = (new TraitementModel())->getTraitementLastReccord();
    foreach($animals as $animal) {
     if ($animal['id_type'] === $idTraitement[0]['id_type']) {
      $treat->store($animal['id_animale'], $idTraitement[0]['id_traitement']);
     }
    }
  }

  public function store(Request $request):bool
  {
    $model = new TraitementModel();
    $model->store($request);
    $treatments =  $model->index();
    $this->treatStoreWithAnimal($treatments[0]['id_traitement']);
    return true;
  }

}