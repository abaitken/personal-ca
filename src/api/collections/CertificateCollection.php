<?php
require_once('CollectionData.php');

class CertificateCollection extends CollectionData
{
    private static function MapContainerToCertPath($container)
    {
        return pathJoin(CERT_STORE, $container);
    }

    public function GetItems($queryParameters = array()): Generator
    {
        $container = isset($queryParameters['container']) ? self::MapContainerToCertPath($queryParameters['container']) : CERT_STORE;
        $idPrefix = isset($queryParameters['container']) ? substr($container, strlen(CERT_STORE) + 1) . '\\' : '';
        $storeContents = scandir($container, SCANDIR_SORT_NONE);
        foreach ($storeContents as &$value) {
            if ($value == '.' || $value == '..')
                continue;

            $filePath = pathJoin($container, $value);
            if (!is_file($filePath))
                continue;
            $filename = pathinfo($filePath, PATHINFO_FILENAME);
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);

            if (!stristr($extension, 'pem'))
                continue;

            yield array(
                'id' => $idPrefix . $filename,
                'name' => $filename,
                'container' => is_dir(pathJoin($container, $filename)) ? true : false
            );
        }
    }

    public function GetItemDetails(string $id, $queryParameters = array()): ?array
    {
        return NULL;
    }
}
