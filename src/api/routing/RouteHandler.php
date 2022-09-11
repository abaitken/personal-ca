<?php
require_once('NoRouteHandler.php');
require_once('CollectionRouteHandler.php');
require_once('CollectionItemRouteHandler.php');
require_once('collections/CollectionData.php');

abstract class RouteHandler 
{
    protected function BeginOutput(): void
    {
        header("Content-Type: application/json");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }

    protected function ErrorNotFound(): void
    {        
        http_response_code(404);
        exit(404);
    }

    protected function ErrorBadRequest(): void
    {        
        http_response_code(400);
        exit(400);
    }

    protected function GetCollectionData(string $collection): CollectionData
    {        
        $collectionData = CollectionData::CreateDataSource($collection);

        if(is_null($collectionData))
        {
            self::BeginOutput();
            self::ErrorNotFound();
        }

        return $collectionData;
    }

    abstract public function Process(): void;
    
    static private function GetRouteParts(): array
    {
        $self = $_SERVER['PHP_SELF'];
        $lastSlash = strrpos($self, '/');
        $urlPart = substr($self, 0, $lastSlash);

        $parts = parse_url($_SERVER['REQUEST_URI']);
        $path = $parts['path'];
        $apiRoute = substr($path, strlen($urlPart));
        $routeParts = explode('/', $apiRoute);

        $result = array();
        foreach ($routeParts as &$value)
        {
            if(strlen($value) != 0)
                array_push($result, $value);
        }
        unset($value);
        return $result;
    }

    static public function CreateHandler(): RouteHandler
    {
        $routeParts = self::GetRouteParts();

        if(count($routeParts) == 0)
            return new NoRouteHandler();
            
        $method = $_SERVER['REQUEST_METHOD'];

        if($method == 'GET')
        {
            if(count($routeParts) == 1)
                return new CollectionRouteHandler($routeParts[0]);
            if(count($routeParts) == 2)
                return new CollectionItemRouteHandler($routeParts[0], $routeParts[1]);
        }

        if($method == 'POST')
        {
            if(count($routeParts) == 1)
                return new CollectionRouteHandler($routeParts[0]);
        }

        if($method == 'PUT')
        {
            if(count($routeParts) == 2)
                return new CollectionItemRouteHandler($routeParts[0], $routeParts[1]);
        }
        return new NoRouteHandler();
    }
}
