<?php

// Database connection settings
$servername = "localhost";
$username = "sahana";
$password = "sahanac@2004*";
$dbname = "sahana";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $playerName = $_POST["player_name"];
    $subscriptionType = $_POST["subc_type"];
    $duration = isset($_POST["duration"]) ? (int)$_POST["duration"] : 0;
    $amount = (int)$_POST["amount"];
    $gameType = $_POST["game_type"];
    $subscriptionId = $_POST["subc_id"];
    $endDate = $_POST["end_date"];

    // Prepare the SQL statement
    $sql = "INSERT INTO subscription (subc_id, player_name, subc_type, amount, game_type, end_date) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("sisiss", $subscriptionId, $playerName, $subscriptionType, $amount, $gameType, $endDate);
           
        // Execute the statement
        if ($stmt->execute()){    
            header('Location: payment.html'); 
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close the connection
$conn->close();

?>