<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>International Money Transfer</title>
    <link rel="stylesheet" href="../ChikaAmanna_WebTech_Final_Project/front_end/money_transfer.css">
</head>
<body>
    <div class="container">
        <h1>International Money Transfer</h1>
        <div class="transfer-section">
            <form id="transferForm">
                <div class="form-group">
                    <label for="senderCountry">Sender's Country:</label>
                    <select id="senderCountry" required>
                        <option value="USA">United States</option>
                        <option value="UK">United Kingdom</option>
                        <option value="INDIA">India</option>
                        <option value="AUSTRALIA">Australia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="receiverCountry">Receiver's Country:</label>
                    <select id="receiverCountry" required>
                        <option value="INDIA">India</option>
                        <option value="UK">United Kingdom</option>
                        <option value="USA">United States</option>
                        <option value="AUSTRALIA">Australia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="amount">Transfer Amount:</label>
                    <input type="number" id="amount" min="10" max="10000" required>
                </div>

                <div class="form-group">
                    <label for="transferType">Transfer Type:</label>
                    <select id="transferType">
                        <option value="standard">Standard Transfer</option>
                        <option value="express">Express Transfer</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="receiverName">Receiver's Name:</label>
                    <input type="text" id="receiverName" required>
                </div>

                <div class="form-group">
                    <label for="receiverAccount">Receiver's Account Number:</label>
                    <input type="text" id="receiverAccount" required>
                </div>

                <button type="submit" class="btn-transfer">Send</button>
            </form>

            <div id="transferResult" class="transfer-result"></div>
        </div>
    </div>

    <script src="../ChikaAmanna_WebTech_Final_Project/java_script/money_transfer.js"></script>
</body>
</html>