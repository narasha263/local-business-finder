<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New User</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="index.php">Dashboard</a></li>
      <li><a href="add_service.php">Add Service</a></li>
      <li><a href="manage_users.php" class="active">Manage Users</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>

  <div class="main-content">
    <h1>Add New User</h1>

    <?php
    if ($_POST) {
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Basic validation
        if (empty($name) || empty($email)) {
            echo "<p class='error'>Please fill in all fields.</p>";
        } else {
            // Insert user into database
            $query = "INSERT INTO users (name, email) VALUES ('$name', '$email')";
            if (mysqli_query($conn, $query)) {
                echo "<p class='success'>User added successfully!</p>";
            } else {
                echo "<p class='error'>Error adding user: " . mysqli_error($conn) . "</p>";
            }
        }
    }
    ?>

    <form method="POST">
      <label for="name">Username:</label>
      <input type="text" name="name" id="name" placeholder="Enter username" required>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" placeholder="Enter email" required>
      <button type="submit">Add User</button>
    </form>
  </div>
</div>

</body>
</html>
