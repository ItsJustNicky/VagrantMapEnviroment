<?php
// Enable error reporting to display PHP errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

$db_host   = '192.168.56.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'SQLpassword';

$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q = $pdo->query("SELECT * FROM locations");
    $locations = [];
    while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
        $locations[] = $row;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die(); // Terminate the script
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>WebServer Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
          integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
          crossorigin="">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href='/leaflet/leaflet.css'>
    <script>
        // Pass the JSON data to your JavaScript
        var locationsData = <?php echo json_encode($locations); ?>;
    </script>
    <script src='/leaflet/leaflet.js'></script>
</head>
<body>
    

    <h1>The WebServer Virtual Machine</h1>
    

    <aside id="mapBar">
        <div id="text">
            <p>Welcome to<br>the WebServer MapVM</p>
            <p>This is used to track points stored within the <a href="test-database.php">DatabaseVM</a></p>
       
            <p>If you would like to add more points for tracking consult the adminVM </p>
        </div>
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

