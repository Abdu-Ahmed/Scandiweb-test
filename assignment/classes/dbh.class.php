<?php
// dbh class for database connection using PDO
class dbh {
  private $host;
  private $username;
  private $password;
  private $database;
  protected $conn;
  
  protected function connect() {
    $this->host = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->database = "products";
    try {
      $connection = new PDO("mysql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn = $connection; 
      return $this->conn;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      return false;
    }
  }
}

