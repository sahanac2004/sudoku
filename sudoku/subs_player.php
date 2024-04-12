

<?php
// Get the player_name from the URL parameter
$player_name = $_GET['player_name'];

// Use $player_name in your code as needed
?>

<!DOCTYPE html>
<html>
<head>
    <title>Player Page</title>
    <style>
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
<div class="container">
    <p>Hi <?php echo isset($_GET['player_name']) ? $_GET['player_name'] : 'Guest'; ?>! Welcome to the player page.</p>
    <p>You are an active premium subscriber</p>
    <form action="logout_player.php" method="post">
        <button type="submit" class="logout">Logout</button>
    </form>

    <form action="free.php" method="post">
        <button type="submit" class="logout">Free Game</button>
    </form>

    <form action="competition.php" method="post">
        <button type="submit" class="logout">Competition Game</button>
    </form>

    <form action="player_question.html" method="post">
        <button type="submit" class="logout">Questions</button>
    </form>

    <form action="player _view_replies.php?player_name=<?php echo isset($_GET['player_name']) ? $_GET['player_name'] : ''; ?>" method="post">
        <button type="submit" class="logout">Answers</button>
    </form>

    <form action="Landingpage.php" method="post">
        <button class="logout">Home</button>
    </form>

    <button onclick="history.go(-1)" class="logout">Go Back</button>
</div>
</body>
</html>

