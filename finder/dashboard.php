<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Business Finder</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
      margin: 0;
    }
    .sidebar {
      width: 220px;
      background: #2c3e50;
      color: white;
      position: fixed;
      height: 100%;
      padding: 20px;
    }
    .sidebar h2 {
      font-size: 22px;
      margin-bottom: 20px;
    }
    .sidebar a {
      display: block;
      color: white;
      text-decoration: none;
      padding: 10px;
      margin: 10px 0;
      background: #34495e;
      border-radius: 5px;
    }
    .sidebar a:hover {
      background: #1abc9c;
    }
    .main {
      margin-left: 240px;
      padding: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 5px;
      overflow: hidden;
    }
    table th, table td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    table th {
      background: #2980b9;
      color: white;
    }
    .btn {
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      color: white;
    }
    .approve {
      background: green;
    }
    .reject {
      background: red;
    }
    .delete {
      background: #e67e22;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h2>Admin Panel</h2>
  <a href="admin_dashboard.php">Dashboard</a>
  <a href="manage_users.php">Manage Users</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main">
  <h1>Registered Businesses</h1>
  <table>
    <thead>
      <tr>
        <th>Business Name</th>
        <th>Category</th>
        <th>Location</th>
        <th>Image</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM services";
      $result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['status'];
        echo "<tr>
          <td>{$row['business_name']}</td>
          <td>{$row['category']}</td>
          <td>{$row['location']}</td>
          <td><img src='{$row['image']}' style='width: 50px; height: 50px; object-fit: cover;'></td>
          <td>{$status}</td>
          <td>";
        
        if ($status != 'approved') {
          echo "<a class='btn approve' href='approve_business.php?id={$row['id']}'>Approve</a> ";
        }
        if ($status != 'rejected') {
          echo "<a class='btn reject' href='reject_business.php?id={$row['id']}'>Reject</a> ";
        }

        echo "<a class='btn delete' href='delete_business.php?id={$row['id']}'>Delete</a>
          </td>
        </tr>";
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
