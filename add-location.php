<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: black;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            color: black;
            padding: 20px;
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
    <div style=" background-image: url('img/add-loca.jpg'); width:800px; height:420px;">
        <h1 style="color: white; background-repeat: no-repeat;  padding-left: 280px; padding-top: 100px;">Add Location</h1>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14461.083225706001!2d121.52558089999998!3d25.024882249999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a9914fa74afd%3A0xd9c379af4e53232e!2z57SA5bee5bq15paH5a245qOu5p6X!5e0!3m2!1szh-TW!2stw!4v1712203471163!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <form method="post" action="process_add-loca.php">
        Name: <input type="text" name="loca_name"><br>
        Address: <input type="text" name="loca_address"><br>
        Country: <input type="text" name="loca_country"><br>
        Google Map Link: <input style="width:300px;" type="text" name="googlemap_link"><br>
        <input type="submit" class="button">
    </form>

</body>

</html>