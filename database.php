<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Authentication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <input type="text" id="signup-username" placeholder="Username">
        <input type="email" id="signup-email" placeholder="Email">
        <input type="password" id="signup-password" placeholder="Password">
        <button onclick="signUp()">Sign Up</button>
        <div class="message" id="signup-message"></div>
    </div>

    <div class="container">
        <h1>Login</h1>
        <input type="email" id="login-email" placeholder="Email">
        <input type="password" id="login-password" placeholder="Password">
        <button onclick="login()">Login</button>
        <div class="message" id="login-message"></div>
    </div>

    <script>
        // Sign-up Function
        function signUp() {
            const username = document.getElementById('signup-username').value;
            const email = document.getElementById('signup-email').value;
            const password = document.getElementById('signup-password').value;

            fetch('http://localhost:3000/api/signup', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ username, email, password })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('signup-message').textContent = data.message;
            })
            .catch(error => {
                document.getElementById('signup-message').textContent = 'Error: ' + error.message;
            });
        }

        // Login Function
        function login() {
            const email = document.getElementById('login-email').value;
            const password = document.getElementById('login-password').value;

            fetch('http://localhost:3000/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email, password })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('login-message').textContent = data.message;
            })
            .catch(error => {
                document.getElementById('login-message').textContent = 'Error: ' + error.message;
            });
        }
    </script>
</body>
</html>
