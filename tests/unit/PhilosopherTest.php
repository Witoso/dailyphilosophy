<?php

use DailyPhilosophy\Entity\Philosopher;
use DailyPhilosophy\Content\PhilosopherGraph;
use GuzzleHttp\Client;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class PhilosopherTest extends PHPUnit_Framework_TestCase
{

    public function testDbCreation()
    {
        $config = new \Doctrine\DBAL\Configuration();
        $connectionParams = array(
            'dbname' => 'dailyPhilosophy',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );
        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
        return $conn;
    }

    public function testObjCreation()
    {
        $name = 'Aristotle';
        $phil = new Philosopher($name);
        $this->assertAttributeEquals('Aristotle', 'name', $phil);
    }

    public function testObjCreationWithGraph()
    {
        $name = 'Aristotle';
        $client = new Client();
        $graph = new PhilosopherGraph($client);
        $phil = new Philosopher($name, $graph);
        $this->assertAttributeInstanceOf('DailyPhilosophy\Content\PhilosopherGraph', 'graph', $phil);
        return $phil;
    }

    /**
     * @depends testDbCreation
     */
    public function testFetchAll($conn)
    {

        $philosophers = Philosopher::fetchAll($conn);
        $this->assertContainsOnlyInstancesOf('DailyPhilosophy\Entity\Philosopher', $philosophers);
    }

    /**
     * @depends testObjCreationWithGraph
     */
    public function testDownloadingInformation($phil)
    {
        $phil->findInformation();
        $this->assertAttributeEquals('http://en.wikipedia.org/wiki/Aristotle', 'detailsUrl', $phil->getGraph());
    }

}
