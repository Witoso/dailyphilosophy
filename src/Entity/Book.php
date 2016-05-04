<?php


namespace DailyPhilosophy\Entity;

use Doctrine\DBAL\Connection;

class Book
{

    private $id;
    private $title;
    private $author;
    private $path;
    private $content;



    public static function fetchAll(Connection $conn)
    {
        $books = [];
        $sql = "SELECT books.id, books.title, philosophers.name, books.path FROM books JOIN philosophers ON books.author_id = philosophers.id";
        $stm = $conn->query($sql);
        while ($row = $stm->fetch()) {
            $book = new Book();
            $book->id = $row['id'];
            $book->title = $row['title'];
            $book->author = $row['name'];
            $book->path = $row['path'];
            $books[] = $book;
        }
        return $books;
    }

    public static function findById(int $id, Connection $conn)
    {
        $sql = "SELECT * FROM books WHERE id = $id";
        $stm = $conn->query($sql);
        $row = $stm->fetch();
        $book = new Book();
        $book->id = $row['id'];
        $book->title = $row['title'];
        $book->path = $row['path'];
        $book->content = $book->loadContent($book->path);
        return $book;
    }

    private function loadContent($path)
    {
        $fullPath = dirname(__FILE__, 3) . $path;
        $handle = fopen($fullPath, 'rb');
        return fread($handle, filesize($fullPath));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }





}