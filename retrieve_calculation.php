<?php
// $servername = "0.0.0.0";
// $username = "remote_user";
// $password = "password";
// $dbname = "calculator_history";

$servername = "127.0.0.1";
$username = "root";
$password = "xampp@1.";
$dbname = "calculator_history";

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve calculation history from the database
$sql = "SELECT * FROM calculations ORDER BY timestamp DESC";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculator History</title>
</head>
<body>
    <h2>Calculation History</h2>
    <style>
        body {
            
            
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        h2 {
            
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th{
            color:black;
            
            
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;

        } td {
            color:green;
            
            
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <table border="1">
        <tr>
            <th>Expression</th>
            <th>Result</th>
            <th>Timestamp</th>
        </tr>
        <?php
        // Display each calculation as a table row
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['expression'] . "</td>";
                echo "<td>" . $row['result'] . "</td>";
                echo "<td>" . $row['timestamp'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No calculation history found.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
