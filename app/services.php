<?php

use GuzzleHttp\Client;
use DailyPhilosophy\Content\PhilosopherGraph;

$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../resources/views'
));

$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\DoctrineServiceProvider() , array(
    'db.options' => array(
        'driver' => 'pdo_mysql',
        'dbname' => 'dailyPhilosophy'
        // add your user
        // add your password
    ),
));

$app['http.client'] = $app->share(function() use($app) {
    return new Client();
});

$app['html.parser'] = function () {
    return new \PHPHtmlParser\Dom();
};

$app['graph'] = function() use ($app) {
    return new PhilosopherGraph($app['http.client']);
};