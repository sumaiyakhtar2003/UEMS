
<?php 

include "../db_connection.php";  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $sql = "SELECT password FROM authority WHERE a_mail = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            echo "Login successful. Welcome, $email!";
            header("Location: ../authority_dashboard.html");
            exit();
        } else {
            header("Location: authority_login.html?error=invalid_password");     
        }
    } else {
        header("Location: authority_login.html?error=incorrect"); 
    }
}

$conn->close();
?>






