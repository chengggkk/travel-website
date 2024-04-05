<?php
session_start(); // Start the session

// Create a database connection
$connection = mysqli_connect('localhost', 'root','12345678', 'travel');

$loca_name = $_POST['loca_name'];
$loca_address = $_POST['loca_address'];

// Insert into database
$query = "INSERT INTO location (loca_name, loca_address) VALUES ('$loca_name', '$loca_address')";
$result = mysqli_query($connection, $query);

if ($result) {
    // Insertion successful
    $_SESSION['message'] = '新增成功';
    header('Location: add-location.php');
    exit;
} else {
    // Insertion failed
    $_SESSION['message'] = '新增失敗: ' . mysqli_error($connection);
    header('Location: add-location.php');
    exit;
}


mysqli_close($connection);
?>