<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script></script>
    <?php

    // Create connection
    $conn = new mysqli('localhost', 'root', '12345678', 'travel');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $travelId = $_GET['travel_id'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT travel_name FROM journey WHERE travel_id = ?");
    $stmt->bind_param("i", $travelId);
    $stmt->execute();
    $stmt->bind_result($websiteName);
    $stmt->fetch();
    ?>
    <title><?php echo $websiteName; ?> - 安排行程</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <?php include 'journey_arr.php'; ?>
</body>

</html>
<?php 
$stmt->close();
$conn->close();
?>