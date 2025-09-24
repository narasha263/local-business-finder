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

        /* Modal styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        /* Form styles */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
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

        .forgot-password {
            text-align: center;
            margin: 10px 0;
        }

        .forgot-password a {
            color: #0066cc;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
        }

        p a {
            color: #0066cc;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (max-width: 600px) {
            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <!-- Login Modal -->
        <div class="modal-content">
            <h2>Login</h2>
            <form id="login-form" action="process-login.php" method="POST">
                <input type="email" id="login-email" name="email" placeholder="Email" required>
                <input type="password" id="login-password" name="password" placeholder="Password" required>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

    <!-- Register Modal (hidden by default) -->
    <div id="registerModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeModal('register')">&times;</span>
            <h2>Register</h2>
            <form id="register-form" action="process-register.php" method="POST">
                <input type="text" id="register-name" name="name" placeholder="Full Name" required>
                <input type="email" id="register-email" name="email" placeholder="Email" required>
                <input type="password" id="register-password" name="password" placeholder="Password" required>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Local Business Finder. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>
</body>
</html>
