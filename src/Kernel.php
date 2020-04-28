<?php

namespace Comito;

class Kernel 
{
    private $router;

    private $templateEngine;

    public function __construct()
    {
        if(!defined('ROOT_DIR')) {
            define("ROOT_DIR",  dirname(__DIR__, 4) );
        }
        if(!file_exists(ROOT_DIR.'/app/config.php')) {
            throw new \Exception('Le fichier app/config.php n\'a pas été trouvé !');
        }
        $this->router = new Router();
    }

    public function run(string $RoutingFile)
    {
        $dispatcher = $this->router->setRoutes(ROOT_DIR.$RoutingFile);
        $this->router->dispatching($dispatcher);
    }
}