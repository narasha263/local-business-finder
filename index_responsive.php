<?php
$conn = new mysqli("localhost", "root", "", "localfinder", "3307");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$filter = isset($_GET['category']) ? $_GET['category'] : '';
$categoryEscaped = $conn->real_escape_string($filter);
$sql = "SELECT name, category, location, description, image FROM businesses";
if ($filter) {
  $sql .= " WHERE category = '$categoryEscaped'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Local Business Finder</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800">

  <header class="bg-indigo-600 text-white p-6 text-center shadow">
    <h1 class="text-4xl font-bold">Local Business Finder</h1>
    <p class="text-md mt-1">Discover businesses near you</p>
  </header>

  <div class="container mx-auto px-4 py-8">
    <form method="get" class="mb-8 flex flex-wrap gap-4 items-center">
      <label for="category" class="text-gray-700 font-semibold">Filter by Category:</label>
      <select name="category" id="category" class="p-2 border border-gray-300 rounded w-48">
        <option value="">All</option>
        <option value="Retail" <?= $filter === 'Retail' ? 'selected' : '' ?>>Retail</option>
        <option value="Repair" <?= $filter === 'Repair' ? 'selected' : '' ?>>Repair</option>
        <option value="Beauty" <?= $filter === 'Beauty' ? 'selected' : '' ?>>Beauty</option>
        <option value="Food" <?= $filter === 'Food' ? 'selected' : '' ?>>Food</option>
      </select>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Search</button>
    </form>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $img = htmlspecialchars($row["image"] ?: "https://via.placeholder.com/400x200?text=Business+Image");
          echo "<div class='bg-white rounded-lg shadow-md hover:shadow-lg transition'>
                  <img src='" . $img . "' alt='Business Image' class='w-full h-40 object-cover rounded-t'>
                  <div class='p-4'>
                    <h2 class='text-xl font-semibold text-indigo-700'>" . htmlspecialchars($row["name"]) . "</h2>
                    <p class='text-sm'><strong>Category:</strong> " . htmlspecialchars($row["category"]) . "</p>
                    <p class='text-sm'><strong>Location:</strong> " . htmlspecialchars($row["location"]) . "</p>
                    <p class='mt-2 text-gray-700 text-sm'>" . htmlspecialchars($row["description"]) . "</p>
                  </div>
                </div>";
        }
      } else {
        echo "<p class='text-red-500 text-lg'>No businesses found in this category.</p>";
      }
      $conn->close();
      ?>
    </div>
  </div>

  <footer class="bg-indigo-600 text-white text-center py-4 mt-10">
    &copy; <?= date("Y") ?> Local Business Finder | Built by Narasha Mepukori
  </footer>

</body>
</html>
