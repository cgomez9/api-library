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
    Router::get('/book/{id}', 'BookController@getById')
        ->where(['id' => '[0-9]+'])
        ->name('book');

    // Page
    Router::get('/page/{id}/{format}', 'PageController@getById')
        ->where(['id' => '[0-9]+'])
        ->name('page');
    Router::get('/book/{bookId}/page/{pageId}/{format}', 'PageController@getByBookId')
        ->where(['bookId' => '[0-9]+', 'pageId' => '[0-9]+'])
        ->name('page_book');
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