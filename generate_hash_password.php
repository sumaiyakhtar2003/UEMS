<?php
// Example: Hash a plain-text password
$password = 'uems123'; // Replace with your current password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Output the hashed password
echo "Hashed password: " . $hashed_password;
?>