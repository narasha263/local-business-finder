<?php
// db connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finder"; // Change to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, "3307");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $business_id = $_POST['business_id']; // The business this review is for
    $rating = $_POST['rating']; // Rating value (1 to 5)
    $review_text = $_POST['review_text']; // The review text

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO reviews (business_id, rating, review_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $business_id, $rating, $review_text);
// Execute the statement
if ($stmt->execute()) {
    echo "<script type='text/javascript'>
            alert('Review submitted successfully!');
            window.location.href = 'index.php'; // Redirect to index.php
          </script>";
} else {
    echo "<script type='text/javascript'>
            alert('Error: " . $stmt->error . "');
            window.location.href = 'index.php'; // Redirect to index.php
          </script>";
}


    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
