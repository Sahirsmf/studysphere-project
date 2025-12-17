<?php
include 'db.php'; // This pulls in the connection from Step 3

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    // This encrypts the password so it's not readable in the database
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    // Insert the student into the database
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! You can now log in.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>