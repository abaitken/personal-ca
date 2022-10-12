<?php
require_once('NoRouteHandler.php');
require_once('ControllerRouteHandler.php');

abstract class RouteHandler 
{
    abstract public function Process($queryParameters = array(), $routeParts = array()): void;
    
    static public function CreateHandler($routeParts): RouteHandler
    {
        if(count($routeParts) == 0)
            return new NoRouteHandler();
        
        return new ControllerRouteHandler();
    }
}
