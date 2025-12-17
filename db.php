<?php
$host = "localhost";
$user = "root";
$pass = ""; // Default XAMPP password is usually empty
$db   = "studysphere_db"; // The name of the database you created in phpMyAdmin

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>