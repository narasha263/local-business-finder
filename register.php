<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>
     body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: lightblue;
            height: 100vh;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
.register-container {
    max-width: 400px;
    margin: 80px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.register-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.register-container input[type="text"],
.register-container input[type="email"],
.register-container input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.register-container button {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    border: none;
    color: white;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.register-container button:hover {
    background-color: #45a049;
}

.register-container .login-link {
    text-align: center;
    margin-top: 15px;
}

.register-container .login-link a {
    color: #4CAF50;
    text-decoration: none;
}
</style>

<div class="register-container">
    <h2>Create Account</h2>
    <form action="process-register.php" method="POST">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Register</button>
    </form>
    <div class="login-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>


 <footer>
        <p>&copy; 2024 Local Business Finder. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
</footer>
    </body>
    </html>
