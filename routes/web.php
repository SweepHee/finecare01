<?php


use Eclair\Routing\Route;

use App\Middlewares\RequireMiddleware;
use App\Middlewares\CsrfTokenMiddleware;
use App\Middlewares\AuthMiddleware;

Route::add("get", "/", "\App\Controllers\IndexController::index");


Route::add("get", "/auth/login", "\App\Controllers\AuthController::showLoginForm");
Route::add("post", "/auth", "\App\Controllers\AuthController::login", [ RequireMiddleware::class, CsrfTokenMiddleware::class]);
Route::add("post", "/auth/logout", "\App\Controllers\AuthController::logout");

Route::add("get", "/users/register", "\App\Controllers\UserController::create");
Route::add("get", "/users/register/{test}", "\App\Controllers\UserController::create");
Route::add("post", "/users", "\App\Controllers\UserController::store", [ RequireMiddleware::class, CsrfTokenMiddleware::class]);




Route::add("get", "/users/test", "\App\Controllers\UserController::test");
