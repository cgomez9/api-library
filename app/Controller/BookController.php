<?php

namespace App\Controller;


use App\Singleton\Container;
use App\Entity\Book;

class BookController
{
    public function getAll()
    {
        $allBooks = $this->getBookRepository()->findAll();
        return response()->httpCode($allBooks ? 200 : 404)->json($allBooks);
    }

    public function getById($id)
    {
        $book = $this->getBookRepository()->find($id);
        return response()->httpCode($book ? 200 : 404)->json($book);
    }

    private function getBookRepository()
    {
        return Container::getInstance()->getEntityManager()->getRepository(Book::class);
    }

}