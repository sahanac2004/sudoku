<?php


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


?>