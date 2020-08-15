<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Router;

Router::group(['prefix' => '/api'], function () {
    // Book
    Router::get('/book', 'BookController@getAll');
    Router::get('/book/{id}', 'BookController@getById');
});