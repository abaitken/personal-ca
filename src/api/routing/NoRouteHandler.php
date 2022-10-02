<?php
require_once('RouteHandler.php');
class NoRouteHandler extends RouteHandler
{
    public function Process($queryParameters = array()): void
    {
        self::BeginOutput();
        // TODO : Return list of resources?
        self::ErrorBadRequest();
    }
}