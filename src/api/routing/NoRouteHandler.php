<?php
require_once('RouteHandler.php');
require_once('controllers/NoRouteController.php');

class NoRouteHandler extends RouteHandler
{
    public function Process($queryParameters = array(), $routeParts = array()): void
    {
        $controller = new NoRouteController();
        $controller->Process($queryParameters, $routeParts);
    }
}