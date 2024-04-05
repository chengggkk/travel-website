<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('.search').on('input', function() {
        var searchQuery = $(this).val();
        if (searchQuery) {
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: { query: searchQuery },
                success: function(data) {
                    $('#search-results').html('<a href="add-location.php" class="search-item" style="display:block; height:40px; margin-top:10px;">新增景點</a>' + data);
                }
            });
        } else {
            $('#search-results').html('');
        }
    });
    $('#search').on('click', 'a', function(e) {
        // Check if the clicked anchor tag does not link to add-location.php
        if ($(this).attr('href') !== 'add-location.php') {
            e.preventDefault();
            var selectedLocationName = $(this).text().trim();
            var selectedLocationAddress = $(this).find('span').text();
            $('.search').val(selectedLocationName + " - " + selectedLocationAddress);
            $('#search').hide();
        }
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>

<!-- navbar.php -->
<?php
session_start();
$name = $_SESSION['name'] ?? ''; // Get the name from the session
?>
  <script src="https://kit.fontawesome.com/29a6af0e63.js" crossorigin="anonymous"></script>


<nav style="display: flex; justify-content: space-between; align-items: center;">
    <a href="index.php"><img src="img/logo.png" alt="Logo" style="width:100px; height: 50px;"></a>

    <div class="search-space" style="position: relative; z-index: 1000;">
        <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i>
        <input type="text" style="width: 1000px;height:35px; color:white;" class="search" placeholder="搜尋景點">
        <div id="search-results" style="margin-left:25px; position: absolute; width: 1000px; background: white; border-radius: 10px;"></div>
        </div>

    <div class="dropdown">
        <button class="dropbtn"><?php echo $name; ?></button> <!-- Show the name on the button -->
        <div class="dropdown-content" style="display: none;">
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
            <a href="logout.php">log out</a>
        </div>
    </div>
</nav>
