// auth.php - Handling User Registration and Login
<?php
require_once 'dbConfig.php'; // Database connection

// Register User
if (isset($_POST['registerBtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password
    $stmt = $pdo->prepare("INSERT INTO Users (Username, Email, Password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);
    header("Location: login.php");
}

// Login User
if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM Users WHERE Email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['Password'])) {
        session_start();
        $_SESSION['UserID'] = $user['UserID'];
        $_SESSION['Username'] = $user['Username'];
        header("Location: index.php"); // Redirect to homepage after successful login
    } else {
        echo "Invalid credentials!";
    }
}
?>
