<?php

// Check if the delete button is clicked
if (isset($_GET['arr_id']) && isset($_GET['travel_id'])) {
    // Get the arr_id and travel_id from the URL
    $arr_id = $_GET['arr_id'];
    $travel_id = $_GET['travel_id'];

    // Connect to the database

    $conn = new mysqli("localhost", "root", "12345678","travel");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Perform the delete operation
    $sql = "DELETE FROM arrange WHERE arrange_id = $arr_id ;";
    echo "SQL Query: " . $sql; // Add this line for debugging
        if ($conn->query($sql) === TRUE) {
        // Redirect to the header arrangement.php with the travel_id
        header("Location: arrangement.php?travel_id=$travel_id");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;

    }

    $conn->close();
}
?>