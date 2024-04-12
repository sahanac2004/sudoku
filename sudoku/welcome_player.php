<?php
session_start();


//nclude 'player_view_replies.php';
$player_name = isset($_GET['player_name']) ? $_GET['player_name'] : (isset($_SESSION['player_name']) ? $_SESSION['player_name'] : '');

$servername = "localhost";
$username = "sahana";
$password = "sahanac@2004*";
$dbname = "sahana";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT player_name FROM player1 WHERE player_name = ?");
$stmt->bind_param("s", $player_name);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($player_name);
    $stmt->fetch();

    $checkPremiumSubscriptionQuery = "SELECT COUNT(*) AS numPremiumSubs FROM subscription WHERE player_name = ? AND subc_type = 'premium' AND end_date > NOW()";
    $stmtPremiumSubs = $conn->prepare($checkPremiumSubscriptionQuery);
    $stmtPremiumSubs->bind_param("s", $player_name);
    $stmtPremiumSubs->execute();
    $stmtPremiumSubs->store_result();
    $stmtPremiumSubs->bind_result($numPremiumSubs);
    $stmtPremiumSubs->fetch();

    if ($numPremiumSubs > 0) {
        $conn->close();
        header("Location: subs_player.php?player_name=" . $player_name);
        exit;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Player</title>
    <style>
       /* body {
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

        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-top: 50px;
            text-align: center;
        }

        .logout {
            display: block;
            margin-top: 20px;
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .logout:hover {
            background-color: #444;
        } */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
        }

        @keyframes gradientAnimation {
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
            background: linear-gradient(45deg, #fbc2eb, #a6c1ee);
            color: #fff;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
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

        p {
            color: #333;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .logout {
            background: linear-gradient(45deg,#fbc2eb, #a6c1ee);
            color: #333;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            border-radius: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        .logout:hover {
            background: linear-gradient(45deg, #a6c1ee, #fbc2eb);
        }

        button {
            background: #fbc2eb;
            color:#333;
            padding: 15px 30px;
            border: none;
            cursor: pointer;
            border-radius: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        button:hover {
            background: #a6c1ee;
        }
    </style>
</head>
<body>
<!--<h1>Welcome Player</h1> -->
<div class="container">
    <p>Hi <?php echo $player_name; ?>, welcome to the player page.</p>

    <!-- Your HTML content here -->

    <form action="logout_player.php" method="post">
        <button type="submit" class="logout">Logout</button>
    </form>
    <form action="free.php" method="post">
        <button type="submit" class="logout">Play</button>
    </form>
    <form action="subscription_form.php" method="post">
        <button type="submit" class="logout">Subscription</button>
    </form>
    <form action="player_question.html" method="post">
        <button type="submit" class="logout">Questions</button>
    </form>
    <form action="player _view_replies.php?player_name=<?php echo isset($_GET['player_name']) ? $_GET['player_name'] : ''; ?>" method="post">
        <button type="submit" class="logout">Answers</button>
    </form>

    <!--<form action="player _view_replies.php" method="post">
        <button type="submit" class="logout">Answers</button>
    </form> -->
    <form action="Landingpage.php" method="post">
        <button class="logout">Home</button>
    </form>

    <button onclick="history.go(-1)" class="logout">Go Back</button>

</div>

</body>
</html>
