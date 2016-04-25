<?php
require_once '../vendor/autoload.php';

use DailyPhilosophy\MyApp;
use DailyPhilosophy\Controllers\HomeController;
use DailyPhilosophy\Controllers\DiscoverController;


$app = new MyApp();

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../resources/views'
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['htmlParser'] = function () {
    return new \PHPHtmlParser\Dom;
};

$app['home.controller'] = $app->share(function() use ($app) {
    return new HomeController();
});

$app['discover.controller'] = $app->share(function () use ($app) {
    return new DiscoverController($app['htmlParser']);
});


$app['debug'] = true;


return $app;
