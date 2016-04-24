<?php

namespace DailyPhilosophy\Content;

use DailyPhilosophy\Interfaces\Article;


class StanfordArticle implements Article
{
  const randomArticle = 'http://plato.stanford.edu/cgi-bin/encyclopedia/random';
  private $domParser;
  private $intro;
  private $url;
  private $title;


  public function __construct(\PHPHtmlParser\Dom $dom)
  {
    $this->domParser = $dom;
  }

  public function downloadArticle()
  {
    $this->domParser->loadFromUrl(StanfordArticle::randomArticle);
    $this->intro = strip_tags(html_entity_decode($this->domParser->find('#preamble')->innerHtml));
    $this->title = $this->domParser->find('#aueditable h1')->text;
  }

  public function getIntro(): string
  {
    return $this->intro;
  }
  public function getUrl(): string {}

  public function getTitle(): string
  {
      return $this->title;
  }

}
