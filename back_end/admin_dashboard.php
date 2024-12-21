<?php 
// require '../includes/header.php';
require_once '../php_files/conn.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$userQuery = "SELECT FirstName, LastName, Email, Address, Country, PhoneNumber, DateOfBirth FROM users WHERE user_id = ?";
$stmt = $conn->prepare($userQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$userResult = $stmt->get_result();
$userData = $userResult->fetch_assoc();
$stmt->close();

if (!$userData) {
    echo "Error fetching user data.";
    exit();
}

// Fetch user balances
$balancesQuery = "SELECT currency, balance FROM user_balances WHERE user_id = ?";
$stmt = $conn->prepare($balancesQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$balancesResult = $stmt->get_result();
$userBalances = [];
while ($row = $balancesResult->fetch_assoc()) {
    $userBalances[$row['currency']] = $row['balance'];
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Exchange Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100" x-data='{
    currentTab: "profile",
    <!-- user: <?php echo json_encode($userData); ?>, -->
    <!-- userBalances: <?php echo json_encode($userBalances); ?>, -->
    logout() {
        window.location.href = "/ChikaAmanna_WebTech_Final_Project/php_files/logout.php";
    }
}'>
    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <div class="w-64 bg-blue-800 text-white p-6">
            <div class="mb-8">
                <h1 class="text-2xl font-bold">Welcome, Admin <?php echo htmlspecialchars($userData['FirstName']); ?>!</h1>
            </div>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'profile'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'profile'}">
                            User Statistics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'exchange'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'exchange'}">
                            Currency Exchange Statistics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'sell-currency'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'sell-currency'}">
                            Sell Currency
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'transactions'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'transactions'}">
                            Transactions Statistics
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="/ChikaAmanna_WebTech_Final_Project/php_files/logout.php" @click.prevent="logout" 
                           class="block py-2 px-4 hover:bg-blue-700">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6" x-show="currentTab === 'profile'">
            <h2 class="text-2xl font-bold mb-4">User Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Monthly Logins</h3>
                    <canvas id="monthlyLoginsChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Monthly Registrations</h3>
                    <canvas id="monthlyRegistrationsChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Daily Logins</h3>
                    <canvas id="dailyLoginsChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Daily Registrations</h3>
                    <canvas id="dailyRegistrationsChart"></canvas>
                </div>
            </div>
        </div>

        <div class="flex-1 p-6" x-show="currentTab === 'exchange'">
            <h2 class="text-2xl font-bold mb-4">Currency Exchange Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Exchange Rates</h3>
                    <canvas id="exchangeRatesChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Monthly Exchanges</h3>
                    <canvas id="monthlyExchangesChart"></canvas>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-2">Daily Exchanges</h3>
                    <canvas id="dailyExchangesChart"></canvas>
                </div>
            </div>
        </div>


        <div class="flex-1 p-6" x-show="currentTab === 'sell-currency'">
            <h2 class="text-2xl font-bold mb-4">Sell Currency</h2>

            <div class="bg-white p-4 rounded-lg shadow mt-6">
                <h3 class="text-lg font-semibold mb-2">Sell Currency</h3>
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="currency-table-body">
                        <!-- Data will be loaded dynamically -->
                    </tbody>
                </table>

                <button  id="add-row-btn" class="mt-4 bg-blue-800 text-white py-2 px-4 rounded-lg">Add New Row</button>
            </div>
        </div>
        <div class="flex-1 p-6" x-show="currentTab === 'transactions'">
            <h2 class="text-2xl font-bold mb-4">Total Transaction Statistics</h2>

        <div class="bg-white p-4 rounded-lg shadow mt-6">
            <h3 class="text-lg font-semibold mb-2">Total Transaction Statistics</h3>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left">Currency</th>
                        <th class="text-left">Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>USD</td>
                        <td>1000</td>
                    </tr>
                    <tr>
                        <td>EUR</td>
                        <td>2000</td>
                    </tr>
                    <tr>
                        <td>GBP</td>
                        <td>1500</td>
                    </tr>
                    <tr>
                        <td>JPY</td>
                        <td>3000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- log out tab -->
        <div class="flex-1 p-6" x-show="currentTab === 'logout'">
            <h2 class="text-2xl font-bold mb-4">Logout</h2>
            <div class="bg-white p-4 rounded-lg shadow mt-6">
                <h3 class="text-lg font-semibold mb-2">Logout</h3>
                <p>Are you sure you want to logout?</p>
                <button @click="logout" class="mt-4 bg-blue-800 text-white py-2 px-4 rounded-lg" onclick="window.location.href='/ChikaAmanna_WebTech_Final_Project/php_files/logout.php'">
                    Logout
                </button>
            </div>


        
    </div>

    <script src="../java_script/admin_dashboard.js"></script>
    <script src="../java_script/currency_transaction.js"></script>
</body>
</html>