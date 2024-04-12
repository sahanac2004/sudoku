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

$stmt = $pdo->prepare("INSERT INTO questions (player_name, email, question) VALUES (?, ?, ?)");
$stmt->execute([$_POST['player_name'], $_POST['email'], $_POST['question']]);

$checkPremiumSubscriptionQuery = "SELECT COUNT(*) AS numPremiumSubs FROM subscription WHERE player_name = ? AND subc_type = 'premium' AND end_date > NOW()";
$stmtPremiumSubs = $pdo->prepare($checkPremiumSubscriptionQuery);
$stmtPremiumSubs->execute([$_POST['player_name']]);
$numPremiumSubs = $stmtPremiumSubs->fetchColumn();

if ($numPremiumSubs > 0) {
    header('Location: subs_player.php?player_name=' . $_POST['player_name']);
} else {
    header('Location: welcome_player.php?player_name=' . $_POST['player_name']);
}
exit;
?>
