<?php
// Session start
session_start();

// Database connection details
$host = 'localhost';
$db   = 'database1';
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

$pdo = new PDO($dsn, $user, $pass, $opt);

// Initialize variables
$playerDetails = null;
$isPremiumSubscriber = null;

// Handle search form submission
if (!empty($_GET['player_name'])) {
    // Query to retrieve player details
    $stmt = $pdo->prepare("SELECT * FROM player1 WHERE player_name LIKE ? LIMIT 1");
    $stmt->bindValue(1, '%'.$_GET['player_name'].'%');
    $stmt->execute();
    $playerDetails = $stmt->fetch();
    
    // If no match found, show error message
    if (!$playerDetails) {
        $errorMessage = "Player not found.";
    } else {
        // Get leaderboard information
       

        // Get subscription information
        $stmt = $pdo->prepare("SELECT subc_type, amount, game_type FROM subscription WHERE player_name = ?");
        $stmt->bindParam(1, $_GET['player_name']);
        $stmt->execute();
        $subscriptionData = $stmt->fetchAll();

        // Get payment information
        $stmt = $pdo->prepare("SELECT pay_mode, date_time FROM payment WHERE player_name = ?");
        $stmt->bindParam(1, $_GET['player_name']);
        $stmt->execute();
        $paymentData = $stmt->fetchAll();

        // Check if player is a premium subscriber
        $isPremiumSubscriber = false;
        foreach ($subscriptionData as $subscription) {
            if ($subscription['subc_type'] == 'Premium') {
                $isPremiumSubscriber = true;
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Player Details</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		table {
			margin: 50px auto;
			border-collapse: collapse;
			width: 80%;
			max-width: 800px;
			background-color: white;
			box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
		}
		th, td {
			padding: 12px 15px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
		.error {
			color: red;
			text-align: center;
			margin-top: 50px;
		}
		.premium {
			color: green;
			font-weight: bold;
		}
		.not-premium {
			color: red;
			font-weight: bold;
		}
    #searchForm {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 50px;
    }

    #searchForm input[type="text"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      font-size: 16px;
      width: 300px;
      max-width: 100%;
      margin-right: 10px;
    }

    #searchForm button[type="submit"] {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      cursor: pointer;
    }
    
</style>
</head>
<body>
<form action="" method="get" id="searchForm">
    <input type="text" placeholder="Search Player..." name="player_name" />
    <button type="submit">Search</button>
</form>

<h1>Player Details</h1>
<?php if (isset($errorMessage)) { ?>
    <p class="error"><?= $errorMessage ?></p>
<?php } else if (isset($playerDetails)) { ?>
    <table>
        <thead>
            <tr>
                <th>Player ID</th>
                <th>Player Name</th>
                <th>Email</th>
                <th>Premium Subscriber</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= htmlspecialchars($playerDetails['player_id']) ?></td>
                <td><?= htmlspecialchars($playerDetails['player_name']) ?></td>
                <td><?= htmlspecialchars($playerDetails['email']) ?></td>
                <td class="<?= isset($isPremiumSubscriber) && $isPremiumSubscriber ? 'premium' : 'not-premium' ?>">
                    <?= isset($isPremiumSubscriber) && $isPremiumSubscriber ? 'Yes' : 'No' ?>
                </td>
            </tr>
        </tbody>
    </table>
<?php } ?>
</body>
</html>

