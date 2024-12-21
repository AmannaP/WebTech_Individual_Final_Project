document.addEventListener('DOMContentLoaded', function () {
    const billCategory = document.getElementById('billCategory');
    const serviceProvider = document.getElementById('serviceProvider');

    if (billCategory && serviceProvider) {
        // Event listener for category change
        billCategory.addEventListener('change', function () {
            const category = this.value;
            serviceProvider.innerHTML = '<option value="">Select Provider</option>'; // Clear previous options

            if (category) {
                // Fetch providers for the selected category
                fetch(`../php_files/service_provider.php?category=${encodeURIComponent(category)}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.error) {
                            console.error('Error fetching providers:', data.error);
                        } else {
                            // Populate service providers dynamically
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.provider;
                                option.textContent = item.provider;
                                serviceProvider.appendChild(option);
                            });
                        }
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });
            }
        });
    } else {
        console.error('billCategory or serviceProvider element not found');
    }
});