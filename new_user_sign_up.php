<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $name = $_POST['name']; 
    $sql = "INSERT INTO Basic_user (name, u_mail, password) VALUES ('$name', '$email', '$hashed_password')";


    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: basic_user_login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?> 