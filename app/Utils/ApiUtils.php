<?php


namespace App\Utils;


use App\Entity\Page;
use Doctrine\Common\Collections\Collection;

class ApiUtils
{
    public static function getPagesApiUrlFormat(Collection $pages)
    {
        return array_map(function(Page $page) {
            return ApiUtils::getPageApiUrlFormat($page);
        }, $pages->toArray());
    }

    public static function getBookApiUrlFormat($bookId)
    {
        return $_SERVER['HTTP_HOST'] . url('book', ['id' => $bookId]);
    }

    public static function getPageApiUrlFormat(Page $page)
    {
        $urlParams = ['bookId' => $page->getBook()->getId(), 'pageId' => $page->getId()];
        return $_SERVER['HTTP_HOST'] . url('page_book', $urlParams);
    }
}