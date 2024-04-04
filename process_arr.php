<?php
// Start the session
session_start();

// Connect to the database
$link = mysqli_connect('localhost', 'root', '12345678', 'travel');

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$arr_date = $_POST['arr_date'];
$arr_time = $_POST['arr_time'];
$arr_locate = $_POST['arr_locate'];
$travel_id = $_POST['travel_id'];

// Prepare the SQL query
$sql = "INSERT INTO arrange (arr_date, arr_time, arr_locate, travel_id) VALUES ('$arr_date', '$arr_time', '$arr_locate', '$travel_id')";

// Execute the query
if (mysqli_query($link, $sql)) {
    // Set session success message
    $_SESSION['message'] = "Arrangement added successfully.";
    header("Location: arrangement.php?travel_id=$travel_id");
    exit;
} else {
    // Set session error message
    $_SESSION['message'] = "Error: " . mysqli_error($link);
    header("Location: arrangement.php?travel_id=$travel_id");
    exit;
}

// Close the connection
mysqli_close($link);
?>