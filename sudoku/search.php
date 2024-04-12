<?php
// Session start
session_start();

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
$pdo = new PDO($dsn, $user, $pass, $opt);
// Initialize variables
$playerDetails = null;
$isPremiumSubscriber = null;
$playerExists = true; // Added variable to track player existence 
    if (isset($_GET['player_name']) && !empty($_GET['player_name'])) {
        $player_name = $_GET['player_name'];
    
        // Query to retrieve player details
        $stmt = $pdo->prepare("SELECT * FROM player1 WHERE player_name LIKE ? LIMIT 1");
        $stmt->bindValue(1, '%' . $_GET['player_name'] . '%');
        $stmt->execute();
        $playerDetails = $stmt->fetch();
    
        // Set playerExists flag based on query result
        $playerExists = $playerDetails !== false; // Check for valid player data
    
        if (!$playerExists) {
            $errorMessage = "Player not found.";
        } 
    else {
   
        // Get subscription information
        $stmt = $pdo->prepare("SELECT subc_type, amount, game_type, end_date FROM subscription WHERE player_name = ?");
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
        foreach ($subscriptionData as $key => $subscription) {
            if ($subscription['subc_type'] == 'premium') {
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
  <!--  <style>
     
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045); /* Gradient background */
            color: #fff;
            overflow: hidden;
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
            margin-top: 50px;
        }

        table {
            margin: 50px auto;
            border-collapse: collapse;
            width: 80%;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        th, td {color: black;
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;

        }

        th {
            background-color: #833ab4; /* Purple background for table headers */
            color: #fff;
        }

        .error {
            color:#ddd;
            text-align: center;
            margin-top: 50px;
        }

        .premium {
            color: #4CAF50; /* Green color for premium status */
            font-weight: bold;
        }

        .not-premium {
            color: #f44336; /* Red color for non-premium status */
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
            border-radius: 25px; /* Rounded input field */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            width: 300px;
            max-width: 100%;
            margin-right: 10px;
        }

        #searchForm button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 25px; /* Rounded button shape */
            background-color: #fd1d1d; /* Red button color */
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        #searchForm button[type="submit"]:hover {
            background-color: #fcb045; /* Lighter red on hover */
        } 
    </style> -->
    <style> body { 
        background: linear-gradient(135deg, #00b4db, #0083b0, #306998);
     animation: gradientAnimation 15s ease infinite;
      margin: 0;
       padding: 0;
        color: #fff; 
        font-family: 'Arial', sans-serif;
         overflow: hidden; }
          @keyframes gradientAnimation {
             0% { background-position: 0% 50%; } 
             50% { background-position: 100% 50%; }
              100% { background-position: 0% 50%; } } 

h1 { text-align: center;
     margin-top: 50px; }

table { margin: 50px auto;
     border-collapse: collapse; 
     width: 80%; max-width: 800px;
     background-color: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
       border-radius: 10px; }

th, td { color: #333;
     padding: 12px 15px; 
    text-align: left;
     border-bottom: 1px solid #ddd; }

th { background-color:#306998;
     color: #333; }

.error { color: #ddd; 
    text-align: center; 
    margin-top: 50px; }

.premium { color: #4CAF50;
     font-weight: bold; }

.not-premium { color: #f44336;
     font-weight: bold; }

#searchForm { display: flex;
     justify-content: center;
      align-items: center; 
      margin-top: 50px; }

#searchForm input[type="text"] { padding: 10px;
     border: none;
      border-radius: 25px;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-size: 16px;
         width: 300px;
          max-width: 100%; 
          margin-right: 10px; }

          button, #searchForm button[type="submit"] { padding: 10px 20px; 
    border: none; 
    border-radius: 25px;
     background-color:#306998;
      color: #fff;
      font-size: 16px;
       cursor: pointer; }

button, #searchForm button[type="submit"]:hover { 
    background-color:rgba(255, 255, 255, 0.8);
    color:#333 } </style>
</head>
<body class="just">
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
                <th>Subscription Type</th>
                <th>Amount</th>
                <th>Date Time</th>
                <th>End Date</th>
                <th>Payment Mode</th>
                <th>Premium Subscriber</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= htmlspecialchars($playerDetails['player_id']) ?></td>
                <td><?= htmlspecialchars($playerDetails['player_name']) ?></td>
                <td><?= htmlspecialchars($playerDetails['email']) ?></td>

                <?php foreach ($subscriptionData as $key => $subscription) { ?>
                    <td><?= htmlspecialchars($subscription['subc_type']) ?></td>
                    <td><?= htmlspecialchars($subscription['amount']) ?></td>

                    <?php
                    
                        // Find corresponding payment information
                        foreach ($paymentData as $payment) {
                            error_reporting(E_ERROR | E_PARSE);
                            if ($payment['player_name'] == $subscription['player_name']) { ?>
                                <td><?= htmlspecialchars($payment['date_time']) ?></td>
                                <td><?= htmlspecialchars($subscription['end_date']) ?></td>
                                <td><?= htmlspecialchars($payment['pay_mode']) ?></td>

                            <?php } else { ?>
                                <!-- Display empty cells if payment info not found -->
                                <td></td>
                                <td></td>
                                <td></td>

                            <?php }
                        }
                    ?>

                    <!-- Display Premium Subscriber status -->
                    <td class="<?= isset($isPremiumSubscriber) && $isPremiumSubscriber ? 'premium' : 'free' ?>">
                        <?= isset($isPremiumSubscriber) && $isPremiumSubscriber ? 'Yes' : 'No' ?>
                    </td>

                </tr>

            <?php } ?>

            <?php if (!$playerExists): ?>
            <tr>
                <td colspan="9" style="text-align: center; font-style: italic;">
                    Player '<?php echo htmlspecialchars($_GET['player_name']); ?>' not present in the database.
                </td>
            </tr>
             <?php endif; ?>.
        </tbody>
    </table>

<?php } ?>
<form class="button" action="welcome.php">
        <button type="submit">Go Back</button>
    </form>

</body>
</html>