<?php

namespace App\Middlewares;
use Eclair\Routing\Middleware;

class AuthMiddleware extends Middleware
{
    public static function process()
    {
        // $_SESSION에 user 라는 키가 있다면
        if (array_key_exists("user", $_SESSION)) {
            return true;
        }
        return header("Location: /auth/login");
    }
}