<?php

namespace App\model;

use Symfony\Component\HttpFoundation\Request;

class StoryModel
{

  public function __construct(){}

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
    //
  }

}