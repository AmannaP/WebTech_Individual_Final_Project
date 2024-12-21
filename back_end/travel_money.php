<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minto Forex Bureau - Travel Money</title>
  <link rel="stylesheet" href="../ChikaAmanna_WebTech_Final_Project/front_end/travel_money.css">
</head>
<body>
  <header>
    <div class="logo">Minto Forex Bureau</div>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="services.php">Services</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="travel-money-container">
      <h1>Travel Money Listings</h1>
      <button class="add-button">Add New Listing</button>

      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Country</th>
            <th>Currency</th>
            <th>Buy/Sell</th>
            <th>Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="listings-table-body">
          <!-- Listings will be populated here -->
        </tbody>
      </table>

      <div class="modal hidden">
        <div class="modal-content">
          <h2>Are you sure you want to delete this listing?</h2>
          <button class="delete-button">Delete</button>
          <button class="cancel-button">Cancel</button>
        </div>
      </div>

      <form id="edit-listing-form" class="hidden">
        <h2>Edit Listing</h2>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="edit-name" name="name" required>
        </div>

        <div class="form-group">
          <label for="amount">Amount:</label>
          <input type="number" id="edit-amount" name="amount" required>
        </div>
        <div class="form-group">
          <label for="currency">Currency:</label>
          <input type="text" id="edit-currency" name="currency" required>
        </div>
        <div class="form-group">
          <label for="country">Country:</label>
          <input type="text" id="edit-country" name="country" required>
        </div>
        <div class="form-group">
          <label for="buyOrSell">Buy/Sell:</label>
          <select id="edit-buyOrSell" name="buyOrSell" required>
            <option value="Buy">Buy</option>
            <option value="Sell">Sell</option>
          </select>
        </div>
        <button type="submit">Update Listing</button>
        <button type="button" class="cancel-button">Cancel</button>
      </form>

      <div class="error-message hidden"></div>
      
      <div class="success-message hidden"></div>

      <div class="loading-message hidden">Loading...</div>

      <div class="no-listings-message hidden">No listings found</div>





      
      <!-- <form id="add-listing-form" class="hidden">
        <h2>Add New Listing</h2>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        
        <div class="form-group">
          <label for="amount">Amount:</label>
          <input type="number" id="amount" name="amount" required>
        </div>
        <div class="form-group">
          <label for="currency">Currency:</label>
          <input type="text" id="currency" name="currency" required>
        </div>
        <div class="form-group">
          <label for="country">Country:</label>
          <input type="text" id="country" name="country" required>
        </div>
        <div class="form-group">
          <label for="buyOrSell">Buy/Sell:</label>
          <select id="buyOrSell" name="buyOrSell" required>
            <option value="Buy">Buy</option>
            <option value="Sell">Sell</option>
          </select>
        </div>
        <button type="submit">Submit Listing</button>
        <button type="button" class="cancel-button">Cancel</button>
      </form>
       -->
     
    </div>
  </main>

  <footer>
    <p>&copy; 2024 Forex Bureau. All rights reserved.</p>
  </footer>

  <script src="/ChikaAmanna_WebTech_Final_Project/java_script/travel_money.js"></script>
</body>
</html>