function dashboardApp() {
    return {
        sidebarOpen: true,
        currentTab: 'profile',
        user: {},
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
        async fetchDashboardData() {
            try {
                // Fetch data from get_user_dashboard_data.php
                const response = await fetch('../php_files/get_user_dashboard_data.php');
                const data = await response.json();

                // Populate the dashboard with fetched data
                this.user = data.userData;
                this.userBalances = data.userBalances;
                this.transactions = data.transactions;
            } catch (error) {
                console.error('Error fetching dashboard data:', error);
            }
        },
        init() {
            // Call fetchDashboardData when the component initializes
            this.fetchDashboardData();
        }
    };
}

document.addEventListener('alpine:init', () => {
    Alpine.data('dashboardApp', dashboardApp);
});