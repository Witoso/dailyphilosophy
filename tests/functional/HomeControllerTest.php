<?php

use Silex\WebTestCase;


class HomeControllerTest extends WebTestCase
{
    public function createApplication()
    {
        return require dirname(__FILE__, 3) .'/public/index.php';
    }

    public function testHomePage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertCount(1, $crawler->filter('h1:contains("dailyphilosophy")'));
        $this->assertCount(4, $crawler->filter('a'));
    }
}
