<?php include 'auth.php'; ?>
<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    $query = "DELETE FROM users WHERE id = $id";
    if (mysqli_query($conn, $query)) {
        header("Location: manage_users.php");
        exit;
    } else {
        echo "<p class='error'>Error deleting user: " . mysqli_error($conn) . "</p>";
    }
} else {
    header("Location: manage_users.php");
    exit;
}
?>
