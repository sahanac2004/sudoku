<?php
/*
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

$stmt = $pdo->prepare("INSERT INTO questions (player_name, email, question) VALUES (?, ?, ?)");
$stmt->execute([$_POST['player_name'], $_POST['email'], $_POST['question']]);

header('Location: welcome_player.php');
exit;



$conn = mysqli_connect('localhost','sahana','sahanac@2004*','sahana',3306);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$player_name = $_POST['player_name'];
$email= $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO player1 (player_name,email, password) VALUES (?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss', $player_name, $email, $password);

if ($stmt->execute()) {
    // Set the $_SESSION['name'] variable
    session_start();
    $_SESSION['player_name'] = $player_name;

    // Redirect to welcome page
    header("Location: welcome_player.php?player_name=" . urlencode($player_name));
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();*/
?>
<?php
$conn = mysqli_connect('localhost', 'sahana', 'sahanac@2004*', 'sahana', 3306);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$player_name = $_POST['player_name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if player already exists
$check_query = "SELECT * FROM player1 WHERE player_name = '$player_name'";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Player already exists. Please choose a different name.');</script>";
    header("Location:player_register.html");
} else {
    $sql = "INSERT INTO player1 (player_name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $player_name, $email, $password);

    if ($stmt->execute()) {
        // Set the $_SESSION['name'] variable
        session_start();
        $_SESSION['player_name'] = $player_name;
        
        // Redirect to welcome page if needed
        header("Location: welcome_player.php?player_name=" . urlencode($player_name));
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
