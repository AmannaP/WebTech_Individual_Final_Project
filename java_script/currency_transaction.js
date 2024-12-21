document.addEventListener('DOMContentLoaded', function () {
    const tableBody = document.querySelector('#currency-table-body');
    const addRowBtn = document.querySelector('#add-row-btn');

    function fetchData() {
        try {
            fetch('../php_files/currency_transaction.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'action=fetch'
            })
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = ''; // Clear existing rows
                data.forEach(row => {
                    tableBody.innerHTML += `
                        <tr>
                            <td>${row.FirstName}</td>
                            <td>${row.LastName}</td>
                            <td>${row.country}</td>
                            <td>${row.currency}</td>
                            <td>${row.amount}</td>
                            <td>
                                <button class="edit-btn bg-yellow-500 text-white py-1 px-2 rounded" data-id="${row.currency_transaction_id}">Edit</button>
                                <button class="delete-btn bg-red-500 text-white py-1 px-2 rounded" data-id="${row.currency_transaction_id}">Delete</button>
                            </td>
                        </tr>`;
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        } catch (error) {
            console.error('Unexpected error in fetchData:', error);
        }
    }

    function deleteRow(id) {
        fetch('../php_files/currency_transaction.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=delete&currency_transaction_id=${id}`
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                fetchData(); // Refresh the table
            } else {
                console.error('Delete failed:', result.message);
                alert(result.message);
            }
        })
        .catch(error => {
            console.error('Error deleting row:', error);
        });
    }
    
    // Similar changes for addRow and edit functionality
    function addRow() {
        try {
            const firstName = prompt('Enter First Name:');
            const lastName = prompt('Enter Last Name:');
            const country = prompt('Enter Country:');
            const currency = prompt('Enter Currency:');
            const amount = prompt('Enter Amount:');

            if (!firstName || !lastName || !country || !currency || !amount) {
                alert('All fields are required!');
                return;
            }

            fetch('../php_files/currency_transaction.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=add&FirstName=${encodeURIComponent(firstName)}&LastName=${encodeURIComponent(lastName)}&country=${encodeURIComponent(country)}&currency=${encodeURIComponent(currency)}&amount=${encodeURIComponent(amount)}`
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    fetchData();
                } else {
                    console.error('Add failed:', result.message);
                }
            })
            .catch(error => {
                console.error('Error adding row:', error);
            });
        } catch (error) {
            console.error('Unexpected error in addRow:', error);
        }
    }

    tableBody.addEventListener('click', function (e) {
        try {
            if (e.target.classList.contains('delete-btn')) {
                const id = e.target.getAttribute('data-id');
                deleteRow(id);
            }

            if (e.target.classList.contains('edit-btn')) {
                const id = e.target.getAttribute('data-id');
                const firstName = prompt('Edit First Name:');
                const lastName = prompt('Edit Last Name:');
                const country = prompt('Edit Country:');
                const currency = prompt('Edit Currency:');
                const amount = prompt('Edit Amount:');

                if (!firstName || !lastName || !country || !currency || !amount) {
                    alert('All fields are required!');
                    return;
                }

                fetch('../php_files/currency_transaction.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `action=edit&currency_transaction_id=${id}&FirstName=${encodeURIComponent(firstName)}&LastName=${encodeURIComponent(lastName)}&country=${encodeURIComponent(country)}&currency=${encodeURIComponent(currency)}&amount=${encodeURIComponent(amount)}`
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        fetchData();
                    } else {
                        console.error('Edit failed:', result.message);
                    }
                })
                .catch(error => {
                    console.error('Error editing row:', error);
                });
            }
        } catch (error) {
            console.error('Unexpected error in event listener:', error);
        }
    });

    addRowBtn.addEventListener('click', addRow);

    // Initial fetch
    fetchData();
});