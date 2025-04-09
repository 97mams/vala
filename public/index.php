<?php

require "../vendor/autoload.php";

use App\model\AnimalModel;
use App\model\GenreModel;
use App\model\TypeElevageModel;
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
  $type = (new TypeElevageModel())->index();
  $genre = (new GenreModel())->index();
  $animal = ['name'=>'', 'genre' => '', 'sexe' => '', 'age' => ''];
  require '../src/vue/page/register.php';
  return new Response();
}
);

$app->post('/store', function(Request $request) 
{
  $model = new AnimalModel();
  $animal = $model->store($request);
  
  return new RedirectResponse('/');
});

$app->post('/update', function(Request $request){
dd($request);
});

$app->get('/edit/animal/{id}', function ($id)
{
  $idAnimal = (int)$id;
  $model = new AnimalModel();
  $animal = $model->getAnimal($idAnimal);
  require '../src/vue/page/edit.php';
  return new Response();
});

$app->post('/animal', function (Request $request)
{
  $id = $request->get('id');
  $model = new AnimalModel();
  $model->delete($id);
  return new RedirectResponse('/');
});

$app->get('/animal/{id}', function ($id)
{
  $model = new AnimalModel();
  $animal = $model->getAnimal((int)$id);
  require '../src/vue/page/detail.php';
  return new Response();
});

//route for setting

$app->get('/setting', function () {
  include '../src/vue/page/setting.php';
  return new Response();
});

$app->post('/setting', function (Request $request)
{
  $model = new TypeElevageModel();
  $isReccord =  $model->store($request);
  include '../src/vue/page/setting.php';
  return new Response('/');
});

$app->run();