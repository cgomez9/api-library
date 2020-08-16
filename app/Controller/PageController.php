<?php

namespace App\Controller;


use App\Service\PageService;

class PageController
{
    public function getById($id, $format)
    {
        return PageService::getById($id, $format);
    }

    public function getByBookId($bookId, $pageId, $format)
    {
        return PageService::getByBookId($bookId, $pageId, $format);
    }
}