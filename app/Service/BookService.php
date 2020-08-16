<?php


namespace App\Service;


use App\Entity\Book;
use App\Singleton\Container;

class BookService
{
    public static function getAll()
    {
        $entityManager = Container::getInstance()->getEntityManager();
        $allBooks = $entityManager->getRepository(Book::class)->findAll();
        return response()->httpCode($allBooks ? 200 : 404)->json($allBooks);
    }

    public static function getById($id)
    {
        $entityManager = Container::getInstance()->getEntityManager();
        $book = $entityManager->getRepository(Book::class)->find($id);
        return response()->httpCode($book ? 200 : 404)->json($book ? $book : []);
    }
}