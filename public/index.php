<?php

require "../vendor/autoload.php";

use App\controller\AnimalController;
use App\model\AnimalModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;


$app = new \Silex\Application();
$app['debug'] = true;


$app->get('/', function(Request $request)
{
  $model = new AnimalModel();
  $row = $model->getAnimals();
  $animals = $row->fetchAll();
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
  $model = new AnimalModel();
  $animals = $model->store($request);
  return new RedirectResponse('/');
}
);

$app->run();