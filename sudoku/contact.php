<?php
session_start();

if (!isset($_SESSION['player_name'])) {
    header("Location: player_register.html");
    header("Location: player_login.html");
    exit;
}?>
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


?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome Player</title>
</head>
<body>
	<h1>Welcome, <?= htmlspecialchars($_SESSION['player_name']) ?>!</h1>
	<h2>Your Questions and Replies</h2>
	<table>
		<thead>
			<tr>
				<th>Question</th>
				<th>Reply</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$player_name = $_SESSION['player_name'];
			$stmt = $pdo->prepare("SELECT q.*, r.reply FROM questions q LEFT JOIN replies r ON q.id = r.question_id WHERE q.player_name = :player_name ORDER BY q.created_at DESC");
            
			$stmt->bindParam(':player_name', $player_name);
			$stmt->execute();
			$questions = $stmt->fetchAll();
			foreach ($questions as $question) {
			?>
			<tr>
				<td><?= htmlspecialchars($question['question']) ?></td>
				<td><?= htmlspecialchars($question['reply']) ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>