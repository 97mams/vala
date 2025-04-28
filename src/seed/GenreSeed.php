<?php

namespace App\seed;

use App\model\GenreModel;
use Symfony\Component\HttpFoundation\Request;

class GenreSeed
{

  public function seed():void
  {
    $genres = ['male', 'femelle'];
      foreach($genres as $genre){
        $request = Request::create('/genre','POST', ['name_type' => $genre]);
        (new GenreModel())->store($request);
      }
  }

  public function down()
  {
    //
  }

}