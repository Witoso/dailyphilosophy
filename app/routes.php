<?php


$app->get('/', 'home.controller:indexAction')
    ->bind('homepage');

$app->get('/discover', 'discover.controller:showArticleAction')
    ->bind('discover');

$app->get('/meet', 'meet.controller:showAllAction')
    ->bind('meet');

$app->get('/meet/{name}', function($name) use ($app) {
    return $app['meet.controller']->showDetailsAction($app, $app['graph'], $name);
})->bind('details');