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
  ob_start();

  
  $name = ob_get_clean();
  require '../src/vue/page/index.php';
  return new Response();
  }
);
$app->run();

