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

// Retrieve form data
$category = $_POST['category'];
$amount = $_POST['amount'];
$description = $_POST['description'];

// Insert data into database
$sql = "INSERT INTO transactions (category, amount, description) VALUES ('$category', $amount, '$description')";

if ($conn->query($sql) === TRUE) {
  // Redirect to recent transactions page
  header("Location: recenttrans.html");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
