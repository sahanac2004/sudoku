<?php




// Create a new database connection
$host = 'localhost';
$db   = 'database1';
$user = 'sahana';
$pass = 'sahanac@2004*';
$charset = 'utf8mb4';
// Create a new database connection
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Get the form data
$player_name = $_POST['player_name'];
$subc_type = $_POST['subc_type'];
$subc_id = $_POST['subc_id'];
$amount = $_POST['amount'];
$game_type = $_POST['game_type'];

// Insert the data into the subscription table
$sql = "INSERT INTO subscription (subc_id, player_name, subc_type, amount, game_type) VALUES (:subc_id, :player_name, :subc_type, :amount, :game_type)";
$stmt = $pdo->prepare($sql);
try {
    $stmt->execute([
        ':subc_id' => $subc_id,
        ':player_name' => $player_name,
        ':subc_type' => $subc_type,
        ':amount' => $amount,
        ':game_type' => $game_type
    ]);

    if ($subc_type == 'free') {
        echo "<script>window.location.href='freesudoku.html';</script>";
    } else {
        echo "<script>window.location.href='payment.html';</script>";
    }
} catch (PDOException $e) {
    // Check if the error message contains the keyword "foreign key constraint"
    if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
        // Display pop-up message
        echo "<script>alert('Player doesn\'t exist!')</script>";
        echo "<script>window.location.href = 'subscription.html';</script>";
    } else {
        // Display error message
        echo "Error adding subscription: " . $e->getMessage();
    }
}
exit;
?>