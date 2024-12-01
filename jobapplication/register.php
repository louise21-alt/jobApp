<?php
require_once 'core/dbConfig.php';

if (isset($_POST['registerBtn'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // Check if the username is already taken
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute([$username]);

  if ($stmt->rowCount() > 0) {
    $error = "Username already exists.";
  } else {
    // Insert new user
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $password]);
    header('Location: login.php');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="w-full max-w-sm bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold text-center text-blue-600 mb-4">Register</h1>

    <?php if (isset($error)): ?>
      <p class="text-red-500 text-sm mb-4 text-center"><?php echo $error; ?></p>
    <?php endif; ?>

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

      <button type="submit" name="registerBtn"
        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Register</button>
    </form>

    <p class="text-sm text-gray-600 text-center mt-4">
      Already have an account?
      <a href="login.php" class="text-blue-500 hover:underline">Login</a>
    </p>
  </div>
</body>

</html>