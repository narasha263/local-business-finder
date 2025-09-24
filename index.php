<?php
$conn = new mysqli("localhost", "root", "", "finder", '3307');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['register_service'])) {
    $business_name = $conn->real_escape_string($_POST['business_name']);
    $category = $conn->real_escape_string($_POST['category']);
    $location = $conn->real_escape_string($_POST['location']);
    $description = $conn->real_escape_string($_POST['description']);

    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO services (business_name, category, location, description, image, status) 
            VALUES ('$business_name', '$category', '$location', '$description', '$target', 'Pending')";

    if ($conn->query($sql)) {
        echo "<script>alert('Service registered successfully!');</script>";
    } else {
        echo "<script>alert('Failed to register service.');</script>";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit_review'])) {
    $business_id = intval($_POST['business_id']);
    $rating = intval($_POST['rating']);
    $review_text = $conn->real_escape_string($_POST['review_text']);
    $created_at = date("Y-m-d H:i:s");

    $conn->query("INSERT INTO reviews (business_id, rating, review_text, created_at) 
                  VALUES ($business_id, $rating, '$review_text', '$created_at')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services with Reviews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header, footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
        }

        nav {
            background-color: #34495e;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #fff;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #1abc9c;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
            padding: 30px 10px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h3 {
            margin: 0 0 10px;
        }

        .card-body p {
            margin: 6px 0;
            font-size: 14px;
        }

        .rating {
            font-weight: bold;
            color: #ff9800;
        }

        .review-form {
            margin-top: 15px;
            padding-top: 10px;
            border-top: 1px solid #eee;
        }

        .review-form textarea,
        .review-form select,
        .review-form button {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            font-size: 14px;
        }

        .review-form button {
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        .review-form button:hover {
            background-color: #555;
        }

        .reviews {
            background: #f9f9f9;
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
        }

        .reviews h4 {
            margin-bottom: 5px;
        }

        .review {
            margin-bottom: 10px;
            border-bottom: 1px dotted #ccc;
            padding-bottom: 8px;
        }

        .review small {
            color: #888;
        }
    </style>
</head>
<body>

<header>
    <h1>Welcome to Our Business Directory</h1>
    <p>Find services and leave your review!</p>
</header>

<nav>
    <a href="#services">Services</a>
    <a href="about.php">About Us</a>
    <a href="contact.php">Contact</a>
    <a href="login.php">Login</a>
    <a href="admin/login.php">Admin Panel</a>
</nav>

<div class="container">
    <div class="services-grid">
        <?php
        $sql = "SELECT * FROM services";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $business_id = $row['id'];
                echo '<div class="card">';
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Image">';
                echo '<div class="card-body">';
                echo '<h3>' . htmlspecialchars($row['business_name']) . '</h3>';
                echo '<p><strong>Category:</strong> ' . htmlspecialchars($row['category']) . '</p>';
                echo '<p><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>';
                echo '<p><strong>Status:</strong> ' . htmlspecialchars($row['status']) . '</p>';
                echo '<p>' . htmlspecialchars($row['description']) . '</p>';

                $review_sql = "SELECT * FROM reviews WHERE business_id = $business_id ORDER BY created_at DESC";
                $review_result = $conn->query($review_sql);

                if ($review_result && $review_result->num_rows > 0) {
                    echo '<div class="reviews">';
                    echo '<h4>Reviews:</h4>';
                    while ($review = $review_result->fetch_assoc()) {
                        echo '<div class="review">';
                        echo '<strong>Rating:</strong> ' . htmlspecialchars($review['rating']) . '/5<br>';
                        echo htmlspecialchars($review['review_text']) . '<br>';
                        echo '<small>' . $review['created_at'] . '</small>';
                        echo '</div>';
                    }
                    echo '</div>';
                } else {
                    echo '<p><em>No reviews yet.</em></p>';
                }

                echo '<div class="review-form">';
                echo '<form method="POST">';
                echo '<input type="hidden" name="business_id" value="' . $business_id . '">';
                echo '<label for="rating">Your Rating:</label>';
                echo '<select name="rating" required>
                        <option value="">Select</option>
                        <option value="5">5 - Excellent</option>
                        <option value="4">4 - Good</option>
                        <option value="3">3 - Fair</option>
                        <option value="2">2 - Poor</option>
                        <option value="1">1 - Bad</option>
                      </select>';
                echo '<label for="review_text">Your Review:</label>';
                echo '<textarea name="review_text" rows="3" required placeholder="Write your feedback..."></textarea>';
                echo '<button type="submit" name="submit_review">Submit Review</button>';
                echo '</form>';
                echo '</div>'; // review-form

                echo '</div>'; // card-body
                echo '</div>'; // card
            }
        } else {
            echo "<p>No services found.</p>";
        }
        ?>
    </div>

    <h2>Register Your Business Service</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Business Name:</label><br>
        <input type="text" name="business_name" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category" required><br><br>

        <label>Location:</label><br>
        <input type="text" name="location" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="3" required></textarea><br><br>

        <label>Upload Image:</label><br>
        <input type="file" name="image" accept="image/*" required><br><br>

        <button type="submit" name="register_service">Register Service</button>
    </form>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Our Business Directory. All rights reserved.
</footer>

</body>
</html>
