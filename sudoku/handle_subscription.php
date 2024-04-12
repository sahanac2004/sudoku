
<?php 
$servername = "localhost";
$username = "sahana";
$password = "sahanac@2004*";
$dbname = "sahana";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$playerName = $_POST['player_name'];
$subcType = $_POST['subc_type'];
$subcId = $_POST['subc_id'];
$amount = $_POST['amount'];
$gameType = $_POST['game_type'];
$end_date = $_POST['end_date'];

// Check if the player already has an active premium subscription
$checkPremiumSubscriptionQuery = "SELECT COUNT(*) AS numPremiumSubs FROM subscription WHERE player_name='$playerName' AND subc_type='premium' AND end_date > NOW()";
$resultPremiumSubs = $conn->query($checkPremiumSubscriptionQuery);
$numPremiumSubs = $resultPremiumSubs->fetch_assoc()['numPremiumSubs'];

if ($numPremiumSubs > 0 && $subcType === 'premium') {
    echo "<script>alert('You already have an active premium subscription. You cannot take another one until the existing one ends.');</script>";
    header("Location: subs_player.php?player_name=$playerName");
    exit;
} else {
    // Insert data into database if existing premium subscription has ended or player is not subscribing to premium
    $sql = "INSERT INTO subscription (subc_id, player_name, subc_type, amount, game_type, end_date)
            VALUES ('$subcId', '$playerName', '$subcType', '$amount', '$gameType', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to payment page after successful insertion
        header("Location: payment.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close(); 
?>


<?php
/* Database connection details
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

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the form data
        
        $subc_id = $_POST['subc_id'];
        $player_name = $_POST['player_name'];
        $subc_type = $_POST['subc_type'];
        $amount = $_POST['amount'];
        $game_type = $_POST['game_type'];
        $end_date = $_POST['end_date'];

        // Insert the data into the subscription table
        $stmt = $pdo->prepare("INSERT INTO subscription (subc_id,player_name, subc_type,   amount, game_type, end_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([ $subc_id,$player_name, $subc_type,  $amount, $game_type, $end_date]);

        // Redirect based on subscription type
        if ($subc_type === 'premium') {
            header('Location: payment.html'); // Redirect to payment page for premium subscription
        } else {
            header('Location: welcome_player.php'); // Redirect to welcome page for free subscription
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); */
//}
?>
