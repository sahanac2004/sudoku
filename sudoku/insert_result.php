<?php
// Retrieve the input_name and result_time from the POST request
$input_name = $_POST['input_name'];
$result_time = $_POST['result_time'];

// Connect to the database
$host = 'localhost';
$user = 'sahana';
$password = 'sahanac@2004*';
$dbname = 'sahana';
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert the input_name and result_time into the 'results' table
$sql = "INSERT INTO results (input_name, result_time) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $input_name, $result_time);
$stmt->execute();

// Close the statement and database connection
$stmt->close();
$conn->close();
?>