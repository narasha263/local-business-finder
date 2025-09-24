<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Business Finder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #1abc9c, #16a085);
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .container {
            margin-top: 100px;
        }

        h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }

        p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        a.button {
            background-color: white;
            color: #16a085;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
        }

        a.button:hover {
            background-color: #ecf0f1;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: rgba(0,0,0,0.2);
            padding: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to Business Finder</h1>
    <p>Your go-to platform to discover and review amazing local services.</p>
    <a class="button" href="login.php">Get Started</a>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Business Finder. All rights reserved.
</footer>

</body>
</html>
