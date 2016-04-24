<?php

$app = require_once '../app/bootstrap.php';

$app->get('/', 'DailyPhilosophy\Controllers\HomeController::indexAction')
->bind('homepage');

$app->get('/discover', 'discover.controller:showArticleAction')
->bind('discover');

$app->run();
