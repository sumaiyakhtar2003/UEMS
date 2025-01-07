<?php 
$password = 'uems123'; 
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Output the hashed password
echo "Hashed password: " . $hashed_password;
?>
