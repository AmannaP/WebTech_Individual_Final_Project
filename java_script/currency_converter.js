// API Key and URL
const API_KEY = "d25173d616d7ffbc9874afc10c21997a";
const API_URL = "https://api.currencylayer.com/live?access_key=d25173d616d7ffbc9874afc10c21997a";

// Function to fetch and populate currency dropdowns
function populateCurrencyDropdowns() {    
  const baseCurrencySelect = document.getElementById("base-currency");
  const toCurrencySelect = document.getElementById("to-currency");

  if (!baseCurrencySelect || !toCurrencySelect) {
    console.error("Currency dropdown elements not found in the DOM.");
    return;
  }
  // Clear dropdowns before populating
  baseCurrencySelect.innerHTML = "";
  toCurrencySelect.innerHTML = "";

  fetch(API_URL)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      if (!data.success) {
        throw new Error(`API error! Type: ${data.error.type}, Info: ${data.error.info}`);
      }

      const currencies = Object.keys(data.quotes);
      currencies.forEach((currency) => {
        const optionFrom = document.createElement("option");
        optionFrom.value = currency.substring(3); // Remove "USD" prefix
        optionFrom.textContent = currency.substring(3);
        baseCurrencySelect.appendChild(optionFrom);

        const optionTo = document.createElement("option");
        optionTo.value = currency.substring(3); // Remove "USD" prefix
        optionTo.textContent = currency.substring(3);
        toCurrencySelect.appendChild(optionTo);
      });
    })
    .catch((error) => {
      console.error("Error populating dropdowns:", error);
      alert("Error populating dropdowns: " + error.message);
    });
}

// Function to perform currency conversion
function convertCurrency() {
  const baseCurrency = document.getElementById("base-currency").value;
  const toCurrency = document.getElementById("to-currency").value;
  const amount = parseFloat(document.getElementById("amount").value);

  if (isNaN(amount) || amount <= 0) {
    alert("Please enter a valid amount.");
    return;
  }

  fetch(API_URL)
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      if (!data.success) {
        throw new Error(`API error! Type: ${data.error.type}, Info: ${data.error.info}`);
      }

      const baseRate = data.quotes[`USD${baseCurrency}`];
      const toRate = data.quotes[`USD${toCurrency}`];

      if (!baseRate || !toRate) {
        throw new Error("Conversion rate not found.");
      }

      const convertedAmount = (amount / baseRate) * toRate;
      document.getElementById("result").textContent = `${amount} ${baseCurrency} = ${convertedAmount.toFixed(2)} ${toCurrency}`;
    })
    .catch((error) => {
      console.error("Error performing conversion:", error);
      alert("Error performing conversion: " + error.message);
    });
}

// Event listeners
document.addEventListener("DOMContentLoaded", function () {
  populateCurrencyDropdowns();

  document.getElementById("convertButton").addEventListener("click", function (event) {
    event.preventDefault();
    convertCurrency();
  });
});