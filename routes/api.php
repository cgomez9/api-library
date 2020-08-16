<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Router;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

Router::group(['prefix' => '/api'], function () {
    // Book
    Router::get('/book', 'BookController@getAll');
    Router::get('/book/{id}', 'BookController@getById');

    // Page
    Router::get('/page/{id}', 'PageController@getById')->name('page');
});

Router::error(function(Request $request, \Exception $exception) {
    if($exception instanceof NotFoundHttpException && $exception->getCode() === 404) {
        response()
            ->httpCode(404)
            ->json([
                'error' => $exception->getMessage(),
            ]);
    }
});