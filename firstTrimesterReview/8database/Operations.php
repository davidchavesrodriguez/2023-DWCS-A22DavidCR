<?php
include_once("./Product.php");
include_once("./Category.php");
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
            $sqlString = "SELECT p.*, c.name as category_name FROM product p
                      INNER JOIN category c ON p.idCategory = c.id
                      WHERE p.id=?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$id]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                // You need to create a Category object here
                $category = new Category($row["idCategory"], $row["category_name"]);

                $product = new Product(
                    $row["id"],
                    $row["name"],
                    $row["description"],
                    $row["picture"],
                    $category  // Pass the Category object instead of $row["category"]
                );
                return $product;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Exception: " . $e->getMessage();
            return null;
        }
    }


    // public function getCategory(int $id): ?Category
    // {
    // }

    // public function getAllCategories(): ?array
    // {
    // }

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
