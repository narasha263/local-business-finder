<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE services SET status='rejected' WHERE id=$id";
    mysqli_query($conn, $query);
}

header("Location: dashboard.php");
