<?php

namespace App\seed;

use App\CLI\Db;
use App\model\GenreModel;
use Symfony\Component\HttpFoundation\Request;

class GenreSeed implements SeedInterface
{

  private Db $db;

  public function __construct(Db $db)
  {
    $this->db = $db;
  }

  public function seed():void
  {
    $data = [ 
     [ "genre" => ['nom_genre' => "male"]],
     [ "genre" => ['nom_genre' => "femelle"]]
    ];

    foreach ($data as $genre) {
      $this->db->queryInsert($genre);
    }
  }

  public function down()
  {
    //
  }

}