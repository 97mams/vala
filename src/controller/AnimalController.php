<?php

namespace App\controller;

use App\model\AnimalModel;
use App\model\TraitementModel;
use App\model\TreatModel;
use Symfony\Component\HttpFoundation\Request;

class AnimalController
{

  public function cowBreed($id)
  {
    
  }

  public function treatStore(string $nameAnimal, int $idBreed):void
  {
    $traet = new TreatModel();
    $modelAnimal = (new AnimalModel())
            ->getAnimalByName($nameAnimal);
    $modelTreatments = (new TraitementModel())
            ->getTraitementByIdBreed($idBreed);
    foreach ($modelTreatments as $treatment){ 
        $traet->store(
        $modelAnimal['id_animale'], 
        $treatment['id_traitement']
      );
    }
  }

  public function store(Request $request): bool
  {
    $model = (new AnimalModel())
            ->store($request);
    if ($model) {
      $this->treatStore($request->get('name'), $request->get('type'));
      return true;
    }
    return false;
  }
}