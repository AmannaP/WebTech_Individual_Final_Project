document.addEventListener('alpine:init', () => {
    Alpine.data('dashboardApp', () => ({
        sidebarOpen: true,
        currentTab: 'profile',
        user: {
            firstName: '',
            lastName: '',
            email: '',
            address: '',
            country: '',
            phoneNumber: '',
            dateOfBirth: ''
        },
        userBalances: {},
        transactions: [],
        availableCurrencies: ['USD', 'EUR', 'GBP', 'JPY', 'CAD', 'AUD', 'CHF'],
        exchange: {
            fromCurrency: 'USD',
            toCurrency: 'EUR',
            amount: 0
        },
        sell: {
            currency: 'USD',
            amount: 0,
            price: 0
        },
        usersSellingCurrency: [],
        toggleSidebar() {
            this.sidebarOpen = !this.sidebarOpen;
        },
        performExchange() {
            console.log('Performing exchange:', this.exchange);
            alert('Exchange initiated!');
        },
        async fetchUserData() {
            try {
                const response = await fetch('../php/get_user_dashboard_data.php');
                if (!response.ok) throw new Error("Failed to fetch data");
                const data = await response.json();

                if (data.userData) {
                    this.user = {
                        firstName: data.userData.FirstName,
                        lastName: data.userData.LastName,
                        email: data.userData.Email,
                        address: data.userData.Address,
                        country: data.userData.Country,
                        phoneNumber: data.userData.PhoneNumber,
                        dateOfBirth: data.userData.DateOfBirth
                    };
                    this.userBalances = data.userBalances;
                    this.transactions = data.transactions;
                } else {
                    console.error("User data not found");
                }
            } catch (error) {
                console.error("Error:", error);
            }
        },
        init() {
            this.fetchUserData();
        }
    }));
});