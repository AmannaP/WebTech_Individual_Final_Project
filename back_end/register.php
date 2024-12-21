<!-- verified -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Minto Forex Bureau - Sign Up</title>
    <link
      rel="stylesheet"
      href="/ChikaAmanna_WebTech_Final_Project/front_end/login.css" />
  </head>
  <body>
    <div class="container">
      <h1>Sign Up</h1>
      <form id="sign-up-form" action="../php_files/register.php" method="POST">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="FirstName" required />

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="LastName" required />

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="PhoneNumber" required />

        <label for="address">Address:</label>
        <input type="text" id="address" name="Address" required />

        <label for="country">Country:</label>
        <input type="text" id="country" name="Country" required />

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="DateOfBirth" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="Email" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <label for="confirm-password">Confirm Password:</label>
        <input
          type="password"
          id="confirm-password"
          name="confirmPassword"
          required
        />

        <button type="submit" name="submit">Sign Up</button>
      </form>
      <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
    <script src="../java_script/register.js"></script>
  </body>
</html>
