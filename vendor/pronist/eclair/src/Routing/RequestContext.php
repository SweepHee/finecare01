<?php

namespace Eclair\Routing;

use Eclair\Routing\Middleware;

class RequestContext
{
    /**
     * @var string $method
     */
    public $method;

    /**
     * @var string $path
     */
    public $path;

    /**
     * @var callback|string $handler
     */
    public $handler;

    /**
     * @var Middleware[] $middlewares
     */
    public $middlewares;

    /**
     * Create a Context Instance
     *
     * @param string $method
     * @param string $path
     * @param callback $handler
     *
     * @return RequestContext
     */
    public function __construct($method, $path, $handler, $middlewares = [])
    {
        $this->method = $method;
        $this->path = $path;
        $this->handler = $handler;
        $this->middlewares = $middlewares;
    }

    /**
     * Get url params
     *
     * @param string $url
     *
     * @return array
     */
    public function match($url)
    {
        $urlParts = explode('/', $url);
        $urlPatternParts = explode('/', $this->path);

        if (count($urlParts) === count($urlPatternParts)) {
            $urlParams = [];

            foreach ($urlPatternParts as $key => $part) {
                if (preg_match('/^\{.*\}$/', $part)) {
                    $urlParams[$key] = $part;
                } else {
                    if ($urlParts[$key] !== $part) {
                        return null;
                    }
                }
            }
            return count($urlParams) < 1
                ? []
//            : array_map(fn ($k) => $urlParts[$k], array_keys($urlParams));
                : array_map(function ($k) use ($urlParts) { // array_map -> 첫번째파람에 담긴 함수를 2번째 배열에 적용한다.
                    return $urlParts[$k];
                }, array_keys($urlParams)); // array_keys -> 배열의 키값을 배열로 만든다 ex) arr['hi'] = 'a',  $array = array_keys(arr) $array => $array[0] = 'hi';
        }
    }

    /**
     * run Route Middlewares
     *
     * @return bool
     */
    public function runMiddlewares()
    {
        foreach ($this->middlewares as $middleware) {
            if (! $middleware::process()) {
                return false;
            }
        }
        return true;
    }
}
