<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php
// Check if ID is set
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php?error=invalid_request");
    exit;
}

$service_id = $_GET['id'];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $business_name = mysqli_real_escape_string($conn, $_POST['business_name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
        $target_dir = "uploads/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . time() . "_" . $image_name;

        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    } else {
        // If no new image uploaded, retain old one
        $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM services WHERE id = $service_id"));
        $target_file = $row['image'];
    }

    // Update query
    $update_query = "UPDATE services SET 
        business_name='$business_name', 
        category='$category', 
        location='$location', 
        image='$target_file' 
        WHERE id=$service_id";

    if (mysqli_query($conn, $update_query)) {
        header("Location: dashboard.php?msg=updated");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Fetch current data
$result = mysqli_query($conn, "SELECT * FROM services WHERE id = $service_id");
if (mysqli_num_rows($result) == 0) {
    echo "Service not found.";
    exit;
}
$service = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Service</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="add_service.php">Add Service</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Edit Service</h1>
        </div>

        <form method="post" enctype="multipart/form-data" class="form-container">
            <label>Business Name:</label>
            <input type="text" name="business_name" value="<?= htmlspecialchars($service['business_name']) ?>" required>

            <label>Category:</label>
            <input type="text" name="category" value="<?= htmlspecialchars($service['category']) ?>" required>

            <label>Location:</label>
            <input type="text" name="location" value="<?= htmlspecialchars($service['location']) ?>" required>

            <label>Current Image:</label><br>
            <img src="<?= $service['image'] ?>" style="width: 100px; height: 100px; object-fit: cover;"><br><br>

            <label>Change Image (optional):</label>
            <input type="file" name="image">

            <button type="submit" class="action-btn save">Save Changes</button>
        </form>
    </div>
</div>

<footer class="footer">
    <p>© <?= date('Y') ?> Local Business Finder Admin Panel</p>
</footer>
</body>
</html>
