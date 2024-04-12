

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #333;
            color: white;
        }
      
        tr:hover {
            background-color: #e9e9e9;
        }
        form {
            display: inline-block;
        }
        button {
            background-color: #dc3545;
            color:white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }




        body {
            font-family: Arial, sans-serif;
            background-color: #57a7ca;
            margin: 0;
            padding: 0;
            position: relative; /* Add position relative */
            min-height: 100vh; /* Ensure page takes at least full viewport height */
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td,a {color: #e9e9e9;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #120a6e;
            color: white;
        }
     
        tr:hover {
            background-color:blue;
        }
        form {
            display: inline-block;
        }
        button {
            background-color: #120a6e;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }
        button:hover {
            background-color: #120a6e;
        }

        .go-back-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        body {
            margin: auto;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            overflow: auto;
            background: linear-gradient(315deg, rgb(7, 7, 53) 3%, rgba(60,132,206,1) 38%, rgb(43, 39, 132) 68%, rgb(14, 14, 144) 98%);
            animation: gradient 15s ease infinite;
            background-size: 400% 400%;
            background-attachment: fixed;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 0%;
            }
            50% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }

        .wave {
            background: rgb(255 255 255 / 25%);
            border-radius: 1000% 1000% 0 0;
            position: fixed;
            width: 200%;
            height: 12em;
            animation: wave 10s -3s linear infinite;
            transform: translate3d(0, 0, 0);
            opacity: 0.8;
            bottom: 0;
            left: 0;
            z-index: -1;
        }

        .wave:nth-of-type(2) {
            bottom: -1.25em;
            animation: wave 18s linear reverse infinite;
            opacity: 0.8;
        }

        .wave:nth-of-type(3) {
            bottom: -2.5em;
            animation: wave 20s -1s reverse infinite;
            opacity: 0.9;
        }

        @keyframes wave {
            2% {
                transform: translateX(1);
            }

            25% {
                transform: translateX(-25%);
            }

            50% {
                transform: translateX(-50%);
            }

            75% {
                transform: translateX(-25%);
            }

            100% {
                transform: translateX(1);
            }
        }
    </style>
</head>
<body>
<div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
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

    // Check if the form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_player'])) {
        // Get the player ID from the form
        $player_id = $_POST['player_id'];

        // Execute a SQL query to delete the player with the specified ID
        $sql = "DELETE FROM player1 WHERE player_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $player_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect to the players.php page
        header('Location: delete.php');
    }

    // Retrieve all players from the database
    $sql = "SELECT * FROM player1";
    $stmt = $pdo->query($sql);
    $players = $stmt->fetchAll();

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<table>
    <tr>
        <th>Player ID</th>
        <th>Player Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php
    foreach ($players as $player) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($player['player_id']) . "</td>";
        echo "<td>" . htmlspecialchars($player['player_name']) . "</td>";
        echo "<td>" . htmlspecialchars($player['email']) . "</td>";
        echo "<td><form method='post' action='delete.php'><input type='hidden' name='player_id' value='" . htmlspecialchars($player['player_id']) . "'><button type='submit' name='delete_player'>Delete</button></form></td>";
        echo "</tr>";
    }
    ?>
</table>
<button type="submit"> <a href="welcome.php">Go Back</a></button>
<!--<form action="welcome.php" method="post">
        <button type="submit" < a href="welcome.php"></a>>Go Back</button>
    </form> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('form').submit(function(e) {
        e.preventDefault();
        var playerId = $(this).find('input[name="player_id"]').val();
        
        $.ajax({
            url: 'delete.php',
            type: 'POST',
            data: { delete_player: true, player_id: playerId },
            success: function() {
                location.reload();
            },
            error: function() {
                alert('Error: Unable to delete player.');
            }
        });
    });
});
</script>

</body>
</html>