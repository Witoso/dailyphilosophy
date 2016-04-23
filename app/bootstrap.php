<?php
require_once '../vendor/autoload.php';

use DailyPhilosophy\MyApp;

$app = new MyApp();

$app['htmlParser'] = $app->share(function() {
  return new \PHPHtmlParser\Dom;
});

$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__ . '/../resources/views'
));

return $app;
