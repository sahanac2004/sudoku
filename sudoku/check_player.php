
<?php
// Establish database connection
$servername = "localhost";
$username = "sahana";
$password = "sahanac@2004*";
$dbname = "sahana";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$player_name = $_POST['player_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check if credentials match
$sql = "SELECT * FROM player1 WHERE player_name='$player_name' AND email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // Redirect to welcome_player.php if credentials match
    header("Location: welcome_player.php");
} else {
    echo "Login failed. Please check your credentials.";
}

$conn->close();
?>
