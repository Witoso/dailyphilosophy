<?php

use DailyPhilosophy\Controllers\HomeController;
use DailyPhilosophy\Controllers\DiscoverController;
use DailyPhilosophy\Controllers\MeetController;

$app['home.controller'] = $app->share(function() use ($app) {
    return new HomeController();
});

$app['discover.controller'] = $app->share(function () use ($app) {
    return new DiscoverController($app['html.parser']);
});

$app['meet.controller'] = $app->share(function() use ($app) {
    return new MeetController($app['db']);
});