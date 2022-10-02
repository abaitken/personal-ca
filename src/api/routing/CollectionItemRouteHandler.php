<?php
require_once('RouteHandler.php');
class CollectionItemRouteHandler extends RouteHandler
{
    private string $_collection;
    private string $_item;

    public function __construct(string $collection, string $item)
    {
        $this->_collection = $collection;
        $this->_item = $item;
    }

    public function Process($queryParameters = array()): void
    {
        $collectionData = self::GetCollectionData($this->_collection);

        if(is_null($collectionData))
            self::ErrorNotFound();

        $item = $collectionData->GetItemDetails($this->_item);

        self::BeginOutput();

        if(is_null($item))
            self::ErrorNotFound();

        echo json_encode($item);
    }
}