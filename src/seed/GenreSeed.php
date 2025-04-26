<?php

namespace App\seed;

use App\model\GenreModel;
use Symfony\Component\HttpFoundation\Request;

class GenreSeed
{

  public function seed():void
  {
    $genres = ['male', 'femelle'];
      $request = Request::create('/genre','POST', ['name_type' => 'male']);
      // var_dump($request->get('name_type'));
     (new GenreModel())->store($request);
  }

}