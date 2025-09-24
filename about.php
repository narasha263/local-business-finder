<?php
// Connection setup for the database (you can adjust accordingly if you have a common file for DB connection)
$conn = new mysqli("localhost", "root", "", "finder" ,'3307');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About KK Business Finder</title>
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

        #about-section h2 {
            color: #2c3e50;
        }

        .faq {
            margin-top: 30px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .faq h3 {
            color: #2c3e50;
        }

        .faq p {
            margin: 10px 0;
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

    <!-- ABOUT SECTION -->
    <div id="about-section">
        <h2>About KK Business Finder</h2>
        <p>Welcome to KK Business Finder, your go-to platform for discovering local businesses in your community. Our mission is to support local entrepreneurs by connecting them with customers who are eager to explore what their neighborhood has to offer.</p>
        <p>Founded in 2024, KK Business Finder was created to address the challenge of finding reliable local services and products. We believe in the power of community and strive to foster growth and success for local businesses.</p>

        <h3>Our Features</h3>
        <ul>
            <li>Easy-to-use search functionality to find businesses by category or location.</li>
            <li>Detailed business listings with contact information, addresses, and user reviews.</li>
            <li>A user-friendly interface designed for both customers and business owners.</li>
        </ul>

        <h3>Meet the Team</h3>
        <p>KK Business Finder is brought to you by a dedicated team of professionals who are passionate about supporting local businesses.</p>
        <p>If you have any questions or suggestions, feel free to reach out to us at <a href="mailto:info@kkbusinessfinder.com">info@kkbusinessfinder.com</a>.</p>
    </div>

    <!-- FAQ SECTION -->
    <div class="faq">
        <h3>Frequently Asked Questions</h3>
        <p><strong>Q: How do I add my business to the directory?</strong></p>
        <p>A: You can add your business by signing up and following the instructions to create a business listing.</p>

        <p><strong>Q: Is the service free to use?</strong></p>
        <p>A: Yes, it's free to search and browse businesses. Business owners may have options for premium listings.</p>
    </div>

</div>

<!-- FOOTER -->
<footer>
    &copy; <?php echo date("Y"); ?> KK Business Finder. All Rights Reserved.
</footer>

</body>
</html>
