<?php
$servername = "localhost";
$username = "userweb";
$password = "abc123.";
$dbName = "exemplo";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<h1 style=color:#880808>Connected successfully</h1>";

    // SQL to create table (if it doesn't exist)
    $sql = "CREATE TABLE IF NOT EXISTS MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $conn->exec($sql);
    echo "<h3>Table 'MyGuests' created or already exists</h3";

    // Begin a transaction
    $conn->beginTransaction();

    // Insert records into the table
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
                VALUES ('John', 'Doe', 'john@example.com')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
                VALUES ('Mary', 'Moe', 'mary@example.com')");
    $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
                VALUES ('Julie', 'Dooley', 'julie@example.com')");

    // Commit the transaction
    $conn->commit();
    echo "New records created successfully";
} catch (PDOException $e) {
    // Roll back the transaction if something fails
    $conn->rollBack();
    echo "Error: " . $e->getMessage();
} finally {
    // Close the database connection, whether the transaction was successful or not
    $conn = null;
}
?>
