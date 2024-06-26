<?php
session_start();

if (isset($_SESSION['message'])) {
    // Display the message
    echo "<script>alert('{$_SESSION['message']}');</script>";

    // Unset the message
    unset($_SESSION['message']);
    unset($_SESSION['status']);
}
$travel_id = $_GET['travel_id'];

?>
<style>
    .arr_form {
        background-color: transparent;
        display: flex;
        color: white;
        margin: 10px 0;
    }



    .arrtable {
        color: white;
        width: 1000px;
    }

    .arrtable th,
    .arrtable td,
    .arrtable tr {
        border: 1px solid white;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.search-location').on('input', function() {
            var searchQuery = $(this).val();
            if (searchQuery) {
                $.ajax({
                    url: 'search-location.php',
                    type: 'POST',
                    data: {
                        query: searchQuery
                    },
                    success: function(data) {
                        $('#search-location').html(data);
                        // Add a link to add-location.php at the top
                        $('#search-location').prepend('<a href="add-location.php" class="search-item" style="display:block; height:40px; margin-top:10px;">新增景點</a>');
                        $('#search-location').show();
                    }
                });
            } else {
                $('#search-location').html('');
                $('#search-location').hide();
            }
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('.search-space').length) {
                $('#search-location').hide();
            }
        });

        $('#search-location').on('click', 'a', function(e) {
            // Check if the clicked anchor tag does not link to add-location.php
            if ($(this).attr('href') !== 'add-location.php') {
                e.preventDefault();
                var selectedLocationName = $(this).text().trim();
                var selectedLocationAddress = $(this).find('span').text();
                $('.search-location').val(selectedLocationName);
                $('#search-location').hide();
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <?php
    $link = mysqli_connect('localhost', 'root', '12345678', 'travel');
    $sql = "SELECT travel_name,start_date, end_date FROM journey WHERE travel_id = $travel_id";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result); // Fetch the result
    $start_date = $row['start_date']; // Populate start_date variable
    $end_date = $row['end_date']; // Populate end_date variable
    echo "<h3 style='color:white; text-align:center; margin-top:50px;'>Start Date: " . $row['start_date'] . "~End Date: " . $row['end_date'] . "</h3>";
    $sql = "SELECT * FROM arrange WHERE travel_id = " . $travel_id;
    $result = mysqli_query($link, $sql);
    ?>
    <div style="display: flex; justify-content: center;">
        <form class="arr_form"  action="process_arr.php" method="post">
        <input type="hidden" name="travel_id" value="<?php echo $travel_id; ?>">
        <label style="width: 100px;" for="arr_date">Arrange Date:</label><br>
        <input type="date" id="arr_date" name="arr_date" min="<?php echo $start_date ?>" max="<?php echo $end_date ?>"><br>
        <label for="arr_time">Arrange Time:</label><br>
        <input type="time" id="arr_time" name="arr_time"><br>
        <label for="arr_locate">Arrange Location:</label><br>
        <div class="search-space" style="position: relative; z-index: 1000;">
            <input type="text" style="width: 500px;height:35px; color:black;" id="arr_locate" name="arr_locate" class="search-location" placeholder="搜尋景點">
            <div id="search-location" style="color:black; position: absolute; width: 500px; background: white; border-radius: 10px;"></div>
        </div>
    </div>
    <div align="center" style="margin-top:30px;">
        <input style="margin-bottom:50px;" name="submit" class="button" type="submit" value="新增行程">
    </div>
    </form>
    <?php
    echo "<table class='arrtable'  align='center'>";
    echo "<tr>";
    echo "<th>arr_date</th>";
    echo "<th>arr_time</th>";
    echo "<th>arr_locate</th>";
    echo "<th>刪除</th>";
    echo "</tr>";

    $sql = "SELECT * FROM arrange WHERE travel_id = $travel_id ORDER BY arr_date ASC";
    $result = mysqli_query($link, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['arr_date'] . "</td>";
        echo "<td>" . $row['arr_time'] . "</td>";
        echo "<td>" . $row['arr_locate'] . "</td>";
        echo "<td><a href='delete_arr.php?arr_id={$row['arrange_id']}&travel_id={$travel_id}'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</body>

</html>