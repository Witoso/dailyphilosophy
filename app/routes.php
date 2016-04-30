<?php


$app->get('/', 'home.controller:indexAction')
    ->bind('homepage');

$app->get('/discover', 'discover.controller:showPageAction')
    ->bind('discover');

$app->get('/discover/getArticle', 'discover.controller:getArticleAction')
    ->bind('getArticle');

$app->get('/meet', 'meet.controller:showAllAction')
    ->bind('meet');

$app->get('/meet/{name}', function($name) use ($app) {
    return $app['meet.controller']->showDetailsAction($app, $app['graph'], $name);
})->bind('details');