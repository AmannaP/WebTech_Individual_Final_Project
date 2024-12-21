// Simulated user authentication
const currentUser = {
    username: null,
    isLoggedIn: false
};

// Sample user data (in a real app, this would come from a backend)
const users = [
    { username: 'user1', password: 'pass1' }
];

// Modify the notifications array to include the creator
let notifications = [
    { name: 'Emeka Nweke', country: 'Nigeria', currency: 'USD', buyOrSell: 'Buy', amount: 500, creator: 'user1' },
    { name: 'Sarah Lee', country: 'United States', currency: 'EUR', buyOrSell: 'Sell', amount: 300, creator: 'user1' },
    { name: 'Takeshi Tanaka', country: 'Japan', currency: 'JPY', buyOrSell: 'Buy', amount: 50000, creator: 'user1' },
    { name: 'Sophia Gonzalez', country: 'Spain', currency: 'GBP', buyOrSell: 'Sell', amount: 200, creator: 'user1' }
];

// Login modal HTML
function createLoginModal() {
    const modalHTML = `
        <div id="login-modal" class="modal">
            <div class="modal-content">
                <h2>Login</h2>
                <form id="login-form">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" required>
                    </div>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    `;
    
    const modalDiv = document.createElement('div');
    modalDiv.innerHTML = modalHTML;
    document.body.appendChild(modalDiv.firstElementChild);
}

// Get DOM elements
const addListingForm = document.getElementById('add-listing-form');
const addButton = document.querySelector('.add-button');
const cancelButton = document.querySelector('.cancel-button');
const listingsTableBody = document.getElementById('listings-table-body');

// Function to render the listings table
function renderListingsTable() {
    if (!currentUser.isLoggedIn) return;

    listingsTableBody.innerHTML = '';

    notifications.forEach((listing, index) => {
        // Only show actions for listings created by the current user
        const actionsHtml = listing.creator === currentUser.username 
            ? `
                <button class="edit-button" data-index="${index}">Edit</button>
                <button class="delete-button" data-index="${index}">Delete</button>
            `
            : 'N/A';

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${listing.name}</td>
            <td>${listing.country}</td>
            <td>${listing.currency}</td>
            <td>${listing.buyOrSell}</td>
            <td>${listing.amount.toLocaleString()}</td>
            <td>${actionsHtml}</td>
        `;
        listingsTableBody.appendChild(row);
    });

    // Add event listeners only for the user's own listings
    document.querySelectorAll('.edit-button').forEach(button => {
        button.addEventListener('click', handleEdit);
    });

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', handleDelete);
    });
}

// Login functionality
function initializeLogin() {
    createLoginModal();
    const loginModal = document.getElementById('login-modal');
    const loginForm = document.getElementById('login-form');
    const travelMoneyContainer = document.querySelector('.travel-money-container');

    // Initially hide the travel money container
    if (travelMoneyContainer) {
        travelMoneyContainer.style.display = 'none';
    }

    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;

        // Check credentials
        const user = users.find(u => u.username === username && u.password === password);
        
        if (user) {
            currentUser.username = username;
            currentUser.isLoggedIn = true;
            
            // Hide login modal
            loginModal.style.display = 'none';
            
            // Show travel money container
            if (travelMoneyContainer) {
                travelMoneyContainer.style.display = 'block';
            }
            
            // Render listings
            renderListingsTable();
        } else {
            alert('Invalid username or password');
        }
    });
}

// Show add listing form
addButton.addEventListener('click', () => {
    if (!currentUser.isLoggedIn) {
        alert('Please log in first');
        return;
    }
    addListingForm.classList.remove('hidden');
    addListingForm.dataset.editIndex = ''; // Clear any previous edit index
});

// Cancel adding/editing listing
cancelButton.addEventListener('click', () => {
    addListingForm.classList.add('hidden');
    addListingForm.reset();
});

// Handle form submission
addListingForm.addEventListener('submit', (event) => {
    event.preventDefault();

    if (!currentUser.isLoggedIn) {
        alert('Please log in first');
        return;
    }

    const name = document.getElementById('name').value;
    const amount = document.getElementById('amount').value;
    const currency = document.getElementById('currency').value;
    const country = document.getElementById('country').value;
    const buyOrSell = document.getElementById('buyOrSell').value;

    const editIndex = addListingForm.dataset.editIndex;

    if (editIndex !== '') {
        // Update existing listing (only if created by current user)
        if (notifications[editIndex].creator === currentUser.username) {
            notifications[editIndex] = {
                name,
                country,
                currency,
                buyOrSell,
                amount: parseFloat(amount),
                creator: currentUser.username
            };
        } else {
            alert('You can only edit your own listings');
            return;
        }
    } else {
        // Add new listing
        notifications.push({
            name,
            country,
            currency,
            buyOrSell,
            amount: parseFloat(amount),
            creator: currentUser.username
        });
    }

    // Render updated table
    renderListingsTable();

    // Reset and hide form
    addListingForm.reset();
    addListingForm.classList.add('hidden');
});

// Handle edit button click
function handleEdit(event) {
    if (!currentUser.isLoggedIn) {
        alert('Please log in first');
        return;
    }

    const index = event.target.dataset.index;
    const listing = notifications[index];

    // Ensure only the creator can edit
    if (listing.creator !== currentUser.username) {
        alert('You can only edit your own listings');
        return;
    }

    // Populate form with existing data
    document.getElementById('name').value = listing.name;
    document.getElementById('amount').value = listing.amount;
    document.getElementById('currency').value = listing.currency;
    document.getElementById('country').value = listing.country;
    document.getElementById('buyOrSell').value = listing.buyOrSell;

    // Show form and set edit index
    addListingForm.classList.remove('hidden');
    addListingForm.dataset.editIndex = index;
}

// Handle delete button click
function handleDelete(event) {
    if (!currentUser.isLoggedIn) {
        alert('Please log in first');
        return;
    }

    const index = event.target.dataset.index;
    const listing = notifications[index];

    // Ensure only the creator can delete
    if (listing.creator !== currentUser.username) {
        alert('You can only delete your own listings');
        return;
    }

    // Remove the entry from the notifications array
    notifications.splice(index, 1);

    // Render updated table
    renderListingsTable();
}

// Initialize login when the page loads
document.addEventListener('DOMContentLoaded', initializeLogin);