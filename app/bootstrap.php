<?php
require_once dirname(__FILE__, 2) . '/vendor/autoload.php';

use DailyPhilosophy\MyApp;



$app = new MyApp();

require_once __DIR__ . '/controllers.php';
require_once __DIR__ . '/routes.php';
require_once __DIR__ . '/services.php';


return $app;
