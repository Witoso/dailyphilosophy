<?php
namespace DailyPhilosophy\Controllers;

use DailyPhilosophy\MyApp;
use DailyPhilosophy\Content\StanfordArticle;
use Symfony\Component\HttpFoundation\Request;

class DiscoverController
{

  private $htmlParser;

  public function __construct(\PHPHtmlParser\Dom $dom)
  {
    $this->htmlParser = $dom;
  }

  public function showArticleAction(MyApp $app)
  {
    $article = new StanfordArticle($this->htmlParser);
    $article->downloadArticle();
    return $app->render('discover.html.twig', array(
      'article' => $article
    ));
  }

}
