<?php

namespace Basal\MiddlewareDispatcher\Middleman;

use Basal\Middleware\MiddlewareDispatcherInterface;
use mindplay\middleman\Dispatcher;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class MiddlemanMiddlewareDispatcher.
 */
final class MiddlemanMiddlewareDispatcher implements MiddlewareDispatcherInterface
{
    /**
     * @inheritDoc
     */
    public function dispatch(ServerRequestInterface $request, array $stack)
    {
        return (new Dispatcher($stack))->dispatch($request);
    }
}
