// viewLogs.php - Show activity logs
$sql = "SELECT * FROM ActivityLogs ORDER BY CreatedAt DESC";
$stmt = $pdo->query($sql);
$logs = $stmt->fetchAll();

foreach ($logs as $log) {
    echo "{$log['Action']} by User {$log['UserID']} on {$log['CreatedAt']}: {$log['Description']}<br>";
}
