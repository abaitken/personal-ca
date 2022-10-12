<?php
require_once('Controller.php');

class CertificatesController extends Controller
{
    public function Process($queryParameters = array(), $routeParts = array()): void
    {
        self::BeginOutput();
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'GET') {
            // -> /{COLLECTION}
            if (count($routeParts) == 1)
                $this->Get($queryParameters);
            // -> /{COLLECTION}/{ID}
            else if (count($routeParts) == 2)
                $this->GetItem($routeParts[1], $queryParameters);
            else
                self::ErrorBadRequest();

            exit();
        }

        // if ($method == 'POST') {
        //     // -> /{COLLECTION}
        //     if (count($routeParts) == 1)
        //         Post();
        // }

        // if ($method == 'PUT') {
        //     // -> /{COLLECTION}/{ID}
        //     if (count($routeParts) == 2)
        //         Put($routeParts[1]);
        // }
        
        self::ErrorBadRequest();
        exit();
    }

    private static function MapContainerToCertPath($container)
    {
        return PathJoin(CERT_STORE, $container);
    }

    private function GetCertificates($queryParameters = array()): Generator
    {
        $container = isset($queryParameters['container']) ? self::MapContainerToCertPath($queryParameters['container']) : CERT_STORE;
        $idPrefix = isset($queryParameters['container']) ? substr($container, strlen(CERT_STORE) + 1) . '\\' : '';
        $storeContents = scandir($container, SCANDIR_SORT_NONE);
        foreach ($storeContents as &$value) {
            if ($value == '.' || $value == '..')
                continue;

            $filePath = PathJoin($container, $value);
            if (!is_file($filePath))
                continue;
            $filename = pathinfo($filePath, PATHINFO_FILENAME);
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);

            if (!stristr($extension, 'pem'))
                continue;

            yield array(
                'id' => $idPrefix . $filename,
                'name' => $filename,
                'container' => is_dir(PathJoin($container, $filename)) ? true : false
            );
        }
    }

    public function Get($queryParameters = array()): void
    {
        $certificates = $this->GetCertificates($queryParameters);
        $items = iterator_to_array($certificates, false);

        echo json_encode($items);
    }

    public function GetItem(string $id, $queryParameters = array()): void
    {
        echo json_encode(NULL);
    }
}
