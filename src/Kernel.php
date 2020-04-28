<?php

namespace Comito;

class Kernel 
{
    private $router;

    private $templateEngine;

    public function __construct()
    {
        if(!defined('ROOT_DIR')) {
            define("ROOT_DIR",  dirname(__DIR__, 3) );
        }
        $this->router = new Router();
    }

    public function run(string $RoutingFile)
    {
        $dispatcher = $this->router->setRoutes(ROOT_DIR.$RoutingFile);
        $this->router->dispatching($dispatcher);
    }
}