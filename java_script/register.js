document.getElementById('sign-up-form').addEventListener('submit', function (e) {
  e.preventDefault(); // Prevent form submission

  // Clear previous error messages
  clearErrors();

  // Get form values
  const fname = document.getElementById('fname').value.trim();
  const lname = document.getElementById('lname').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const address = document.getElementById('address').value.trim();
  const country = document.getElementById('country').value.trim();
  const dob = document.getElementById('dob').value.trim();
  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const confirmPassword = document.getElementById('confirm-password').value.trim();

  let valid = true;

  // Validate first name
  if (!fname) {
      displayError('fname', 'First name is required.');
      valid = false;
  }

  // Validate last name
  if (!lname) {
      displayError('lname', 'Last name is required.');
      valid = false;
  }

  // Validate phone number
  const phoneDigits = phone.replace(/\D/g, ''); // Remove non-digit characters
  if (!phoneDigits || phoneDigits.length < 7) {
      displayError('phone', 'Phone number must be at least 7 digits.');
      valid = false;
  }

  // Validate address
  if (!address) {
      displayError('address', 'Address is required.');
      valid = false;
  }

  // Validate country
  if (!country) {
      displayError('country', 'Country is required.');
      valid = false;
  }

  // Validate date of birth
  if (!dob) {
      displayError('dob', 'Date of birth is required.');
      valid = false;
  }

  // Validate email
  if (!email) {
      displayError('email', 'Email is required.');
      valid = false;
  } else if (!validateEmail(email)) {
      displayError('email', 'Please enter a valid email address.');
      valid = false;
  }

  // Validate password
  if (!password) {
      displayError('password', 'Password is required.');
      valid = false;
  } else if (!validatePassword(password)) {
      displayError(
          'password',
          'Password must be at least 7 characters, include an uppercase letter, a lowercase letter, a digit, and a special character.'
      );
      valid = false;
    }
});