<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minto Forex Bureau</title>
  <link rel="stylesheet" href="/ChikaAmanna_WebTech_Final_Project/front_end/dashboard.css">
</head>
<body>
  <header>
    <div class="logo" >
        <img src="/ChikaAmanna_WebTech_Final_Project/images/logo.png" alt="Minto Forex Bureau Logo">
        <h1>Minto Forex Bureau</h1>
      </div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="../ChikaAmanna_WebTech_Final_Project/back_end/about.php">About</a></li>
        <li><a href="../ChikaAmanna_WebTech_Final_Project/back_end/services.php">Services</a></li>
        <li><a href="../ChikaAmanna_WebTech_Final_Project/back_end/contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="container">
      <section class="hero">
        <h1>Welcome to Minto Forex Bureau</h1>
        <p class="head">Experience seamless currency exchange and international money transfers.</p>
        <a href="../ChikaAmanna_WebTech_Final_Project/back_end/register.php" class="cta-button">Get Started</a>
      </section>
    </div>
    

    <section class="features">
      <h2>Features</h2>
      <div class="feature-list">
        <div class="feature">
          <h3>Competitive Rates</h3>
          <p>We offer the best exchange rates in the market.</p>
        </div>
        <div class="feature">
          <h3>Secure Transactions</h3>
          <p>Your money is safe with our reliable and secure platform.</p>
        </div>
        <div class="feature">
          <h3>Convenient Locations</h3>
          <p>Visit one of our branches located across the city.</p>
        </div>
      </div>
    </section>
    <div><

    <section class="testimonials">
      <h2>What Our Customers Say</h2>
      <div class="testimonial-list">
        <div class="testimonial">
          <p>"Excellent service and competitive rates. I highly recommend Minto Forex Bureau."</p>
          <p class="author">- Emily Money</p>
        </div>
        <div class="testimonial">
          <p>"I've been using Minto Forex Bureau for all my international money transfers. Reliable and efficient."</p>
          <p class="author">- Jacob Bolton</p>
        </div>
      </div>
    </section>

    <section class="contact">
      <h2>Contact Us</h2>
      <form>
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="name" required>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Submit</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2024 Forex Bureau. All rights reserved.</p>
  </footer>

</body>
</html>