<?php

namespace Basal\MiddlewareDispatcher\Middleman;

use Basal\Middleware\Exception\EmptyStackException;
use Basal\Middleware\Exception\MiddlewareDispatcherException;
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
        try {
            return (new Dispatcher($stack))->dispatch($request);
        } catch (\InvalidArgumentException $exception) {
            throw new EmptyStackException('Middleware stack is empty', 0, $exception);
        } catch (\Exception $exception) {
            throw new MiddlewareDispatcherException('Dispatching middleware stack failed', 0, $exception);
        }
    }
}
