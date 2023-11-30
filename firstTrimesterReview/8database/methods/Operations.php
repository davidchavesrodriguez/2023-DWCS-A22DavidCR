<?php
include_once("./classes/Category.php");
include_once("./classes/Product.php");
include_once("./classes/User.php");
class Operation
{
    private $conn;
    public function __construct(
        private string $host = "localhost",
        private string $dbname = "review",
        private string $username = "gestor",
        private string $password = "abc123."
    ) {
        $this->conn = $this->openConnection();
    }

    private function openConnection()
    {
        try {
            $conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public function getProduct(int $id): ?Product
    {
        try {
            $sqlString = "SELECT p.*, c.name AS nameCategory FROM product p
                      INNER JOIN category c ON p.idCategory = c.id
                      WHERE p.id=?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$id]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $category = new Category($row["idCategory"], $row["nameCategory"]);

                $product = new Product(
                    $row["id"],
                    $row["name"],
                    $row["description"],
                    $row["picture"],
                    $category
                );
                return $product;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Exception: {$e->getMessage()}";
            return null;
        }
    }

    public function getAllProducts(): ?array
    {
        try {
            $sqlString = "SELECT * FROM product";
            $query = $this->conn->prepare($sqlString);
            $query->execute();
            $products = $query->fetchAll(PDO::FETCH_ASSOC);

            return $products;
        } catch (PDOException $e) {
            return ["Exception: {$e->getMessage()}"];
        }
    }

    // public function getCategory(int $id): ?Category
    // {
    // }

    // public function getAllCategories(): ?array
    // {
    // }
    // SERVE PARA O SELECT DE WELCOMEPAGE

    // public function addProduct(Product $product): void
    // {
    // }

    // public function updateProduct(Product $product): void
    // {
    // }

    // public function getUserName($login, $password): ?string
    // {
    // }
}
