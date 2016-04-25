<?php


use DailyPhilosophy\Content\StanfordArticle;
use \PHPHtmlParser\Dom;

class StanfordArticleTest extends PHPUnit_Framework_TestCase
{
    public function testParser()
    {
        $dom = new Dom();
        $this->assertInstanceOf('\PHPHtmlParser\Dom', $dom);
        return $dom;
    }

    /**
     * @depends testParser
     */
    public function testCreation(Dom $dom)
    {
        $stanArticle = new StanfordArticle($dom);
        $this->assertObjectHasAttribute('domParser', $stanArticle);
    }

    /**
     * @depends testParser
     */
    public function testDownloading(Dom $dom)
    {
        $stanArticle = new StanfordArticle($dom);
        $stanArticle->downloadArticle();
        $this->assertInternalType('string', $stanArticle->getIntro());
        $this->assertInternalType('string', $stanArticle->getUrl());
    }


}
