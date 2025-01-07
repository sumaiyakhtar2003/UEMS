<?php 

include "../db_connection.php"; // Include database connection

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    // Prevent SQL injection by escaping inputs
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Query to get the stored hashed password for the given email
    $sql = "SELECT password FROM organizer WHERE o_mail = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the stored hashed password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the entered password with the stored hashed password
        if (password_verify($password, $hashed_password)) {
            // Login successful
            echo "Login successful. Welcome, $email!";
            // Redirect to organizer dashboard
            header("Location: ../organizer_dashboard.html");
            exit();
        } else {
            // Invalid password
            header("Location: organizer_login.html?error=invalid_password");
        }
    } else {
        // Invalid email
        header("Location: organizer_login.html?error=incorrect_email"); 
    }
}

$conn->close();
?>

