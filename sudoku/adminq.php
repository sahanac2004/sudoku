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

if (!empty($_POST['reply'])) {
    try {
        $player_name = $_POST['player_name'];
        $question_id = $_POST['question_id'];
        $reply = $_POST['reply'];

        // Insert the reply into the replies table
        $stmt = $pdo->prepare("INSERT INTO replies (player_name, question_id, reply) VALUES (?, ?, ?)");
        $stmt->execute([$player_name, $question_id, $reply]);

        // Redirect back to admin page after replying
        header('Location: adminq.php');
        exit;
    
    } catch (\Exception $ex) {
        echo '<div style="color: red; font-weight: bold; margin-top: 5px;">Error adding reply: ' . $ex->getMessage() . '</div>';
    }
}

$stmt = $pdo->query("SELECT q.*, r.reply FROM questions AS q LEFT JOIN replies AS r ON q.question_id = r.question_id ORDER BY q.question_id");
$questionsWithReplies = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $questionsWithReplies[] = array_merge((array)$row, ['has_reply' => !empty($row['reply'])]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
    
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(45deg, #4b6cb7, #182848); /* Dark blue gradient background */
            color: #fff;
            overflow: hidden;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: linear-gradient(45deg, #4b6cb7, #182848);  /* Semi-transparent black background */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
            overflow-y: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #4b6cb7; /* Dark blue border */
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #182848; /* Dark blue */
        }

        form {
            display: inline-block;
        }

        textarea {
            width: calc(100% - 20px);
            height: 80px;
            resize: vertical;
            padding: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
        }

        button {
            background-color:#182848; /* Dark blue button */
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
           background-color:darkslateblue; /* Darkened hover color for better feedback */
           color:#fff; 
       }

       h1, h2 {
           font-family:'Georgia', 'Times New Roman', Times, serif; 
           color:black; /* Dark blue heading color */
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

       body {
           animation-name: gradientAnimation;
           animation-duration:15s; 
           animation-timing-function:ease; 
           animation-iteration-count:infinite; 
       }
       
        
    </style>
</head>
<body class="container">
    <h1>Player Questions</h1>
    <table>
        <thead>
            <tr>
                <th>Player Name</th>
                <th>Email</th>
                <th>Question</th>
                <th>Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionsWithReplies as $question) { ?>
            <tr>
                <td><?= htmlspecialchars($question['player_name']) ?></td>
                <td><?= htmlspecialchars($question['email']) ?></td>
                <td><?= htmlspecialchars($question['question']) ?></td>
                <td>
                    <?php if (empty($question['reply'])) { ?>
                        <form action="" method="post">
                            <input type="hidden" name="player_name" value="<?= htmlspecialchars($question['player_name']) ?>">
                            <input type="hidden" name="question_id" value="<?= htmlspecialchars($question['question_id']) ?>">
                            <textarea name="reply" required></textarea><br><br>
                            <button type="submit">Reply</button>
                        </form>
                    <?php } else { ?>
                        <p><strong>Admin Reply:</strong> <?= htmlspecialchars($question['reply']) ?></p>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2>Replies Table</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Player Name</th>
                <th>Question ID</th>
                <th>Reply</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT * FROM replies ORDER BY reply_id");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?= htmlspecialchars($row['reply_id']) ?></td>
                <td><?= htmlspecialchars($row['player_name']) ?></td>
                <td><?= htmlspecialchars($row['question_id']) ?></td>
                <td><?= htmlspecialchars($row['reply']) ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <form action="welcome.php">
        <button type="submit">Go Back</button>
    </form>
</body>
</html>
