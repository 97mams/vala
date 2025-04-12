<?php

require "../vendor/autoload.php";

use App\controller\AnimalController;
use App\controller\TreamentController;
use App\model\AnimalModel;
use App\model\GenreModel;
use App\model\TraitementModel;
use App\model\TreatModel;
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
  $animal = ['nom_animale'=>'','id_type'=>'','id_genre'=>'','nom_genre'=>'', 'age' => ''];
  require '../src/vue/page/register.php';
  return new Response();
}
);

$app->post('/store', function(Request $request) 
{
  $animal =  (new AnimalController())
  ->store($request);
  if(!$animal){
      $nom_animale = $request->get('name');
      $id_type     = $request->get('type');
      $id_genre    = $request->get('genre'); 
      $age         = $request->get('age');
    
    return new RedirectResponse('/register?error=1&nom_animale='.$nom_animale.'&id_type='.$id_type.'&id_genre='.$id_genre.'&age='.$age);
  }  else {
    return new RedirectResponse('/');
  }
 
});

$app->post('/update', function(Request $request){
dd($request);
});

$app->get('/edit/animal/{id}', function ($id)
{
  $idAnimal = (int)$id;
  $model = new AnimalModel();
  $genre = (new GenreModel())->index();
  $type = (new TypeBreedModel())->index();
  $animal = $model->getAnimalById($idAnimal);
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
  $animal = (new AnimalModel())->getAnimalById((int)$id);
  $treatments = (new TreatModel())->getTreatByAnimal($id);

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

$app->post('/setting/breed', function (Request $request)
{
  $model = new TypeBreedModel();
  $isReccordBreed =  $model->store($request);
  include '../src/vue/page/setting.php';
  return new Response();
});

//route for treatment

$app->post('/setting/treatment', function (Request $request)
{
  $isReccord = (new TreamentController())
    ->store($request);
    if(!$isReccord) {
      throw new Error('tsy mety');
    }
  return new RedirectResponse('/setting');
});

$app->get('/treatment/delete/{id}', function ($id)
{
  $model = (new TraitementModel())->delete($id);
  return new RedirectResponse('/setting');
});

$app->run();