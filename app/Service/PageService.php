<?php


namespace App\Service;


use App\Entity\Page;
use App\Entity\PageFormat;
use App\Singleton\Container;

class PageService
{
    public static function getById($id, $format)
    {
        $entityManager = Container::getInstance()->getEntityManager();
        $page = $entityManager->getRepository(Page::class)->find($id);
        return response()->httpCode($page ? 200 : 404)->json($page ? $page : []);
    }

    public static function getByBookId($bookId, $pageId, $format)
    {
        $entityManager = Container::getInstance()->getEntityManager();
        $page = $entityManager->getRepository(Page::class)->findOneBy([
            'book' => $bookId,
            'id' => $pageId,
        ]);
        $pageFormat = PageService::getPageFormatByType($pageId, $format);
        return response()->httpCode($page ? 200 : 404)->json([
            'page' => $page,
            'format' => $pageFormat
        ]);
    }

    private static function getPageFormatByType($pageId, $format)
    {
        $entityManager = Container::getInstance()->getEntityManager();
        return $entityManager->getRepository(PageFormat::class)->findOneBy([
            'page' => $pageId,
            'type' => $format,
        ]);
    }
}