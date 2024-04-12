<?php
// Include your database connection details
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

if (!empty($_POST['delete_player']) && !empty($_POST['player_id'])) {
    try {
        $pdo = new PDO($dsn, $user, $pass, $opt);
        
        // Prepare and execute the SQL query to delete the player with the specified ID
        $stmt = $pdo->prepare("DELETE FROM player1 WHERE player_id = :id");
        $stmt->bindValue(':id', $_POST['player_id'], PDO::PARAM_INT);
        $stmt->execute();
        
        http_response_code(200); // Indicate successful response
        exit;
    
    } catch (PDOException $e) {
        http_response_code(500); // Indicate server error
        die("Error: " . $e->getMessage());
    }
}
?>
