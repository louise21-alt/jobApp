// logActivity.php - Log user activities
function logActivity($pdo, $userID, $action, $description) {
    $sql = "INSERT INTO ActivityLogs (UserID, Action, Description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$userID, $action, $description]);
}