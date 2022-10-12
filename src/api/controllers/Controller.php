<?php

abstract class Controller 
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

    // TODO : Implement smarter invocation 
    abstract public function Process($queryParameters = array(), $routeParts = array()): void;
}
