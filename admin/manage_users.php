<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Manage Users</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="dashboard">
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <ul>
      <li><a href="dashboard.php" class="active">Dashboard</a></li>
      <li><a href="add_service.php">Add Service</a></li>
      <li><a href="manage_users.php">Manage Users</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="header">
      <h1>Manage Users</h1>
      <a href="add_user.php" class="add-btn">➕ Add New User</a>
    </div>

    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php
        $result = mysqli_query($conn, "SELECT * FROM users");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a class='action-btn edit' href='edit_user.php?id={$row['id']}'>Edit</a>
                        <a class='action-btn delete' href='delete_user.php?id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
        }
      ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Footer -->
</body>
</html>
