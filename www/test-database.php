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

    // Query for 'locations' table
    $locations_query = $pdo->query("SELECT * FROM locations");

    // Query for 'areas' table
    $areas_query = $pdo->query("SELECT * FROM areas");

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die(); // Terminate the script
}
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
    <title>Database points of interest</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <aside id="mapBar">
        <h3>Welcome to<br>the WebServer representation of the database</h3>
        <h3>A visual representation of information currently stored within the DatabaseVM</h3>
        <h3>Return to <a href="index.php">home</a></h3>
    </aside>
    <h1>Database points of interest</h1>
    <div id="box">
        

        <?php if ($locations_query) { ?>
            <h2>Showing contents of Locations table:</h2>
            <table border="1">
                <tr><th>Name</th><th>Northing</th><th>Easting</th></tr>
                <?php
                while($row = $locations_query->fetch()){
                echo "<tr><td>".$row["Name"]."</td><td>".$row["north"]."</td><td>".$row["east"]."</td></tr>\n";
                }
                ?>
            </table>
        <?php } else { ?>
            <p>Error fetching data from the Locations table.</p>
        <?php } ?>

        <?php if ($areas_query) { ?>
            <h2>Showing contents of Areas table:</h2>
            <table border="1">
                <tr><th>Name</th><th>Northing</th><th>Easting</th><th>Radius</th></tr>
                <?php
                while($row = $areas_query->fetch()){
                echo "<tr><td>".$row["Name"]."</td><td>".$row["north"]."</td><td>".$row["east"]."</td><td>".$row["radius"]."</td></tr>\n";
                }
                ?>
            </table>
        <?php } else { ?>
            <p>Error fetching data from the Areas table.</p>
        <?php } ?>
    </div>
    <footer></p></footer>
</body>

</html>
