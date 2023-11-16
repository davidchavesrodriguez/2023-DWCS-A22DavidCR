<?php
class ProductController
{
    public function processRequest(string $method, ?string $id): void
    {
        if ($id) { // single resource operation
            $this->processResourceRequest($method, $id);
        } else { // collection operation
            $this->processCollectionRequest($method);
        }
    }
    private function processResourceRequest(string $method, ?string $id): void
    {
    }
    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode(["id" => 123]);
                break;
            case "POST":
                echo json_encode(["id" => 33]);
                break;
        }
    }
}
