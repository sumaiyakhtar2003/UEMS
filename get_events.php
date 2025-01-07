<?php
include 'db_connection.php'; // Include your database connection file



// Fetch events for the current month (you may pass parameters for the month and year)
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');

$sql = "SELECT event_date, event_name, event_time FROM event_requests WHERE `status` = 'Approved'";
$result = $conn->query($sql);


$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'date' => $row['event_date'],
            'title' => $row['event_name'],
            'time' => $row['event_time'], // Include event time
        ];
    }
}

echo json_encode($events); // Return events as JSON

$conn->close(); 
?>



