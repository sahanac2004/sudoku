<?php


// Create a new database connection
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
$pdo = new PDO($dsn, $user, $pass, $opt);

// Get the form data
$player_name = $_POST['player_name'];
$payment_id = $_POST['payment_id'];
$subc_id = $_POST['subc_id'];
$pay_mode = $_POST['pay_mode'];
$date_time = $_POST['date_time'];
if ($result->num_rows > 0) {
    // Display pop-up message
    echo "<script>alert('Player or payment ID is not corelated!')</script>";
    // Redirect back to the registration page
    echo "<script>window.location.href = 'payment.html';</script>";
}else{
// Insert the data into the subscription table
$sql = "INSERT INTO payment (player_name,subc_id, payment_id,pay_mode,date_time) VALUES ( :player_name, :subc_id,:payment_id,:pay_mode,:date_time)";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        ':subc_id' => $subc_id,
        ':player_name' => $player_name,
        ':payment_id' => $payment_id,
        ':pay_mode' => $pay_mode,
        ':date_time' => $date_time
    ]);
    header('Location: subs_player.php?player_name=' . urlencode($player_name));

    // Redirect to the appropriate page based on the subscription type
    //header('Location:subs_player.php ');
    exit;
} catch (PDOException $e) {
    // Check if the error message contains the keyword "foreign key constraint"
    if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
        // Display a pop-up message saying that the player doesn't exist
        echo "<script>alert('Player not found!');</script>";
        echo "<script>window.location.href = 'payment.html';</script>";
    }
    // Check if the error message contains the keyword "integrity constraint violation"
    else if (strpos($e->getMessage(), 'integrity constraint violation') !== false) {
        // Display a pop-up message saying that the player_name and subc_id combination already exists
        echo "<script>alert('Player_name and subscription ID combination already exists!');</script>";
        echo "<script>window.location.href = 'payment.html';</script>";
    }
    // Display the error message
    else {
        echo "Error: " . $e->getMessage();
    }
}
}
// Close the database connection
$pdo = null;



?>