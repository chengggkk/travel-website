<?php

session_start(); // Start the session

// Get the form data
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$travel_name = $_POST['travel_name'];
$address = $_POST['address'];

// Connect to the database
$link = mysqli_connect('localhost', 'root', '12345678', 'travel');

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query
$sql = "INSERT INTO journey (start_date, end_date, travel_name, address) VALUES ('$start_date', '$end_date', '$travel_name', '$address')";

// Execute the query
if (mysqli_query($link, $sql)) {
    $_SESSION['message'] = "New record created successfully: " . $address;
    $_SESSION['status'] = "success";
} else {
    $_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($link);
    $_SESSION['status'] = "fail";
}

// Close the connection
mysqli_close($link);

// Redirect to index.php
header("Location: index.php");
exit();
?>