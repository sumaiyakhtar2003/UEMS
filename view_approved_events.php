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
    <title>Approved Events</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f8f9fa;
            background-image: radial-gradient(circle, rgba(0, 0, 0, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
            margin: 0;
            padding: 0;
            color: #2d3436;
        }

        h2 {
            text-align: center;
            margin: 30px 0;
            font-size: 32px;
            color:rgb(62, 123, 174);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: rgb(79, 149, 185);
            color: #fff;
            font-size: 18px;
        }

        td {
            font-size: 16px;
            color: #636e72;
        }

        tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        tr:hover {
            background-color: rgba(108, 92, 231, 0.2);
            cursor: pointer;
            transform: scale(1.02);
            transition: 0.3s;
        }

        td.status {
            font-weight: bold;
            color: rgb(10, 138, 112);
        }

        .no-records {
            text-align: center;
            font-size: 20px;
            margin: 20px 0;
            color:rgb(169, 183, 188);
        }

        .back-button {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color:rgb(123, 189, 255);
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .back-button:hover {
            background-color:rgb(104, 180, 235);
        }

        @media (max-width: 768px) {
            table {
                width: 95%;
            }

            h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <h2>🎉 Approved Events</h2>
    
    
    <a href="organizer_dashboard.html" class="back-button">Back</a>

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
                        <td class='status'>{$row['status']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5' class='no-records'>No approved events found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
