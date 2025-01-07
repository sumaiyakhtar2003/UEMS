
<?php 

include "../db_connection.php";  

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    // Prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    // Query to check user credentials
    $sql = "SELECT password FROM authority WHERE a_mail = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the stored hashed password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify the entered password with the stored hashed password
        if (password_verify($password, $hashed_password)) {
            // Login successful
            echo "Login successful. Welcome, $email!";
            // Redirect to authority dashboard
            header("Location: ../authority_dashboard.html");
            exit();
        } else {
            // Invalid password
            
            header("Location: authority_login.html?error=invalid_password");

            
        }
    } else {
        // Invalid email
        header("Location: authority_login.html?error=incorrect"); 
    }
}

$conn->close();
?>






