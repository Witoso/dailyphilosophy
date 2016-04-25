<?php

use Silex\WebTestCase;


class HomeControllerTest extends WebTestCase
{
    public function createApplication()
    {
        return require dirname(__FILE__, 3) .'/app/bootstrap.php';
    }

    public function testHomePage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->isSuccessful());

    }
}
