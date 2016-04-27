<?php

namespace DailyPhilosophy\Entity;

use DailyPhilosophy\Content\PhilosopherGraph;
use Doctrine\DBAL\Connection;

class Philosopher
{
    private $name;
    private $graph;


    public function __construct($name, PhilosopherGraph $graph = null)
    {
        $this->name = $name;
        $this->graph = $graph;
    }

    public static function fetchAll(Connection $conn)
    {
        $philosophers = [];
        $sql = "SELECT * FROM philosophers";
        $stm = $conn->query($sql);
        while ($row = $stm->fetch()) {
            $phil = new Philosopher($row['name']);
            $philosophers[] = $phil;
        }
        return $philosophers;
    }

    public function findInformation()
    {
        $this->graph->downloadInformation($this->name);
    }


    public function getGraph()
    {
        return $this->graph;
    }

}