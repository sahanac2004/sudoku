<?php
session_start();

if(isset($_GET['player_name'])) {
    $player_name = $_GET['player_name'];

    try {
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

        $stmt = $pdo->prepare("SELECT q.question, r.reply FROM questions q LEFT JOIN replies r ON q.question_id = r.question_id WHERE q.player_name = :player_name ORDER BY q.question_id DESC");
        $stmt->execute(['player_name' => $player_name]);
        $questions = $stmt->fetchAll();
    } catch (\Throwable $e) {
        die('Error connecting to database: ' . $e->getMessage());
    }
} else {
    die('Player name not found in session.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #110670, #1db6b6 50%, #8fdeec 50%);
            background-size: 400% 400%;
            animation: Gradient 15s ease infinite;
            
        }
        form {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
        }

        @keyframes Gradient {
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

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h1, h2 {
            text-align: center;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;background-color: #110670;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    
    </style>
    <title>Player Questions and Replies</title>
</head>
<body>
    <h1>Welcome, <?php echo isset($_GET['player_name']) ? $_GET['player_name'] : 'Guest'; ?></h1>
    <h2>Your Questions and Replies</h2>
    <table>
        <thead>
            <tr>
                <th>Question</th>
                <th>Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question) { ?>
                <tr>
                    <td><?= htmlspecialchars($question['question']) ?></td>
                    <td><?= isset($question['reply']) ? htmlspecialchars($question['reply']) : ''; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
