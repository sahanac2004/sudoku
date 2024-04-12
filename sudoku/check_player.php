<?php
/*

$host = 'localhost';
$db = 'sahana';
$user = 'sahana';
$pass = 'sahanac@2004*';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

// Get form data
$player_name = $_POST['player_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the player exists in the database
$sql = "SELECT * FROM player1 WHERE player_name = :player_name AND email = :email AND password = :password ";
$stmt = $pdo->prepare($sql);
$stmt->execute([':player_name' => $player_name, ':email' => $email , ':password' => $password]);

if ($stmt->rowCount() > 0) {
    // Player exists, return true
    echo 'true';
} else {
    // Player does not exist, return false
    echo 'false';
    echo 'Player name , email or password is invalid!';
}

*/
?>


<?php /*

$host = 'localhost';
$db = 'sahana';
$user = 'sahana';
$pass = 'sahanac@2004*';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

$player_name = $_POST['player_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM player1 WHERE player_name = :player_name AND email = :email AND password = :password";
$stmt = $pdo->prepare($sql);
$stmt->execute(['player_name' => $player_name, 'email' => $email, 'password' => $password]);

if ($stmt->rowCount() > 0) {
    echo 'true'; // Player exists
    //header("Location: welcome_player.php?player_name=" . urlencode($player_name));
} else {
    echo 'false'; // Player does not exist
} */
?>


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