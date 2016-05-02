<?php

use DailyPhilosophy\Entity\Book;

class BookTest extends PHPUnit_Framework_TestCase
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

    /**
     * @depends testDbCreation
     */
    public function testGettingAllBooks($conn)
    {

        $books = Book::fetchAll($conn);
        $this->assertContainsOnlyInstancesOf('DailyPhilosophy\Entity\Book', $books);
        $this->assertAttributeEquals('Aristotle', 'author', $books[0]);
    }

    /**
     * @depends testDbCreation
     */
    public function testFindingBookById($conn)
    {
        $book = Book::findById(1, $conn);
        $this->assertInstanceOf('DailyPhilosophy\Entity\Book', $book);
        $this->assertAttributeInternalType('string', 'content', $book);
    }

}
