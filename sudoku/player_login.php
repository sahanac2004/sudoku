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
    // Get form data
    
    $player_name = $_POST['player_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $sql = "SELECT * FROM player1 WHERE player_name=:player_name AND email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':player_name' => $player_name, ':email' => $email, ':password' => $password]);

    if ($stmt->rowCount() > 0) {
        // Player exists
        $playerData = $stmt->fetch();

        // Check if player has an active subscription
        $checkPremiumSubscriptionQuery = "SELECT COUNT(*) AS numPremiumSubs FROM subscription WHERE player_name=:player_name AND subc_type='premium' AND end_date > NOW()";
        $stmtPremiumSubs = $pdo->prepare($checkPremiumSubscriptionQuery);
        $stmtPremiumSubs->execute([':player_name' => $playerData['player_name']]);
        $numPremiumSubs = $stmtPremiumSubs->fetchColumn();

        if ($numPremiumSubs > 0) {
            header("Location: subs_player.php?player_name=" . $playerData['player_name']);
            exit;
        } else {
            header("Location: welcome_player.php?player_name=" . $playerData['player_name']);
            exit;
        }
    } //else {
        //echo alert("Invalid email or password. Please try again.");
    //}
}
    // Query to check if credentials match
   



 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Login</title>
    <style>
        body { background: linear-gradient(135deg, #020024, #3d3d9e, #00d4ff);
             background-size: 200% 200%;
              animation: gradientAnimation 15s ease infinite;
               margin: 0;
                padding: 0;
                 color: #333;
                  font-family: 'Arial', sans-serif;
                   overflow: hidden; 
                }
@keyframes gradientAnimation { 
    0% {background-position: 0% 50%;} 
    50% {background-position: 100% 50%;}
     100% {background-position: 0% 50%;} }

.container { width: 300px;
     margin: 0 auto;
      padding: 20px; 
      background-color: rgba(255, 255, 255, 0.8);
       border: 1px solid #ddd; 
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
         margin-top: 100px;
         background: linear-gradient(135deg, #020024, #3d3d9e, #00d4ff);
        color: #ddd; }

h1 { text-align: center;
     padding: 20px;
      background-color:lightseagreen;
       color: #fff; 
       border-radius: 10px 10px 0 0; }

label { display: block;
     margin-top: 20px; }

input[type="text"], input[type="password"], input[type="email"] { width: 100%;
     padding: 10px;
      margin-top: 5px;
       border: 1px solid #ddd;
       box-sizing: border-box;
        padding-left: 40px;
     }

input[type="text"]::before, input[type="email"]::before, input[type="password"]::before { content: ""; position: absolute; font-family: 'FontAwesome'; left: 10px; top: 12px; }

input[type="text"]::before { content: "\f007"; }

input[type="email"]::before { content: "\f0e0"; }

input[type="password"]::before { content: "\f023"; }

button[type="submit"] { width: 100%; padding: 10px; margin-top: 20px; background-color: lightseagreen; color:#020024; border: none; cursor: pointer; border-radius: 0 0 10px 10px; }

button[type="submit"]:hover { background-color: #3d3d9e; }

.password-toggle { position: absolute; right: 10px; top: 12px; cursor: pointer; } </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </style>
</head>
<body>
<div class="container">
    <h1>Player Login</h1>
    <form method="post">
        <label for="player_name">Player Name:</label><br>
        <input type="text" id="player_name" name="player_name"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        
        <label for="password">Password:</label><br>
        <div class="password-input">
            <input type="password" id="password" name="password" >
            <span class="toggle-password" onclick="
                var x = document.getElementById('password');
                if (x.type === 'password') { x.type = 'text'; } else { x.type = 'password'; }
            "><i class="fas fa-eye"></i></span>
        </div>
        
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="player_register.php">Register here</a></p>
    </form>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script>
    if (<?php echo isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && $stmt->rowCount() === 0 ? 'true' : 'false'; ?>) {
       alert("Invalid email or password. Please try again.");
    }
</script>
</body>
</html>