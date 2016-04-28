<?php

use Silex\WebTestCase;

class MeetControllerTest extends WebTestCase
{
    public function createApplication()
    {
        return require dirname(__FILE__, 3) .'/app/bootstrap.php';
    }

    public function testEndpoint()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/meet');
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertGreaterThan(0, count($crawler->filter('button')));
    }

    public function testJsonEndpoint()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/meet/Aristotle');
        $this->assertTrue($client->getResponse()->isOk());
        $this->assertJson($client->getResponse()->getContent());
    }
}
