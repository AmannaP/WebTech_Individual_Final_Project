<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forex Bureau - Log In</title>
  <link rel="stylesheet" href="../front_end/login.css">
</head>
<body>
  <div class="container">
    <h1>Log In</h1>
    <form id="login-form" action="../php_files/login.php" method="POST">

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Log In</button>
    </form>
    <p>Don't have an account? <a href="register.php">Sign up</a></p>
  </div>
  
</body>
</html>