<?php

namespace App\model;

use App\config\ConnextionBdd;
use Symfony\Component\HttpFoundation\Request;

class StoryModel
{
  /** connect db */
  private $db;

  public function __construct(){
    $this->db = ConnextionBdd::connect();
  }

  /**
   * get story for a bread by idBread
   * @param int $idbread
   * @return array [breads]
   */
  public function getStory(int $IdBread): array
  {
    //
  }

  /**
   * register story
   * @param Request $request
   * @return void
   */
  public function store(Request $request):void
  {
    
  }

}