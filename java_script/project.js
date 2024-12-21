// Updated Authentication Script for Backend Integration

class AuthManager {
    // Async methods for backend communication
    async registerUser(firstName, lastName, email, password) {
        try {
            const response = await fetch('register.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    firstName,
                    lastName,
                    email,
                    password
                })
            });

            const result = await response.json();

            if (!response.ok) {
                // Handle validation errors
                throw new Error(
                    result.errors 
                    ? result.errors.join(', ') 
                    : result.message || 'Registration failed'
                );
            }

            return result;
        } catch (error) {
            throw error;
        }
    }

    async loginUser(email, password) {
        try {
            const response = await fetch('login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, password })
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(
                    result.errors 
                    ? result.errors.join(', ') 
                    : result.message || 'Login failed'
                );
            }

            return result.user;
        } catch (error) {
            throw error;
        }
    }

    async logout() {
        try {
            const response = await fetch('logout.php', {
                method: 'POST'
            });

            const result = await response.json();

            if (!response.ok) {
                throw new Error(result.message || 'Logout failed');
            }

            // Redirect to login page or home page
            window.location.href = 'login.html';
        } catch (error) {
            console.error('Logout error:', error);
            throw error;
        }
    }
}

// Initialize authentication manager
const authManager = new AuthManager();

// Event listeners for forms
document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('login-form');
    const signUpForm = document.getElementById('sign-up-form');

    // Login form handler
    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const user = await authManager.loginUser(email, password);
                alert(`Welcome back, ${user.firstName}!`);
                // Redirect to dashboard or home page
                window.location.href = 'dashboard.html';
            } catch (error) {
                alert(error.message);
            }
        });
    }

    // Sign up form handler
    if (signUpForm) {
        signUpForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const firstName = document.getElementById('fname').value;
            const lastName = document.getElementById('lname').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            try {
                const result = await authManager.registerUser(firstName, lastName, email, password);
                alert(`Registration successful! Welcome, ${firstName}`);
                // Redirect to login page
                window.location.href = 'login.html';
            } catch (error) {
                alert(error.message);
            }
        });
    }
});