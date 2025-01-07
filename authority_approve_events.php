<?php
include "db_connection.php"; 

if (isset($_POST['action']) && $_POST['action'] == 'approve') {
    $event_id = intval($_POST['id']);
    $query = "SELECT event_date FROM event_requests WHERE id = $event_id";
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $event = $result->fetch_assoc();
        $event_date = $event['event_date'];
        $check_query = "SELECT COUNT(*) AS approved_count FROM event_requests WHERE event_date = '$event_date' AND status = 'Approved'";
        $check_result = $conn->query($check_query);
        $count_row = $check_result->fetch_assoc();

        if ($count_row['approved_count'] >= 2) {
            echo json_encode([
                'status' => 'warning',
                'message' => 'Cannot approve this event. There are already two approved events on this date.'
            ]);
        } else {
            $approve_query = "UPDATE event_requests SET status = 'Approved' WHERE id = $event_id";
            if ($conn->query($approve_query) === TRUE) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Event approved successfully!'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Error approving the event: ' . $conn->error
                ]);
            }
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Event not found.'
        ]);
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'reject') {
    $event_id = intval($_POST['id']);
    $sql = "UPDATE event_requests SET status = 'Rejected' WHERE id = $event_id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Event rejected successfully!'
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Error rejecting the event: ' . $conn->error
        ]);
    }
}

if (isset($_GET['fetch']) && $_GET['fetch'] == 'all') {
    $sql = "SELECT * FROM event_requests WHERE status = 'Pending'";
    $result = $conn->query($sql);
    $events = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
    }
    echo json_encode($events);
}

$conn->close();
?>



