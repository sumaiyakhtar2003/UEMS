<?php
include 'db_connection.php';

$sql = "SELECT * FROM event_requests"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Event Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg,rgb(48, 113, 167),rgb(146, 186, 255));
            color: #fff;
            margin: 0;
            padding: 0;
        }

        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            overflow: hidden;
        }

        table, th, td {
            border: none;
        }

        th, td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color:rgb(60, 81, 150);
            color: #fff;
            font-size: 18px;
        }

        td {
            font-size: 16px;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            font-size: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .back-button {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color:rgb(116, 167, 233);
            color: white;
            font-size: 16px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        .back-button:hover {
            background-color:rgb(116, 195, 249);
        }

    </style>
</head>
<body>
    <h2>All Event Status</h2>

    <!-- Back Button (Redirects to organizer_dashboard.html) -->
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
                        <td>{$row['status']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No events found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>



