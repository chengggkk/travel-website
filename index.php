<?php
// index.php
session_start(); // Start the session
if (!isset($_SESSION['address'])) {
  header('Location: login.php');
  exit;
}
if (isset($_SESSION['message'])) {
  // Display the message
  echo "<script>alert('{$_SESSION['message']}');</script>";

  // Unset the message
  unset($_SESSION['message']);
  unset($_SESSION['status']);
  
}
// ...existing code...
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Travel</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>
<body>
<?php include 'navbar.php'; ?>
<?php include 'create_tra.php'; ?>
<div style="margin-top: 28%; color: white;" align="center">
<?php include 'showjourney.php'; ?>
</div>
</body>
</html>
