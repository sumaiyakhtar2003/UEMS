<?php 
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "Uni_Event_Management_System";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?> 
