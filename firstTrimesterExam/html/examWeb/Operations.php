<?php
    require_once ('entities.php');
    class Operations {
        private $conn;
        function __construct() {
            $this->openConnection();
        }

        function openConnection() {
            $servername = "localhost";
            $username = "userWeb";
            $password = "abc123.";
            $dbName = "blog";
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Just to check connection
            // echo "Connection is done";
        }
        function closeConnection() {
            $this->conn = null;
        }
		// Update post
		// function updatePost(Post $post): int {}
		function addPost(Post $post):int|string {
            try {
                $sqlString= "INSERT INTO post VALUES(?, ?, ?, ?)";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$post->getId(), $post->getContents(), $post->getTopic()->getId(), $post->getUsuario()->getId()]);
                
                return $query->rowCount();
            } catch (PDOException $e) {
                return "Error". $e->getMessage();
            } catch (Exception $e) {
                return "Error". $e->getMessage();
            }

        }

		// Returns an array of objects of the Post class
		function getAllPosts():array|string {
            try {
                $sqlString= "SELECT * FROM post";
                $query= $this->conn->prepare($sqlString);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return "Error". $e->getMessage();
            } catch (Exception $e) {
                return "Error". $e->getMessage();
            }
        }

		function getAllTopics(): array|string {
            try {
                $sqlString= "SELECT * FROM topic";
                $query= $this->conn->prepare($sqlString);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return "Error". $e->getMessage();
            } catch (Exception $e) {
                return "Error". $e->getMessage();
            }
        }

		function getAllUsuarios(): array|string {
            try {
                $sqlString= "SELECT * FROM usuario";
                $query= $this->conn->prepare($sqlString);
                $query->execute();
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return "Error". $e->getMessage();
            } catch (Exception $e) {
                return "Error". $e->getMessage();
            }
        }

		function getTopic(int $id):Topic|string {
            try {
                $sqlString= "SELECT * FROM topic WHERE id=?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$id]);
                return $query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return "Error". $e->getMessage();
            } catch (Exception $e) {
                return "Error". $e->getMessage();
            }
        }

		function getUsuario(int $id): Usuario|string {
            try {
                $sqlString= "SELECT * FROM usuario WHERE id=?";
                $query = $this->conn->prepare($sqlString);
                $query->execute([$id]);
                return $query->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return "Error". $e->getMessage();
            } catch (Exception $e) {
                return "Error". $e->getMessage();
            }
        }
	}