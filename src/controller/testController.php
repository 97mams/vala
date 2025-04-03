<?php

namespace App\controller;

use Silex\Controller;
use Symfony\Component\HttpFoundation\Response;

class testController extends Controller
{

  public function getpo() {
    
    return new Response('mety');
  }

}