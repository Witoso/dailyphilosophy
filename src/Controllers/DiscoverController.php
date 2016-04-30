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

    public function showPageAction(MyApp $app)
    {
        return $app->render('discover.html.twig');
    }

    public function getArticleAction(MyApp $app)
    {
        $article = new StanfordArticle($this->htmlParser);
        $article->downloadArticle();
        return $app->json($article);
    }

}
