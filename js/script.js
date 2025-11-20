document.addEventListener('DOMContentLoaded', function() {

  // Form validation for Login
  const loginForm = document.getElementById('loginForm');
  const loginEmail = document.getElementById('loginEmail');
  const loginPassword = document.getElementById('loginPassword');

  loginForm.addEventListener('submit', function(event) {
    event.preventDefault();

    // Email validation for login
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(loginEmail.value)) {
      alert('Please enter a valid email address');
      return;
    }

    // Password validation for login 
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
   if (!passwordPattern.test(loginPassword.value)) {
      alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number');
      return;
    }

    alert('Login Successful');
    
    const loginModal = bootstrap.Modal.getInstance(document.getElementById('loginModal'));
    loginModal.hide();

  });

  // Form validation for Registration
  const registerForm = document.getElementById('registerForm');
  const nameField = document.getElementById('name');
  const registerEmail = document.getElementById('registerEmail');
  const registerPassword = document.getElementById('registerPassword');
  const confirmPassword = document.getElementById('confirmPassword');

  registerForm.addEventListener('submit', function(event) {
    event.preventDefault();

    // Name validation (only letters and spaces)
    const namePattern = /^[A-Za-z\s]+$/;
    if (!namePattern.test(nameField.value)) {
      alert('Name can only contain letters and spaces');
      return;
    }

    // Email validation for registration
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(registerEmail.value)) {
      alert('Please enter a valid email address');
      return;
    }

    // Password validation for registration
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (!passwordPattern.test(registerPassword.value)) {
      alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number');
      return;
    }

    // Confirm password validation
    if (registerPassword.value !== confirmPassword.value) {
      alert('Passwords do not match');
      return;
    }

    alert('Registration Successful');
    // Close modal after successful registration
    const registerModal = bootstrap.Modal.getInstance(document.getElementById('registerModal'));
    registerModal.hide();
  });

});