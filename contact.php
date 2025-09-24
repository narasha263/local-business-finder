<?php
// Connection setup for the database (adjust if necessary)
$conn = new mysqli("localhost", "root", "", "finder", '3307');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message variable
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message_text = $_POST['message'];

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, message) VALUES ('$name', '$email', '$message_text')";
    
    if ($conn->query($sql) === TRUE) {
        $message = "Thank you for contacting us! We'll get back to you shortly.";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - KK Business Finder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        }

        header, footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        nav {
            background-color: #34495e;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #1abc9c;
            color: white;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }

        .contact-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .contact-form button {
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #16a085;
        }

        .message {
            color: green;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<header>
    <h1>KK Business Finder</h1>
    <p>Your go-to platform for discovering local businesses</p>
</header>

<!-- NAVIGATION BAR -->
<nav>
    <a href="index.php">Home</a>
    <a href="about.php">About Us</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Login</a>
    <a href="admin/">Admin Panel</a>
</nav>

<!-- MAIN CONTENT -->
<div class="container">
    <h2>Contact Us</h2>

    <?php if ($message != ""): ?>
        <p class="message"><?php echo $message; ?></p>
    <?php endif; ?>

    <div class="contact-form">
        <h3>Get in Touch</h3>
        <form method="POST" action="contact.php">
            <input type="text" name="name" placeholder="Your Name" required><br>
            <input type="email" name="email" placeholder="Your Email" required><br>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea><br>
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>

<!-- FOOTER -->
<footer>
    &copy; <?php echo date("Y"); ?> KK Business Finder. All Rights Reserved.
</footer>

</body>
</html>
