<?php
require_once('RouteHandler.php');
require_once('controllers/Controller.php');
require_once('controllers/CertificatesController.php');
require_once('controllers/DefaultController.php');

class ControllerRouteHandler extends RouteHandler
{
    static private function CreateController($controllerName): Controller
    {
        switch ($controllerName) {
            case 'Certificates': // TODO : Case insensitive compare?
                return new CertificatesController();
            
            default:
                return new DefaultController();
        }
    }

    public function Process($queryParameters = array(), $routeParts = array()): void
    {
        $controller = self::CreateController($routeParts[0]);
        $controller->Process($queryParameters, $routeParts);
    }
}
