<?php
namespace DailyPhilosophy\Controllers;

use DailyPhilosophy\MyApp;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
  public function indexAction(MyApp $app)
  {
    return $app->render('base.html.twig');
  }

}
