<?php

namespace App\Controller;


use App\Service\PageService;

class PageController
{
    public function getByBookId($bookId, $pageId, $format)
    {
        return PageService::getByBookId($bookId, $pageId, $format);
    }
}