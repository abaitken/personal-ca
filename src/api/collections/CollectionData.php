<?php
require_once('CertificateCollection.php');

abstract class CollectionData
{
    abstract public function GetItemDetails(string $id, $queryParameters = array()): ?array;
    abstract public function GetItems($queryParameters = array()): Generator;

    static public function CreateDataSource(string $collection): ?CollectionData
    {
        if($collection == "Certificates")
            return new CertificateCollection();

        return NULL;
    }
}