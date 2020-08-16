<?php


namespace App\Utils;


use App\Entity\Page;
use Doctrine\Common\Collections\Collection;

class PageUtils
{
    public static function getApiUrlFormat($bookId, Collection $pages)
    {
        return array_map(function(Page $page) use ($bookId) {
            $urlParams = ['bookId' => $bookId, 'pageId' => $page->getId()];
            return $_SERVER['HTTP_HOST'] . url('page_book', $urlParams);
        }, $pages->toArray());
    }
}