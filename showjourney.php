<?php
// showjourney.php

session_start(); // Start the session

// Get the address of the currently logged in user
$address = $_SESSION['address'];

// Connect to the database
$link = mysqli_connect('localhost', 'root', '12345678', 'travel');

// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare the SQL query
$sql = "SELECT travel_id, start_date, end_date, travel_name FROM journey WHERE address = '$address'";

// Execute the query
$result = mysqli_query($link, $sql);

// Check if the query returned any results
if (mysqli_num_rows($result) > 0) {
    echo "<table style='border-collapse: collapse; width: 1000px;'>";
    echo "<tr style='border: 1px solid white;'>";
    echo "<th style='border: 1px solid white;'>Start Date</th>";
    echo "<th style='border: 1px solid white;'>End Date</th>";
    echo "<th style='border: 1px solid white;'>Travel Name</th>";
    echo "</tr>";
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr style='border: 1px solid white;'>";
        echo "<td style='border: 1px solid white;'>" . $row["start_date"] . "</a></td>";
        echo "<td style='border: 1px solid white;'>" . $row['end_date'] . "</a></td>";
        echo "<td style='border: 1px solid white;'><a name='gotoarr' href='arrangement.php?travel_id=" . $row["travel_id"] . "'>" . $row['travel_name'] . "</a></td>";
        echo "</tr>";
    }
} else {
    echo "No journeys found";
}

// Close the connection
mysqli_close($link);
?>