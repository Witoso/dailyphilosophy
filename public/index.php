<?php

$app = require_once dirname(__FILE__, 2) . '/app/bootstrap.php';

$app['debug'] = true;

$app->run();


