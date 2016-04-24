<?php
require_once '../vendor/autoload.php';

use DailyPhilosophy\MyApp;
use DailyPhilosophy\Controllers\DiscoverController;

$app = new MyApp();

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__ . '/../resources/views'
));


$app['htmlParser'] = function() {
  return new \PHPHtmlParser\Dom;
};


$app['discover.controller'] = $app->share(function() use($app) {
  return new DiscoverController($app['htmlParser']);
});


$app['debug'] = true;



return $app;
