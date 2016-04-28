<?php

use DailyPhilosophy\Content\PhilosopherGraph;
use GuzzleHttp\Client;

class PhilosopherGraphTest extends PHPUnit_Framework_TestCase
{
    public function testGuzzle()
    {
        $guzzle = new Client();
        return $guzzle;
    }

    /**
     * @depends testGuzzle
     */
    public function testObjCreation(Client $guzzle)
    {
        $graph = new PhilosopherGraph($guzzle);
        $this->assertObjectHasAttribute('client', $graph);
        $this->assertAttributeInstanceOf('GuzzleHttp\Client', 'client', $graph);
        return $graph;
    }

    /**
     * @depends testObjCreation
     */
    public function testDownloadingInfo(PhilosopherGraph $graph)
    {
        $graph->downloadInformation("Aristotle");
        $this->assertObjectHasAttribute('information', $graph);
        $this->assertObjectHasAttribute('imageUrl', $graph);
        $this->assertObjectHasAttribute('detailsUrl', $graph);
        $this->assertAttributeEquals('http://t1.gstatic.com/images?q=tbn:ANd9GcSS4jHnORhAbXzxL2EgnXQQnMlYeghRoyUXf_ScS2vKXQF8cOaU', 'imageUrl', $graph);
    }

    /**
     * @depends testObjCreation
     */
    public function testDownloadingNoexistingInfo(PhilosopherGraph $graph)
    {
        $graph->downloadInformation('badadasd');
    }
}
