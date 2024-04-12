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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $playerName = $_POST['player_name'];
    $questionId = $_POST['question_id'];
    $replyText = $_POST['reply'];

    $stmt = $pdo->prepare("INSERT INTO replies (player_name, question_id, reply) VALUES (:player_name, :question_id, :reply)");
    $stmt->execute(['player_name' => $playerName, 'question_id' => $questionId, 'reply' => $replyText]);

    echo "Reply submitted successfully!";
} else {
    echo "Invalid request method. Please use POST method to submit a reply.";
}
?>