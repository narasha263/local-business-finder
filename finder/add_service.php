<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Manage Services</title>
  <style>
    /* Reset some default styles */
body, h1, h2, p, ul {
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background-color: #f4f4f4;
  display: flex;
  height: 100vh;
}

/* Sidebar styles */
.sidebar {
  width: 220px;
  background-color: #2c3e50;
  color: #fff;
  padding: 20px;
  height: 100vh;
  box-shadow: 2px 0 5px rgba(0,0,0,0.1);
  position: fixed;
}

.sidebar h2 {
  font-size: 24px;
  margin-bottom: 20px;
  border-bottom: 1px solid #444;
  padding-bottom: 10px;
}

.sidebar ul {
  list-style: none;
}

.sidebar ul li {
  margin: 15px 0;
}

.sidebar ul li a {
  color: #ecf0f1;
  text-decoration: none;
  font-weight: bold;
  padding: 8px 12px;
  display: block;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.sidebar ul li a:hover,
.sidebar ul li a.active {
  background-color: #1abc9c;
}

/* Main content styles */
.main-content {
  margin-left: 240px;
  padding: 30px;
  width: calc(100% - 240px);
  overflow-y: auto;
}

.header {
  background-color: #fff;
  padding: 25px;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

/* Form styling */
form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

input[type="text"],
input[type="file"],
textarea {
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 16px;
  width: 100%;
  max-width: 500px;
}

textarea {
  resize: vertical;
  min-height: 100px;
}

button {
  width: fit-content;
  padding: 12px 24px;
  font-size: 16px;
  background-color: #1abc9c;
  color: white;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background 0.3s;
}

button:hover {
  background-color: #16a085;
}

/* Feedback message styles */
.success {
  color: green;
  margin-top: 15px;
}

.error {
  color: red;
  margin-top: 15px;
}

</style>
</head>
<body>

<div class="dashboard">
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="dashboard.php" class="active">Dashboard</a></li>
      <li><a href="add_service.php">Add Service</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
<form method="POST" enctype="multipart/form-data">
  <input name="business_name" placeholder="Business Name" required><br>
  <textarea name="description" placeholder="Description"></textarea><br>
  <input name="category" placeholder="Category"><br>
  <input name="location" placeholder="Location"><br>
  <input type="file" name="image"><br>
  <button type="submit">Add</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = mysqli_real_escape_string($conn, $_POST['business_name']);
  $desc = mysqli_real_escape_string($conn, $_POST['description']);
  $cat = mysqli_real_escape_string($conn, $_POST['category']);
  $loc = mysqli_real_escape_string($conn, $_POST['location']);
  
  // Handle image upload
  $imgPath = '';
  if (!empty($_FILES['image']['name'])) {
    $uploadDir = '../uploads/'; // adjust if needed
    $target = $uploadDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $imgPath = 'uploads/' . basename($_FILES['image']['name']); // saved path in DB
    } else {
      echo "<p style='color:red;'>❌ Failed to upload image.</p>";
    }
  }

  $query = "INSERT INTO services (business_name, description, category, location, image)
            VALUES ('$name', '$desc', '$cat', '$loc', '$imgPath')";

  if (mysqli_query($conn, $query)) {
    echo "<p style='color:green;'>✅ Service added!</p>";
  } else {
    echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
  }
}
?>
