<?php
// Database connection details
$host = 'localhost';
$db   = 'sahana';
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

try {
    $pdo = new PDO($dsn, $user, $pass, $opt);

    // Check if the form was submitted with delete_player set
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_player'])) {
        // Get the player ID to be deleted
        $player_id = $_POST['player_id'];

        // Execute a SQL query to delete the player with the specified ID
        $sql = "DELETE FROM player1 WHERE player_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $player_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect back to the admin page after deletion
        header('Location: admin.php');
    } else {
        // If no delete operation requested, redirect back to admin page
        header('Location: admin.php');
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
