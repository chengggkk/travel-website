<?php
// process_tra.php

session_start(); // Start the session
// Get the address of the currently logged in user
$address = $_SESSION['address'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Travel</title>
    <style>
        .homeimg {
            position: absolute;
            top: 2%;
            left: 0;
            width: 100%;
            height: 40%;
            object-fit: cover;
            z-index: 0;
            margin-top: 60px;
        }

        .tra_form {
            background-color: transparent;
            position: absolute;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            color: white;
            /* Set font color to white */
            width: 80%;
            /* Set width to 80% */
            /* Position the form */
            top: 27%;
            /* Set top position to 50% */
            left: 50%;
            /* Set left position to 50% */
            transform: translate(-50%, -50%);
            /* Center the form */
            z-index: 2;
            /* Set z-index higher than the image */
        }

        .tra_form>div {
            flex: 1;
            /* Make each div take up equal space */
        }

        .button {
            width: 100px;
            height: 50px;
            background-color: black;
            color: white;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #ffffff;
            color: #000000;
        }
    </style>
</head>

<body>
    <img class="homeimg" src="img/254381.jpg" alt="">
    <form class="tra_form" action="process_tra.php" method="post">
        <div style="display:flex;">
            <input type="hidden" name="address" value="<?php echo $address; ?>">
            <h2 style="margin-right:100px;">Create Travel</h2>
            <div>
                <label for="start_date">Start Date:</label><br>
                <input type="date" id="start_date" name="start_date" style="margin: 0 50px;"><br>
            </div>
            <div>
                <label for="end_date">End Date:</label><br>
                <input type="date" id="end_date" name="end_date" style="margin: 0 50px;"><br>
            </div>
            <div>
                <label for="travel_name">Travel Name:</label><br>
                <input type="text" id="travel_name" name="travel_name" style=" width:500px;margin: 0 50px;"><br>
            </div>
        </div>
        <div align="center">
            <input type="submit" class="button" style="margin-top:30px; width:500px;" value="創建旅程">
        </div>
    </form>
</body>

</html>