<?php
include 'db_connection.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reports - Authority Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
     
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #87CEEB, #E0F7FA);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #333;
        }

        
        .sidebar {
            width: 250px;
            background: linear-gradient(to bottom, #003366, #1d4f91);
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .sidebar h2 {
            text-align: center;
            font-size: 1.8em;
            margin-bottom: 20px;
            border-bottom: 2px solid #FFD700;
            padding-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 1.2em;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background: #1d6fc1;
        }

        
        .main-content {
            margin-left: 250px;
            padding: 30px;
            flex: 1;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            font-size: 1.1em;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #1d6fc1;
            color: white;
        }

        tr:hover {
            background-color: #f0f8ff;
        }

    </style>
</head>
<body>
    
    <div class="sidebar">
        <h2>Authority Panel</h2>
        <a href="authority_dashboard.html"><i class="fas fa-home"></i> Dashboard</a>
        <a href="authority_approve_events.html"><i class="fas fa-calendar-check"></i> Approve Events</a>
        <a href="authority_view_reports.php"><i class="fas fa-file-alt"></i> View Reports</a>
        
        <a href="authority_login/authority_login.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    
    <div class="main-content">
        <h1>View All Events</h1>
        <?php
        
        $sql = "SELECT * FROM event_requests";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <thead>
                        <tr>
                            <th>Event Name</th>
                            <th>Organizer</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['event_name']}</td>
                        <td>{$row['organizer']}</td>
                        <td>{$row['event_date']}</td>
                        <td>{$row['event_time']}</td>
                        <td>{$row['status']}</td>
                      </tr>";
            }
            echo "</tbody>
                  </table>";
        } else {
            echo "<p>No events found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>

