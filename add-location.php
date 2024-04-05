<?php session_start();

if (isset($_SESSION['message'])) {
    echo '<script>alert("' . $_SESSION['message'] . '");</script>';
    unset($_SESSION['message']);
}?>

<!DOCTYPE html>
<html>

<head>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            color: black;
            padding: 20px;
            height: 900px;
        }

        input[type="submit"] {
            margin-top: 10px;
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div style="display: flex; margin-top:50px; margin-left:470px; position:absolute; ">
        <img src="img/add-loca.jpg" alt="" style="width: auto; height: 900px;">
        <form method="post" action="process_add-loca.php">
            <h1>新增景點</h1><br>
            Name: <input type="text" name="loca_name" required><br>
            Google Map Link:
            <input id="searchInput" style="width:400px;" type="text" placeholder="搜尋景點、地址" name="loca_address" required>
            <div id="map" style="height: 800px; width: 100%;"></div>
            <script>
                function initAutocomplete() {
                    var input = document.getElementById('searchInput');
                    var autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.setTypes(['geocode']);
                    autocomplete.setFields(['address_components', 'geometry']);

                    var geocoder = new google.maps.Geocoder();

                    autocomplete.addListener('place_changed', function() {
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            window.alert("No details available for input: '" + place.name + "'");
                            return;
                        }

                        var lat = place.geometry.location.lat();
                        var lng = place.geometry.location.lng();

                        console.log('Latitude:', lat);
                        console.log('Longitude:', lng);

                        const position = {
                            lat: lat,
                            lng: lng
                        };
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 14,
                            center: position,
                        });

                        const marker = new google.maps.Marker({
                            position: position,
                            map: map,
                            title: place.name,
                        });
                    });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL5OzoBLM3FMcyTmEnbEGpFwrSHnywPSA&libraries=places&callback=initAutocomplete" async defer></script>
            <input type="submit" class="button">
        </form>
    </div>
</body>

</html>
