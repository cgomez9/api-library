<?php

namespace Src;

use Pecee\SimpleRouter\SimpleRouter;

class Router extends SimpleRouter
{
    /**
     * @throws \Exception
     * @throws \Pecee\Http\Middleware\Exceptions\TokenMismatchException
     * @throws \Pecee\SimpleRouter\Exceptions\HttpException
     * @throws \Pecee\SimpleRouter\Exceptions\NotFoundHttpException
     */
    public static function start() : void
    {
        require_once 'helpers.php';
        require_once '../routes/api.php';
        parent::start();
    }
}