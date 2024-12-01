<?php
session_start();
require_once 'core/dbConfig.php';

if (isset($_POST['loginBtn'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query to validate user
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $stmt->execute([$username, md5($password)]);
  $user = $stmt->fetch();

  if ($user) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    header('Location: index.php');
    exit();
  } else {
    $error = "Invalid username or password.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-sm bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-4">Login</h1>

    <form method="POST" action="">
      <div class="mb-4">
        <label for="username" class="block text-gray-700 text-sm font-medium mb-2">Username</label>
        <input type="text" name="username"
          class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          required>
      </div>

      <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
        <input type="password" name="password"
          class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
          required>
      </div>

      <?php if (isset($error)): ?>
        <p class="text-red-500 text-sm mb-4 "><?php echo $error; ?></p>
      <?php endif; ?>

      <button type="submit" name="loginBtn"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Login</button>
    </form>

    <p class="text-sm text-gray-600 text-center mt-4">
      Don't have an account?
      <a href="register.php" class="text-blue-500 hover:underline">Register</a>
    </p>
  </div>
</body>

</html>