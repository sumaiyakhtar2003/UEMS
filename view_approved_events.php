<?php

include 'db_connection.php';


$sql = "SELECT * FROM event_requests WHERE status = 'Approved'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Approved Events</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background: #4CAF50;
            color: white;
        }

        td {
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h2>Approved Events</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Event Name</th>
            <th>Organizer</th>
            <th>Event Date</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['event_name']}</td>
                        <td>{$row['organizer']}</td>
                        <td>{$row['event_date']}</td>
                        <td>{$row['status']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No approved events found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
