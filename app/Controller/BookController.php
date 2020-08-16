<?php

namespace App\Controller;


use App\Service\BookService;

class BookController
{
    public function getAll()
    {
       return BookService::getAll();
    }

    public function getById($id)
    {
        return BookService::getById($id);
    }
}