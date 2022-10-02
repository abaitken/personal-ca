<?php
require_once('RouteHandler.php');

class CollectionRouteHandler extends RouteHandler
{
    private string $_collection;

    public function __construct(string $collection)
    {
        $this->_collection = $collection;
    }

    public function Process($queryParameters = array()): void
    {
        $collectionData = self::GetCollectionData($this->_collection);

        if(is_null($collectionData))
            self::ErrorNotFound();
        
        $items = iterator_to_array($collectionData->GetItems($queryParameters), false);

        self::BeginOutput();
        echo json_encode($items);
    }
}