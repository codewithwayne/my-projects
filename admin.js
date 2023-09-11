document.getElementById('login-form').addEventListener('submit', function(event) {
  event.preventDefault();

  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;

  // Replace the following condition with server-side authentication logic.
  if (username === 'admin' && password === 'admin123') {
    document.getElementById('login-status').textContent = 'Login successful!';
  } else {
    document.getElementById('login-status').textContent = 'Invalid username or password.';
  }
});
