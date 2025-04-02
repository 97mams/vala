<?php
require_once '../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$app = new \Silex\Application();
$app['debug'] = true;
$app->get('/hello', function () {
 return new Response('<h1>hello</h1>');
});

$app->run();