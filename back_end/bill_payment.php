<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Payment Services</title>
    <link rel="stylesheet" href="/ChikaAmanna_WebTech_Final_Project/front_end/bill_payment.css">
    <script src="../front_end/bill_payment.js"></script>
</head>
<body>
    <div class="container">
        <h1>Bill Payment Services</h1>
        <div class="bill-payment-section">
            <form id="billPaymentForm" action="../ChikaAmanna_WebTech_Final_Project/php_files/paid_bill.php" method="POST">
                <div class="form-group">
                    <label for="billCategory">Bill Category:</label>
                    <select id="billCategory" name="billCategory" required>
                        <option value="">Select Bill Type</option>
                        <option value="electricity">Electricity Bill</option>
                        <option value="water">Water Bill</option>
                        <option value="internet">Internet Service</option>
                        <option value="mobile">Mobile Recharge</option>
                        <option value="insurance">Insurance Premium</option>
                        <option value="subscription">Subscription Services</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="serviceProvider">Service Provider:</label>
                    <select id="serviceProvider" name="serviceProvider" required>
                        <option value="">Select Provider</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="customerID">Customer/Account Number:</label>
                    <input type="text" id="customerID" name="customerID" placeholder="Enter your account number" required>
                </div>

                <div class="form-group">
                    <label for="billAmount">Bill Amount:</label>
                    <input type="number" id="billAmount" name="billAmount" min="10" max="100000" placeholder="Enter bill amount" required>
                </div>

                <div class="form-group">
                    <label for="paymentMethod">Payment Method:</label>
                    <select id="paymentMethod" name="paymentMethod" required>
                        <option value="debit">Debit Card</option>
                        <option value="credit">Credit Card</option>
                        <option value="bank">Bank Transfer</option>
                        <option value="wallet">Digital Wallet</option>
                    </select>
                </div>

                <div class="payment-details" id="paymentDetailsSection">
                    <!-- Dynamic payment details will be inserted here -->
                </div>

                <button type="submit" class="btn-pay">Pay Bill</button>
            </form>

            <div id="billPaymentResult" class="bill-payment-result"></div>
        </div>
    </div>

    <script src="../ChikaAmanna_WebTech_Final_Project/java_script/bill_payment.js"></script>
</body>
</html>