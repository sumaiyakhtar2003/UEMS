<?php
include "../db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $email = $conn->real_escape_string($email);

    // Query to check if the email exists
    $sql = "SELECT password FROM Basic_user WHERE u_mail = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify password
        if (password_verify($password, $hashed_password)) {
            
            echo "Login successful!";
            header("Location: ../basic_user_dashboard.html");
            exit();
        } else {
           
            header("Location: basic_user_login.html?error=invalid_password");
        }
    } else {
        
        header("Location: basic_user_login.html?error=invalid_email");
    }
}

$conn->close();
?>