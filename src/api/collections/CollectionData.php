<?php
require_once('CertificateCollection.php');

abstract class CollectionData
{
    abstract public function GetItemDetails(string $id): ?array;
    abstract public function GetItems(): array;

    static public function CreateDataSource(string $collection): ?CollectionData
    {
        if($collection == "Certificates")
            return new CertificateCollection();

        return NULL;
    }
}