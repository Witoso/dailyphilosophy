<?php

use DailyPhilosophy\Controllers\HomeController;
use DailyPhilosophy\Controllers\DiscoverController;
use DailyPhilosophy\Controllers\MeetController;
use DailyPhilosophy\Controllers\ReadController;

$app['home.controller'] = $app->share(function() use ($app) {
    return new HomeController();
});

$app['discover.controller'] = $app->share(function () use ($app) {
    return new DiscoverController($app['html.parser']);
});

$app['meet.controller'] = $app->share(function() use ($app) {
    return new MeetController($app['db']);
});

$app['read.controller'] = $app->share(function() use ($app) {
    return new ReadController($app['db']);
});