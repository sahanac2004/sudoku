<?php



$host = 'localhost';
$db = 'database1';
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

$player_name = $_POST['player_name'];
$email = $_POST['email'];
$question = $_POST['question'];

$stmt = $pdo->prepare('INSERT INTO contact (player_name, email, question) VALUES (?, ?, ?)');
$stmt->execute([$player_name, $email, $question]);
?>