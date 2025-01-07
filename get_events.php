<?php
include 'db_connection.php'; 


$sql = "SELECT event_date, event_name, event_time FROM event_requests WHERE `status` = 'Approved'";
$result = $conn->query($sql);


$events = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            'date' => $row['event_date'],
            'title' => $row['event_name'],
            'time' => $row['event_time'], 
        ];
    }
}

echo json_encode($events); 

$conn->close(); 
?>



