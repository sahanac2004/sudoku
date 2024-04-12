<?php /*
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

    // Insert player data into the database
    $sql = "INSERT INTO player1 (player_name, email, password) VALUES (:player_name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':player_name' => $player_name, ':email' => $email, ':password' => $password]);

    // Redirect to welcome_player.php with player's name
    header("Location: welcome_player.php?player_name=$player_name");
    exit;
}
*/
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

    // Insert player data into the database
    $sql = "INSERT INTO player1 (player_name, email, password) VALUES (:player_name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':player_name' => $player_name, ':email' => $email, ':password' => $password]);

    // Redirect to welcome_player.php with player's name
    header("Location: welcome_player.php?player_name=$player_name");
    exit;
}
?>
<!--
<!DOCTYPE html>
<html>
<head>
    <title>Player Registration</title>
   <style> body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <h1>Player Registration</h1>
    <form method="post">
        <label for="player_name">Player Name:</label><br>
        <input type="text" id="player_name" name="player_name"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
    -->

<!DOCTYPE html>
<html>
<head>
    <title>Player Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: calc(100% - 30px);
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-bottom: 1px solid #ddd;
            box-sizing: border-box;
        }

        input[type="password"] {
          position:relative;  
        }

        .toggle-password {
          position:absolute; 
          right:-25px; 
          top:-5px; 
          cursor:pointer; 
          color:#333; 
          font-size:18px; 
          z-index:2; 
          transition:.3s all ease-in-out; 
        }

        button[type="submit"] {
            width: calc(100% - 30px);
            padding: 10px;
            margin-top: 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor:pointer; 
        }

        button[type="submit"]:hover {
           background-color:#444; 
        }
    </style>
</head>
<body>
    <h1>Player Registration</h1>
    <form method="post">
        <label for="player_name">Player Name:</label><br>
        <input type="text" id="player_name" name="player_name"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        
        <label for="password">Password:</label><br>
        
         <input type="password" id="password" name="password">
         <span class="toggle-password" onclick="
         var x = document.getElementById('password');
         if (x.type === 'password') { x.type = 'text'; } else { x.type = 'password'; }
         ">👁️</span><br>

         <button type="submit">Register</button>
    </form>
</body>
</html>


