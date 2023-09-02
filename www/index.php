<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
          crossorigin="">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href='/leaflet/leaflet.css'>
    <script src='/leaflet/leaflet.js'></script>
</head>
<body>
    <script>
        var jsonData = <?php echo json_encode($jsonData); ?>;
    </script>
    

    <h1>The WebServer Virtual Machine</h1>
    

    <aside id="mapBar">
        <p>Welcome to<br>the WebServer MapVM<?php echo $title; ?></p>
        <p>This is used to track points stored within the DatabaseVM</p>
       
        <p>If you would like to add more points for tracking consult the adminVM </p>
        <div id="map"></div>
    </aside>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin=""></script>
    <script src="/index.js"></script>

    <div id="out"></div>

    <footer>
        <p>Maps by: <a href="https://leafletjs.com/">Leafletjs</a></p>
    </footer>
</body>
</html>

