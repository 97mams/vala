<?php

namespace App\controller;

use App\model\AnimalModel;
use App\model\TraitementModel;
use App\model\TreatModel;
use Symfony\Component\HttpFoundation\Request;

class TreamentController
{
  private int $breed;

  private function treatStoreWithAnimal(int $idTraitement):void
  {
    $treat = new TreatModel();
    $animals = (new AnimalModel())->getAnimals()->fetchAll();
    foreach($animals as $animal) {
      $treat->store($animal['id_animale'], $this->breed);
    }
  }

  public function store(Request $request):bool
  {
    $model = new TraitementModel();
    $this->breed = $request->get('idBreed');
    $model->store($request);
    $treatments =  $model->index();
    $this->treatStoreWithAnimal($treatments[0]['id_traitement']);
    return true;
  }

}