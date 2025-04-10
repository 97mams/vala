<?php

require "../vendor/autoload.php";

use App\model\AnimalModel;
use App\model\GenreModel;
use App\model\TraitementModel;
use App\model\TypeBreedModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;


$app = new \Silex\Application();
$app['debug'] = true;


$app->get('/', function()
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
  $type = (new TypeBreedModel())->index();
  $genre = (new GenreModel())->index();
  $animal = ['name'=>'', 'age' => ''];
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
  $breed = (new TypeBreedModel())->index();
  $treatments = (new TraitementModel())->index();
  include '../src/vue/page/setting.php';
  return new Response();
});

$app->post('/setting', function (Request $request)
{
  $model = new TypeBreedModel();
  $isReccord =  $model->store($request);
  include '../src/vue/page/setting.php';
  return new Response();
});

$app->post('/setting/treatment', function (Request $request)
{
  $model = new TraitementModel();
  $isReccord =  $model->store($request);
  include '../src/vue/page/setting.php';
  return new Response();
});

$app->run();