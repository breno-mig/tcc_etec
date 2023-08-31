<?php
$username = "root";
$password = "root";

try {
    $conn = new PDO('mysql:host=db-mysql;dbname=banco', $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
?>