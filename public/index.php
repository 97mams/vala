<?php

require "../vendor/autoload.php";

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\BodyRendererInterface;

$app = new \Silex\Application();
$app['debug'] = true;



$app->get('/', function(Request $request)
 {
  $name = 'mamisoa';
 
  require '../src/vue/page/index.php';
  return new Response();
  }
);
$app->run();

