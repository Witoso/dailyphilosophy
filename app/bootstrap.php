<?php
require_once '../vendor/autoload.php';

use DailyPhilosophy\MyApp;

$app = new MyApp();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__ . '/../resources/views'
));

return $app;
