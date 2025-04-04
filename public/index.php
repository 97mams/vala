<?php

require "../vendor/autoload.php";

use App\controller\AnimalController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;


$app->get('/', function(Request $request)
{
  $animalController = new AnimalController();
  $animals = $animalController->getAnimals();

  require '../src/vue/page/index.php';
  return new Response();
  }
);


$app->get('/register', function () 
{
  require '../src/vue/page/register.php';
  return new Response();
}
);

$app->post('/store', function(Request $request) 
{
  dd($request);
}
);

$app->run();