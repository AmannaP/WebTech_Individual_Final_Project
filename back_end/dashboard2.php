<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Currency Exchange Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100" x-data="dashboardApp">
    <div class="min-h-screen flex">
        <!-- Sidebar Navigation -->
        <div class="w-64 bg-blue-800 text-white p-6">
            <div class="mb-8">
                <h1 class="text-2xl font-bold">Welcome ! </h1> <!-- , <span x-text="user.firstName"></span>!</h1> -->
            </div>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'profile'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'profile'}">
                            My Profile
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'exchange'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'exchange'}">
                            Exchange Currency
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'Money transfer'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'Money transfer'}">
                            Money transfer
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'International Transfer'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'International Transfer'}">
                            International Transfer
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'payment of bills'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'payment of bills'}">
                            payment of bills
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="#" @click.prevent="currentTab = 'Travel money'" 
                           class="block py-2 px-4 hover:bg-blue-700"
                           :class="{'bg-blue-700': currentTab === 'Travel money'}">
                            Travel money
                        </a>
                    </li>

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
                            Transactions
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" @click.prevent="logout" 
                           class="block py-2 px-4 hover:bg-blue-700">
                            Logout
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-10">
            <!-- Wallet Section (Now in Main Content) -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-bold mb-6">My Wallet</h2>
                <div class="grid grid-cols-3 gap-4">
                    <template x-for="(balance, currency) in user_balances" :key="currency">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold" x-text="currency"></h3>
                            <p class="text-2xl font-bold" x-text="balance"></p>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Profile Tab -->
            <div x-show="currentTab === 'profile'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">User Profile</h2>
                <div class="grid grid-cols-2 gap-4">
                    <body class="bg-gray-100">
                        <div x-data="{ currentTab: 'profile', user: <?php echo json_encode($userData); ?>  }">
                            <!-- Profile Tab -->
                            <div x-show="currentTab === 'profile'" class="bg-white shadow-md rounded-lg p-6">
                                <h2 class="text-2xl font-bold mb-6">User Profile, user: <?php echo json_encode($userData); ?>"</h2>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 font-bold mb-2">First Name</label>
                                        <p class="w-full px-3 py-2 border rounded-md bg-gray-100" x-text="user.FirstName"></p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-bold mb-2">Last Name</label>
                                        <p class="w-full px-3 py-2 border rounded-md bg-gray-100" x-text="user.LastName"></p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-bold mb-2">Email</label>
                                        <p class="w-full px-3 py-2 border rounded-md bg-gray-100" x-text="user.Email"></p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-bold mb-2">Address</label>
                                        <p class="w-full px-3 py-2 border rounded-md bg-gray-100" x-text="user.Address"></p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-bold mb-2">Country</label>
                                        <p class="w-full px-3 py-2 border rounded-md bg-gray-100" x-text="user.Country"></p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-bold mb-2">Phone Number</label>
                                        <p class="w-full px-3 py-2 border rounded-md bg-gray-100" x-text="user.PhoneNumber"></p>
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-bold mb-2">Date of Birth</label>
                                        <p class="w-full px-3 py-2 border rounded-md bg-gray-100" x-text="user.DateOfBirth"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                </div>
            </div>


           <!-- Exchange Currency Tab -->
           <div x-show="currentTab === 'exchange'" class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Currency Exchange</h2>

            <form id="exchange-form">
                <div class="grid grid-cols-2 gap-4">
                    <!-- From Currency -->
                    <div>
                        <label for="base-currency" class="block text-gray-700 font-bold mb-2">From Currency</label>
                        <select id="base-currency" name="base-currency" x-model="exchange.fromCurrency" class="w-full px-3 py-2 border rounded-md" required>
                            <!-- Options dynamically populated -->
                        </select>
                    </div>

                    <!-- To Currency -->
                    <div>
                        <label for="to-currency" class="block text-gray-700 font-bold mb-2">To Currency</label>
                        <select id="to-currency" name="to-currency" x-model="exchange.toCurrency" class="w-full px-3 py-2 border rounded-md" required>
                            <!-- Options dynamically populated -->
                        </select>
                    </div>
                </div>
                <!-- Amount Input -->
                <div>
                    <label for="amount" class="block text-gray-700 font-bold mb-2">Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="Enter amount" class="w-full px-3 py-2 border rounded-md" required>
                </div>

                <div id="result-container" class="hidden">
                    <h2 id="result-heading">Conversion Result</h2>
                    <p id="result-amount"></p>
                 </div>



                    <!-- Submit Button -->
                    <div class="text-center mt-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-6 py-2 rounded-md shadow-md">
                            Convert
                        </button>
                    </div>
                </form>


            </div>

            <!-- Money transfer Tab -->
            <div x-show="currentTab === 'Money transfer'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Money transfer</h2>
                <form @submit.prevent="performMoneyTransfer">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Recipient Email</label>
                            <input type="email" x-model="exchange.recipientEmail" 
                                   class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Recipient Phone Number</label>
                            <input type="text" x-model="exchange.recipientPhoneNumber" 
                                   class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Recipient Name</label>
                            <input type="text" x-model="exchange.recipientName" 
                                   class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Recipient Country</label>
                            <input type="text" x-model="exchange.recipientCountry" 
                                   class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Recipient Bank</label>
                            <input type="text" x-model="exchange.recipientBank" 
                                   class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Amount</label>
                            <input type="number" x-model="exchange.amount" 
                                   class="w-full px-3 py-2 border rounded-md">
                        </div>
                        <div class="self-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='../php_files/money.php'">
                                Money transfer
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- International transfer Tab -->
            <div x-show="currentTab === 'International Transfer'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">International Transfer </h2>
                <form @submit.prevent="performInternationalTransfer">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="self-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='money_transfer.php'">
                                International transfer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
             
            <!-- payment of bills Tab -->
            <div x-show="currentTab === 'payment of bills'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">payment of bills</h2>
                <form @submit.prevent="performPaymentOfBills">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="self-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='bill_payment.php'">
                                payment of bills
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Travel money Tab -->
            <div x-show="currentTab === 'Travel money'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Travel money</h2>     
                </form>
                <div class="mt-6">
                    <h3 class="text-xl font-bold mb-4">Users Selling Currency</h3>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">First Name</th>
                                <th class="py-2 px-4 border-b">Last Name</th>
                                <th class="py-2 px-4 border-b">Country</th>
                                <th class="py-2 px-4 border-b">Currency</th>
                                <th class="py-2 px-4 border-b">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="user in usersSellingCurrency" :key="user.id">
                                <tr>
                                    <td class="py-2 px-4 border-b" x-text="user.firstName"></td>
                                    <td class="py-2 px-4 border-b" x-text="user.lastName"></td>
                                    <td class="py-2 px-4 border-b" x-text="user.country"></td>
                                    <td class="py-2 px-4 border-b" x-text="user.currency"></td>
                                    <td class="py-2 px-4 border-b" x-text="user.amount"></td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sell Currency Tab -->
            <div x-show="currentTab === 'sell-currency'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Sell Currency</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Currency to Sell</label>
                        <select x-model="sell.currency" class="w-full px-3 py-2 border rounded-md">
                            <template x-for="currency in userBalances" :key="currency">
                                <option x-text="currency" :value="currency"></option>
                            </template>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold mb-2">Amount to Sell</label>
                        <input type="number" x-model="sell.amount" 
                               class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div class="self-end">
                        <button @click="listCurrencyForSale" 
                                class="bg-green-500 text-white px-4 py-2 rounded-md">
                            List for Sale
                        </button>
                    </div>
                </div>
            </div>

            <!-- Transactions Tab -->
            <div x-show="currentTab === 'transactions'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Transaction History</h2>
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 text-left">Date</th>
                            <th class="p-2 text-left">Type</th>
                            <th class="p-2 text-left">Amount</th>
                            <th class="p-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="transaction in transactions" :key="transaction.id">
                            <tr>
                                <td x-text="transaction.date" class="p-2"></td>
                                <td x-text="transaction.type" class="p-2"></td>
                                <td x-text="transaction.amount" class="p-2"></td>
                                <td x-text="transaction.status" class="p-2"></td>
                            </tr>back_end/dashboard.php
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Log out tab -->
            <div x-show="currentTab === 'logout'" class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-6">Log out</h2>
                <form @submit.prevent="logout">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="self-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md" onclick="window.location.href='/ChikaAmanna_WebTech_Final_Project/php_files/logout.php'">
                                Log out
                            </button>
                        </div>
                    </div>
                </form>
            </div>
                
        </div>
    </div>
    <!-- <script src="profile.js" defer></script> -->
    <script src="../java_script/dashboard.js" ></script>
    <script src="../java_script/currency_converter.js" ></script>
    <script src="../java_script/bill_payment.js"></script>
</body>
</html>