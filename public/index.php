<?php
require_once '../vendor/autoload.php';

use App\controller\testController;
use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;

$test = $app['App\controller\testController'];


$test->get('/hello',$test);
$test->run();