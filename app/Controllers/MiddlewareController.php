<?php

/*
 * This file is part of Swoft.
 * (c) Swoft <group@swoft.org>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controllers;

use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Message\Bean\Annotation\Middleware;
use Swoft\Http\Message\Bean\Annotation\Middlewares;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use App\Middlewares\GroupTestMiddleware;
use App\Middlewares\ActionTestMiddleware;
use App\Middlewares\SubMiddleware;
use App\Middlewares\ControllerSubMiddleware;
use App\Middlewares\ControllerTestMiddleware;


/**
 * @Controller("middleware")
 * @Middleware(class=ControllerTestMiddleware::class)
 * @Middlewares({
 *     @Middleware(ControllerSubMiddleware::class)
 * })
 */
class MiddlewareController
{
    /**
     * @RequestMapping()
     * @Middlewares({
     *     @Middleware(GroupTestMiddleware::class),
     *     @Middleware(ActionTestMiddleware::class)
     * })
     * @Middleware(SubMiddleware::class)
     */
    public function action1(): array
    {
        return ['middleware'];
    }

    /**
     * @RequestMapping()
     * @Middleware(SubMiddleware::class)
     * @Middlewares({
     *     @Middleware(GroupTestMiddleware::class),
     *     @Middleware(ActionTestMiddleware::class)
     * })
     */
    public function action2(): array
    {
        return ['middleware2'];
    }

    /**
     * @RequestMapping()
     */
    public function action3(): array
    {
        return ['middleware3'];
    }


}