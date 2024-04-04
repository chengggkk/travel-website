<?php
// search_result.php

$link = mysqli_connect('localhost', 'root', '12345678', 'travel');

// Get the location_id from the URL
$location_id = $_GET['location_id'];

// Fetch the location details from the database
$sql = "SELECT * FROM location WHERE location_id = $location_id";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div style="background-color:white; width:500px; margin-left:200px; margin-top:100px;">
    <?php
echo "<h1>{$row['loca_name']}</h1>";
echo "<p>{$row['loca_country']}</p>";
echo "<p>{$row['loca_address']}</p>";
echo "<a href='{$row['googlemap_link']}'>View on Google Maps</a>";
?>
<iframe src="https://www.google.com.tw/maps/place/%E8%89%BE%E8%8F%B2%E7%88%BE%E9%90%B5%E5%A1%94/@48.8583701,2.2919064,17z/data=!3m1!4b1!4m6!3m5!1s0x47e66e2964e34e2d:0x8ddca9ee380ef7e0!8m2!3d48.8583701!4d2.2944813!16zL20vMDJqODE?entry=ttu" style="position: fixed; right: 0; width: 500px; height: 700px;"></iframe>
<?php
?>
</div>
</body>
</html>
