<?php
require_once('CollectionData.php');

class CertificateCollection extends CollectionData
{
    public function GetItems(): array
    {
        // TODO : Consider paging
        return [];
    }

    public function GetItemDetails(string $id): ?array
    {
        return NULL;
    }
}
