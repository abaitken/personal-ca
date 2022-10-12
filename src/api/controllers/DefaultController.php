<?php
require_once('Controller.php');

class DefaultController extends Controller
{
    public function Process($queryParameters = array(), $routeParts = array()): void
    {
        self::BeginOutput();
        self::ErrorBadRequest();
    }
}
