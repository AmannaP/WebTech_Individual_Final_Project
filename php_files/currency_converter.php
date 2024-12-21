<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Currency Converter</title>
  <link rel="stylesheet" href="../front_end/currency_converter.css">
</head>
<body>
  <div class="container">
    <h1>Currency Converter</h1>
    <form id="exchange-form">
      <label for="base-currency">From:</label>
      <select id="base-currency" name="base-currency" required>
        <!-- <option value="EUR">Euro (EUR)</option> -->
      </select>

      <label for="to-currency">To:</label>
      <select id="to-currency" name="to-currency" required>
        <!-- Populated dynamically via JavaScript -->
      </select>

      <label for="amount">Amount:</label>
      <input type="number" id="amount" name="amount" placeholder="Enter amount" required>

      <button type="submit">Convert</button>
    </form>

    <div id="exchange-rate-container" class="hidden">
      <p id="exchange-rate"></p>
    </div>

    <div id="result-container" class="hidden">
      <h2 id="result-heading">Conversion Result</h2>
      <p id="result-amount"></p>
    </div>
  </div>

  <script src="currency_converter.js"></script>
</body>
</html>
