<?php
// Start session
session_start();

// Include database connection file
include('db.php');

// Check if the form is submitted
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Get the email and password from POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute a query to fetch the user data from the database
    $stmt = $conn->prepare("SELECT id, email, password, name FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if the email exists in the database
    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($userId, $dbEmail, $dbPassword, $userName);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $dbPassword)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_email'] = $dbEmail;
            $_SESSION['user_name'] = $userName;

            // Redirect to a dashboard or the home page
            header("Location: index.php"); // Change this to your actual dashboard or home page
            exit;
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid email or password. Please try again.'); window.location.href='login.php';</script>";
        }
    } else {
        // No user found with that email
        echo "<script>alert('No account found with that email.'); window.location.href='login.php';</script>";
    }

    // Close statement
    $stmt->close();
} else {
    // Form not submitted correctly
    echo "<script>alert('Please enter both email and password.'); window.location.href='login.php';</script>";
}

// Close the database connection
$conn->close();
?>
