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
                    $row["name"],
                    $row["description"],
                    $row["picture"],
                    $category,
                    $row["id"]
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
            $list = [];

            while ($row = $query->fetch()) {
                $list[] = new Product(
                    $row["name"],
                    $row["description"],
                    $row["picture"],
                    new Category($row["idCategory"]),
                    $row["id"]
                );
            }

            return $list;
        } catch (PDOException $e) {
            return ["Exception: {$e->getMessage()}"];
        }
    }

    public function getCategory(int $id): ?Category
    {
        try {
            $sqlString = "SELECT * FROM category WHERE id=?";
            $query = $this->conn->prepare($sqlString);
            $query->execute([$id]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $category = new Category($row["id"], $row["name"]);
                return $category;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Exception: {$e->getMessage()}";
            return null;
        }
    }

    public function getAllCategories(): ?array
    {
        try {
            $sqlString = "SELECT * FROM category";
            $query = $this->conn->query($sqlString);
            $categories = [];

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $category = new Category($row["id"], $row["name"]);
                $categories[] = $category;
            }

            return $categories;
        } catch (PDOException $e) {
            echo "Exception: {$e->getMessage()}";
            return null;
        }
    }


    public function addProduct(Product $product): void
    {
        try {
            $sqlString = "INSERT INTO product (name, description, picture, idCategory) VALUES (?, ?, ?, ?)";
            $query = $this->conn->prepare($sqlString);

            $query->bindParam(1, $product->getName());
            $query->bindParam(2, $product->getDescription());
            $query->bindParam(3, $product->getPicture());
            $query->bindParam(4, $product->getCategory()->getId());

            $query->execute();
        } catch (PDOException $e) {

            error_log("Error adding product: " . $e->getMessage());
        }
    }

    public function updateProduct(Product $product): void
    {
        try {
            $sqlString = "UPDATE product SET name = ?, description = ?, picture = ?, idCategory = ? WHERE id = ?";
            $query = $this->conn->prepare($sqlString);

            $name = $product->getName();
            $description = $product->getDescription();
            $picture = $product->getPicture();
            $categoryId = $product->getCategory()->getId();
            $productId = $product->getId();

            $query->execute([$name, $description, $picture, $categoryId, $productId]);
        } catch (PDOException $e) {
            echo "Exception: {$e->getMessage()}";
        }
    }


    public function getUserName($login, $password): ?string
    {
        try {
            $sqlString = "SELECT username FROM users WHERE login = ? AND password = ?";
            $query = $this->conn->prepare($sqlString);

            $query->execute([$login, $password]);

            $row = $query->fetch(PDO::FETCH_ASSOC);

            return $row ? $row['username'] : null;
        } catch (PDOException $e) {
            echo "Exception: {$e->getMessage()}";
            return null;
        }
    }
}
