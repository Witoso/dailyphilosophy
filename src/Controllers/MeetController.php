<?php

namespace DailyPhilosophy\Controllers;

use DailyPhilosophy\Content\PhilosopherGraph;
use DailyPhilosophy\MyApp;
use DailyPhilosophy\Entity\Philosopher;


class MeetController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function showAllAction(MyApp $app)
    {
        $philosophers = Philosopher::fetchAll($this->db);
        return $app->render('meet.html.twig', array(
            'philosophers' => $philosophers
        ));
    }

    public function showDetailsAction(MyApp $app, PhilosopherGraph $graph, $name)
    {
        $philosopher = new Philosopher($name, $graph);
        $philosopher->findInformation();
        return $app->json($philosopher, 200, array('Content-Type' => 'application/json'));
    }
}