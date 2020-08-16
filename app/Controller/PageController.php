<?php

namespace App\Controller;


use App\Singleton\Container;
use App\Entity\Page;

class PageController
{
    public function getById($id)
    {
        $page = $this->getPageRepository()->find($id);
        return response()->httpCode($page ? 200 : 404)->json($page ? $page : []);
    }

    private function getPageRepository()
    {
        return Container::getInstance()->getEntityManager()->getRepository(Page::class);
    }

}