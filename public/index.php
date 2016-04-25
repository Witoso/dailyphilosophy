<?php

$app = require_once '../app/bootstrap.php';

$app->get('/', 'home.controller:indexAction')
    ->bind('homepage');

$app->get('/discover', 'discover.controller:showArticleAction')
    ->bind('discover');

$app->run();
