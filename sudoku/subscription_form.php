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
    if (!empty($_POST['player_name'])) {
        // Generate a random subc_id
        $subc_id = isset($_POST['subc_id']) ? $_POST['subc_id'] : '';

        // Get form data
        $player_name = $_POST['player_name'];
        $subc_type = isset($_POST['subc_type']) ? $_POST['subc_type'] : '';
        $amount = 0;
        $game_type = ($subc_type === 'free') ? 'classical' : 'competition';
        $end_date = date('Y-m-d', strtotime('+100 years')); // Default end date for free subscription

        if ($subc_type !== 'free') {
            $amount_option = isset($_POST['amount_option']) ? $_POST['amount_option'] : '';

            if ($amount_option === '3months') {
                $amount = 499;
                $end_date = date('Y-m-d', strtotime('+3 months'));
            } elseif ($amount_option === '6months') {
                $amount = 899;
                $end_date = date('Y-m-d', strtotime('+6 months'));
            } elseif ($amount_option === '1year') {
                $amount = 1199;
                $end_date = date('Y-m-d', strtotime('+1 year'));
            }
        }

        // Check if the player exists in the player1 table before inserting into subscription
        $check_player_sql = "SELECT player_name FROM player1 WHERE player_name = :player_name";
        $check_stmt = $pdo->prepare($check_player_sql);
        $check_stmt->execute([':player_name' => $player_name]);
        $player_exists = $check_stmt->fetch();

        if ($player_exists) {
            // Prepare and execute the SQL statement
            $sql = "INSERT INTO subscription (subc_id, player_name, subc_type, amount, game_type, end_date) 
                    VALUES (:subc_id, :player_name, :subc_type, :amount, :game_type, :end_date)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':subc_id' => $subc_id, ':player_name' => $player_name, ':subc_type' => $subc_type,
                            ':amount' => $amount, ':game_type' => $game_type, ':end_date' => $end_date]);

            header("Location: welcome_player.php");
            exit;
        } else {
            echo "Player does not exist. Please make sure the player name is correct.";
        }
    } 
} */
?>

<!DOCTYPE html> <!--
<html>
<head>
    <title>Subscription Form</title>
</head>
<body>
    <h1>Subscription Form</h1>
    <form method="post">
        <label for="player_name">Player Name:</label><br>
        <input type="text" id="player_name" name="player_name"><br>
        <label for="subc_id">Subscription ID:</label>
        <input type="text" id="subc_id" name="subc_id" readonly>
        <label for="subc_type">Subscription Type:</label><br>
        <select id="subc_type" name="subc_type">
            <option value="free">Free</option>
            <option value="premium">Premium</option>
        </select><br>

        <div id="premium_options" style="display: none;">
            <label for="amount_option">Select Premium Option:</label><br>
            <select id="amount_option" name="amount_option">
                <option value="3months">3 Months - Rs499</option>
                <option value="6months">6 Months - Rs899</option>
                <option value="1year">1 Year - Rs1199</option>
            </select><br>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        var subc_id = Math.floor(Math.random() * 900000) + 100000;
        document.getElementById("subc_id").value = subc_id;
        document.getElementById('subc_type').addEventListener('change', function() {
            var premiumOptionsDiv = document.getElementById('premium_options');
            if (this.value === 'premium') {
                premiumOptionsDiv.style.display = 'block';
            } else {
                premiumOptionsDiv.style.display = 'none';
            }
        });
    </script>
</body>
</html>  -->
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
    if (!empty($_POST['player_name'])) {
        // Generate a random subc_id
        $subc_id = isset($_POST['subc_id']) ? $_POST['subc_id'] : '';

        // Get form data
        $player_name = $_POST['player_name'];
        $subc_type = isset($_POST['subc_type']) ? $_POST['subc_type'] : '';
        $amount = 0;
        $game_type = ($subc_type === 'free') ? 'classical' : 'competition';
        $end_date = date('Y-m-d', strtotime('+100 years')); // Default end date for free subscription

        if ($subc_type !== 'free') {
            $amount_option = isset($_POST['amount_option']) ? $_POST['amount_option'] : '';

            if ($amount_option === '3months') {
                $amount = 499;
                $end_date = date('Y-m-d', strtotime('+3 months'));
            } elseif ($amount_option === '6months') {
                $amount = 899;
                $end_date = date('Y-m-d', strtotime('+6 months'));
            } elseif ($amount_option === '1year') {
                $amount = 1199;
                $end_date = date('Y-m-d', strtotime('+1 year'));
            }
        }

        // Check if the player exists in the player1 table before inserting into subscription
        $check_player_sql = "SELECT player_name FROM player1 WHERE player_name = :player_name";
        $check_stmt = $pdo->prepare($check_player_sql);
        $check_stmt->execute([':player_name' => $player_name]);
        $player_exists = $check_stmt->fetch();

        if ($player_exists) {
            // Prepare and execute the SQL statement
            $sql = "INSERT INTO subscription (subc_id, player_name, subc_type, amount, game_type, end_date) 
                    VALUES (:subc_id, :player_name, :subc_type, :amount, :game_type, :end_date)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':subc_id' => $subc_id, ':player_name' => $player_name, ':subc_type' => $subc_type,
                            ':amount' => $amount, ':game_type' => $game_type, ':end_date' => $end_date]);

            if ($subc_type === 'premium') {
                header("Location: payment.html");
                exit;
            } else {
                header("Location: welcome_player.php");
                exit;
            }
        } else {
            echo "Player does not exist. Please make sure the player name is correct.";
        }
    } 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Subscription Form</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #3494e6, #ec6ead);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
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
           
            background: rgb(238,174,202);
background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            /*background: linear-gradient(45deg, #ff9a9e, #fad0c4); */
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
           /* background: linear-gradient(45deg, #fbc2eb, #a6c1ee);
            border-radius: 10px;
            animation: gradientAnimation 15s ease infinite;
            background: linear-gradient(45deg, #fbc2eb, #a6c1ee); */
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
            
        }

       label {
            display: block;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="email"],#subc_type,#premium_options, select,option,
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: none;
            border-bottom: 1px solid #ddd;
            box-sizing: border-box;
        }

        button[type="submit"] {
           width: calc(100% - 20px);
           padding:10px; 
           margin-top :20px; 
           background-color:#333; 
           color:#fff; 
           border:none; 
           cursor:pointer; 
           border-radius :5px; 
         }

         button[type="submit"]:hover { 
             background-color:#444; 
         }
    </style>
</head>
<body >
<div class="container">
    <h1>Subscription Form</h1>
    <form method="post">
        <label for="player_name">Player Name:</label><br>
        <input type="text" id="player_name" name="player_name"><br>
        <label for="subc_id">Subscription ID:</label>
        <input type="text" id="subc_id" name="subc_id" readonly>
        <label for="subc_type">Subscription Type:</label><br>
        <select id="subc_type" name="subc_type">
            <option value="free">Free</option>
            <option value="premium">Premium</option>
        </select><br>

        <div id="premium_options" style="display: none;">
            <label for="amount_option">Select Premium Option:</label><br>
            <select id="amount_option" name="amount_option">
                <option value="3months">3 Months - Rs499</option>
                <option value="6months">6 Months - Rs899</option>
                <option value="1year">1 Year - Rs1199</option>
            </select><br>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>
    <script>
        var subc_id = Math.floor(Math.random() * 900000) + 100000;
        document.getElementById("subc_id").value = subc_id;
        document.getElementById('subc_type').addEventListener('change', function() {
            var premiumOptionsDiv = document.getElementById('premium_options');
            if (this.value === 'premium') {
                premiumOptionsDiv.style.display = 'block';
            } else {
                premiumOptionsDiv.style.display = 'none';
            }
        });
    </script>
</body>
</html>
