document.getElementById('login-form').addEventListener('submit', async (event) => {
    event.preventDefault(); // Prevents default form submission

    // Get form data
    const username = document.getElementById('emailPhone').value;
    const password = document.getElementById('password').value;

    try {
        // Send a POST request with form data to the server
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({username, password }),
        });

        // Parse the JSON response
        const result = await response.json();

        // Handle the response
        const messageElement = document.getElementById('login-message');
        if (response.ok && result.success) {
            messageElement.textContent = 'Login successful!';
            messageElement.style.color = 'green';
            // Redirect to a different page or load additional content as needed
        } else {
            messageElement.textContent = result.message || 'Login failed. Please check your credentials.';
            messageElement.style.color = 'red';
        }
    } catch (error) {
        console.error('Error:', error);
        document.getElementById('login-message').textContent = 'An error occurred. Please try again later.';
    }
});
