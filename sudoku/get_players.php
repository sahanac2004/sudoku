
<?php
header('Content-Type: application/json');

$pdo = new PDO('mysql:host=mysql;dbname=database1', 'sahana', 'sahanac@2004');

$stmt = $pdo->query('SELECT * FROM player1');
$players = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($players);
?>
<?php
function hash_password($password) {
    $options = [
        'cost' => 12,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

function verify_password($password, $hash) {
    return password_verify($password, $hash);
}
?>
