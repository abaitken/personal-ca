<?php
require_once('Controller.php');

class NoRouteController extends Controller
{
    public function Process($queryParameters = array(), $routeParts = array()): void
    {        
        self::BeginOutput();
        // TODO : Return list of resources?
        self::ErrorBadRequest();
    }
}
