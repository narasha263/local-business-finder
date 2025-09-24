<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
} else {
    header("Location: manage_users.php");
    exit;
}

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Update user in database
    $query = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "<p class='success'>User updated successfully!</p>";
    } else {
        echo "<p class='error'>Error updating user: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
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
    <h1>Edit User</h1>

    <form method="POST">
      <label for="name">Username:</label>
      <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" required>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required>
      <button type="submit">Update User</button>
    </form>
  </div>
</div>

</body>
</html>
