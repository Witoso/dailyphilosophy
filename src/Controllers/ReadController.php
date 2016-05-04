<?php


namespace DailyPhilosophy\Controllers;

use DailyPhilosophy\MyApp;
use \Doctrine\DBAL\Connection;
use DailyPhilosophy\Entity\Book;

class ReadController
{

    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    public function showBooksAction(MyApp $app)
    {
        $books = Book::fetchAll($this->db);
        return $app->render('read.html.twig', array('books' => $books));
    }

    public function showBookAction(MyApp $app, $id)
    {
        $book = Book::findById($id, $this->db);
        return $app->render('book.html.twig', array('book' => $book));
    }
}