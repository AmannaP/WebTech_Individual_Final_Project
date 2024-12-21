document.addEventListener('DOMContentLoaded', function() {
    const transferForm = document.getElementById('transferForm');
    const transferResult = document.getElementById('transferResult');

    // Comprehensive exchange rates (simulated and expanded)
    const exchangeRates = {
        // USA Transfers
        'USA_INDIA': 83.20,
        'INDIA_USA': 0.012,
        'USA_UK': 0.79,
        'UK_USA': 1.26,
        'USA_AUSTRALIA': 1.52,
        'AUSTRALIA_USA': 0.66,

        // India Transfers
        'INDIA_UK': 0.0097,
        'UK_INDIA': 103.50,
        'INDIA_AUSTRALIA': 0.018,
        'AUSTRALIA_INDIA': 55.30,

        // UK Transfers
        'UK_AUSTRALIA': 1.93,
        'AUSTRALIA_UK': 0.52,

        // Reversed routes for flexibility
        'INDIA_AUSTRALIA_ALT': 0.018,
        'AUSTRALIA_INDIA_ALT': 55.30,
        'INDIA_UK_ALT': 0.0097,
        'UK_INDIA_ALT': 103.50
    };

    // Transfer fees (simulated)
    const transferFees = {
        'standard': 5,
        'express': 15
    };

    transferForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const senderCountry = document.getElementById('senderCountry').value;
        const receiverCountry = document.getElementById('receiverCountry').value;
        const amount = parseFloat(document.getElementById('amount').value);
        const transferType = document.getElementById('transferType').value;
        const receiverName = document.getElementById('receiverName').value;
        const receiverAccount = document.getElementById('receiverAccount').value;

        // Validate countries are different
        if (senderCountry === receiverCountry) {
            alert('Sender and receiver countries must be different');
            return;
        }

        // Lookup exchange rate with multiple route checking
        const possibleRateKeys = [
            `${senderCountry}_${receiverCountry}`,
            `${receiverCountry}_${senderCountry}`,
            `${senderCountry}_${receiverCountry}_ALT`,
            `${receiverCountry}_${senderCountry}_ALT`
        ];

        let exchangeRate = null;
        for (let key of possibleRateKeys) {
            if (exchangeRates[key]) {
                exchangeRate = exchangeRates[key];
                break;
            }
        }

        if (!exchangeRate) {
            alert('Invalid transfer route. Please check supported countries.');
            return;
        }

        const fee = transferFees[transferType];
        const convertedAmount = amount * exchangeRate;
        const totalTransferAmount = convertedAmount - fee;

        // Simulate transfer processing
        const transactionId = generateTransactionId();
        const estimatedDelivery = calculateDeliveryTime(transferType);

        const resultHTML = `
            <h3>Transfer Confirmation</h3>
            <p><strong>Transaction ID:</strong> ${transactionId}</p>
            <p><strong>Sender Country:</strong> ${senderCountry}</p>
            <p><strong>Receiver Country:</strong> ${receiverCountry}</p>
            <p><strong>Receiver Name:</strong> ${receiverName}</p>
            <p><strong>Transfer Amount:</strong> ${amount.toFixed(2)} ${senderCountry} Currency</p>
            <p><strong>Exchange Rate:</strong> 1 = ${exchangeRate.toFixed(2)}</p>
            <p><strong>Converted Amount:</strong> ${convertedAmount.toFixed(2)} ${receiverCountry} Currency</p>
            <p><strong>Transfer Fee:</strong> ${fee} ${senderCountry} Currency</p>
            <p><strong>Net Transfer Amount:</strong> ${totalTransferAmount.toFixed(2)} ${receiverCountry} Currency</p>
            <p><strong>Estimated Delivery:</strong> ${estimatedDelivery}</p>
        `;

        transferResult.innerHTML = resultHTML;
    });

    function generateTransactionId() {
        return 'TX-' + Math.random().toString(36).substr(2, 9).toUpperCase();
    }

    function calculateDeliveryTime(transferType) {
        const today = new Date();
        const deliveryDate = new Date(today);

        if (transferType === 'standard') {
            deliveryDate.setDate(today.getDate() + 3);  // 3 days for standard
        } else {
            deliveryDate.setDate(today.getDate() + 1);  // 1 day for express
        }

        return deliveryDate.toDateString();
    }
});