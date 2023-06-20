<?php

// Connect to database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "expense_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query database for transaction data
$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);

// Loop through results and store in array
$transactions = array();
while ($row = $result->fetch_assoc()) {
  $transactions[] = $row;
}

// Convert array to JSON and output to browser
header('Content-Type: application/json');
echo json_encode($transactions);

$conn->close();

?>
