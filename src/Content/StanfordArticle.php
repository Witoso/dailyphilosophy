<?php

namespace DailyPhilosophy\Content;

use DailyPhilosophy\Interfaces\Article;


class StanfordArticle implements Article, \JsonSerializable
{
    const RANDOM_ARTICLE = 'http://plato.stanford.edu/cgi-bin/encyclopedia/random';
    private $domParser;
    private $intro;
    private $url;
    private $title;
    private $tableOfContents;



    public function __construct(\PHPHtmlParser\Dom $dom)
    {
        $this->domParser = $dom;
    }

    public function jsonSerialize()
    {
        return [
            "intro" => $this->intro,
            "url" => $this->url,
            "title" => $this->title,
            "toc" => $this->tableOfContents
        ];
    }

    public function downloadArticle()
    {
        $this->domParser->loadFromUrl(StanfordArticle::RANDOM_ARTICLE);
        $this->intro = $this->cleanHtml($this->domParser->find('#preamble')->innerHtml);
        $this->title = $this->domParser->find('#aueditable h1')->text;
        $this->url = $this->parseUrl($this->domParser->find('#article-nav > ul > li', 4)->firstChild()->getAttribute('href'));
        $this->tableOfContents = $this->domParser->find('#toc')->innerHtml;
    }

    private function cleanHtml(string $html): string
    {
        return strip_tags(html_entity_decode($html));
    }

    private function parseUrl(string $url): string
    {
        $base = 'http://plato.stanford.edu/entries/';
        return $base . substr(strstr($url, '='), 1);
    }


    public function getIntro(): string
    {
        return $this->intro;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

}
