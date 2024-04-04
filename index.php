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
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="melon.datepicker.css">
  <link href="jquery-ui-1.10.1.css" rel="stylesheet">

<link href="melon.datepicker.css" rel="stylesheet">

<script src="jquery-1.9.1.js"></script>
<script src="jquery-ui-1.10.1.min.js"></script>
<script>
$(function() {	
  $( ".datepicker" ).datepicker({
    inline: true,
    showOtherMonths: true
  });
});
</script>
</head>
<body>
  <div style="z-index: 1000;">
<?php include 'navbar.php'; ?>
</div>
<?php include 'create_tra.php'; ?>
<div style="margin-top: 500px; color: white;" align="center">
<?php include 'showjourney.php'; ?>
</div>
</body>
</html>
