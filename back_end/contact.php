<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forex Bureau - Contact</title>
  <link rel="stylesheet" href="../ChikaAmanna_WebTech_Final_Project/front_end/headerStyles.css">
</head>
<body>
  <header>
    <div class="logo" >
        <img src="../ChikaAmanna_WebTech_Final_Project/images/logo.png" alt="Minto Forex Bureau Logo">
        <h1>Minto Forex Bureau</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container">
      <section class="contact">
        <!-- creating a container -->
        <div class="contact-form">
          <h3>Get in Touch</h3>
          <form>
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname" required>

            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <button type="submit">Send Message</button>
          </form>
        </div>
    </section>
    </div>

    <section class="contact">
      <h1>Contact Us</h1>
        <div class="contact-info">
          <h3>Forex Bureau</h3>
          <p>123 Main Street, Anytown USA</p>
          <p>Phone: (123) 456-7890</p>
          <p>Email: info@forexbureau.com</p>
          <p>Monday - Friday: 9am - 6pm</p>
          <p>Saturday: 10am - 4pm</p>
          <p>Closed on Sundays</p>
        </div>
      </section>

  </main>

  <footer>
    <p>&copy; 2024 Forex Bureau. All rights reserved.</p>
  </footer>

  <!-- <script src="script.js"></script> -->
</body>
</html>