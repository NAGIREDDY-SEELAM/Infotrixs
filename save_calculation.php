<?php
$servername = "127.0.0.1";
$username = "root";
$password = "xampp@1.";
$dbname = "calculator_history";

// Retrieve data from AJAX request
$expression = $_POST['expression'];
$resultValue = $_POST['result'];

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query to insert data into the database
$stmt = $conn->prepare("INSERT INTO calculations (expression, result) VALUES (?, ?)");
$stmt->bind_param("sd", $expression, $resultValue);
$stmt->execute();

$stmt->close();
$conn->close();


?>
