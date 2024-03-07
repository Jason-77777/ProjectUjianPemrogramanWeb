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
        <div class="search-container">
            <div class="search-wrapper">
                <input type="text" id="searchInput" placeholder="Search Anything">
                <button id="searchButton" onclick="toggleSearchBox()">Search</button>
            </div>
        </div>
        <div class="float-right">BOMBA</div>
        <a href="">Profile</a>
    </div>

    <script>
        function toggleSearchBox() {
            var searchBox = document.getElementById('searchBox');
            searchBox.style.display = (searchBox.style.display === 'none' || searchBox.style.display === '') ? 'block' : 'none';
        }
    </script>
</body>
</html>