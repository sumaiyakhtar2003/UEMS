<?php
// Include database connection file
include 'db_connection.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $event_name = $conn->real_escape_string($_POST['event_name']);
    $organizer = $conn->real_escape_string($_POST['organizer']);
    $event_date = $conn->real_escape_string($_POST['event_date']);
    $event_time = $conn->real_escape_string($_POST['event_time']);
    $status = 'Pending'; // Default status is 'Pending'

    // Insert event into the database
    $sql = "INSERT INTO event_requests (event_name, organizer, event_date, event_time, status) 
            VALUES ('$event_name', '$organizer', '$event_date', '$event_time', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "Event submitted successfully!";
        header("Location: organizer_dashboard.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

