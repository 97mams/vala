<?php

namespace App\controller;

use App\model\AnimalModel;
use App\model\TraitementModel;
use App\model\TreatModel;
use Symfony\Component\HttpFoundation\Request;

class AnimalController
{

  public function breatStore(string $nameAnimal, int $idBreed)
  {
    $modelAnimal = (new AnimalModel())
            ->getAnimalByName($nameAnimal);
    $modelTreatments = (new TraitementModel())
            ->getTraitementByIdBreed($idBreed);
    foreach ($modelTreatments as $treatment) {
      (new TreatModel())
      ->store(
        $modelAnimal['id_animale'], 
        $$treatment['id_traitement']
      );
    }
  }

  public function strore(Request $request): bool
  {
    $model = (new AnimalModel())
            ->store($request);
    if ($model) {
      $this->breatStore($request->get('name'), $request->get('type'));
      return true;
    }
    return false;
  }
}