<?php
// process_login.php

session_start();

// Get the form data
$address = $_POST['address'];
$password = $_POST['password'];

// Connect to the database
$link = mysqli_connect('localhost', 'root', '12345678', 'travel');

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query
$sql = "SELECT DISTINCT * FROM account WHERE address='$address' AND password='$password'";

// Execute the query
$result = mysqli_query($link, $sql);

// Check the result
if ($row = mysqli_fetch_assoc($result)) {
    // Login successful
    $_SESSION['address'] = $address;
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['level'] = $row['level'];
    header('Location: index.php'); // Redirect to index.php
    exit;
} else {
    // Login failed
    $_SESSION['message'] = "帳號或密碼錯誤";
    $_SESSION['msg_type'] = "danger";
    header('Location: login.php'); // Redirect to login.php
    exit;
}

// Close the connection
mysqli_close($link);
?>