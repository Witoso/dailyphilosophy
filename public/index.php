<?php

$app = require_once '../app/bootstrap.php';

$app->get('/', function() use ($app){
  return $app['twig']->render('base.html.twig');
});

$app->run();
