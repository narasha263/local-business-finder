<?php
session_start();
if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <body>
        
<form method="POST">
Admin Login
  <input name="username" placeholder="Username">
  <input name="password" type="password" placeholder="Password">
  <button type="submit">Login</button>
</form></h2>
<?php if(isset($error)) echo $error; ?>
<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    display: flex;
    height: 100vh;
     background: url('../bg.jpg') no-repeat center center fixed;
     background-size: cover;
     color: white;
    align-items: center;
    justify-content: center;
     text-align: center;
    
}

.container {
    background-color: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 300px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Input Fields */
input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

input[type="password"] {
    font-family: 'Arial', sans-serif;
}

input:focus {
    border-color: #1abc9c;
    outline: none;
}

/* Button Styles */
button {
    width: 100%;
    padding: 12px;
    background-color: #1abc9c;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
    background-color: #16a085;
}

/* Error Message */
.error {
    color: red;
    font-size: 14px;
    text-align: center;
    margin-top: 10px;
}

    </style>