<?php
include "db_connection.php"; 

// Fetch approved events
$sql = "SELECT event_name, event_date, event_time FROM event_requests WHERE status = 'approved'";
$result = $conn->query($sql); 

$events = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'title' => $row['event_name'],
            'date' => $row['event_date'],
            'time' => $row['event_time'],

        ];
    } 
}

// Return events as JSON
header('Content-Type: application/json');
echo json_encode($events);

$conn->close();
?>