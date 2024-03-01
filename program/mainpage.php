<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="navbar">
        <a href="#">Items</a>
        <a href="#">Inventory</a>
        <a href="#">Notification</a>
        <a href="#">Payment</a>
        <a href="#">Profile</a>
        <div class="search-container">
            <div class="search-wrapper">
                <input type="text" id="searchInput" placeholder="Search Anything">
                <button id="searchButton" onclick="toggleSearchBox()">Search</button>
            </div>
        </div>
        <span class="float-right">BOMBA</span>
        <span a href="#" class="float-right">Profile</a>
    </div>

    <!-- <div class="search-box" id="searchBox">
        <input type="text" id="searchInputMobile" placeholder="Search...">
        <button id="searchButtonMobile" onclick="toggleSearchBox()">Search</button>
    </div> -->

    <script>
        function toggleSearchBox() {
            var searchBox = document.getElementById('searchBox');
            searchBox.style.display = (searchBox.style.display === 'none' || searchBox.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>
</html>
