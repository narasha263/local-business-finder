<?php
include 'auth.php';  // Optional if you want to protect the route
include 'db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // First, fetch the image path
    $result = mysqli_query($conn, "SELECT image FROM services WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    $imagePath = $row['image'];

    // Delete the service from DB
    $delete = mysqli_query($conn, "DELETE FROM services WHERE id = $id");

    if ($delete) {
        // Optional: Delete image file from folder (avoid deleting default.jpg)
        if (!empty($imagePath) && file_exists($imagePath) && $imagePath !== 'uploads/default.jpg') {
            unlink($imagePath);
        }

        // Redirect back to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Failed to delete service.";
    }
} else {
    echo "No service ID provided.";
}
?>
