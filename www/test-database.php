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
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die(); // Terminate the script
}
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
    <title>Database points of interest</title>
    <style>
        body {
        margin: 0;
        position: relative;
        background-color: #dbcccc;
        padding-top: 50px;
  
        font: 14px "Lucida Grande", Helvetica, Arial, sans-serif;
        }
        h1{
        float: left;
        width: 100%;
        top:0;
        margin: 0;
        position: fixed;
        padding-bottom: 20px;
        padding-top: 20px;

        border-bottom: 10px solid #f2f2f2;
        text-align: center;
        font-size: xx-large;
        color: #f2f2f2;
        background-color: lightskyblue;
        }
        th { text-align: left; }
        h2 {
            top: 80px;
            left: 50px;
            position: absolute;
        }
        table{
            position: absolute;
            top: 130px;
            left: 50px;
        }
        table, th, td {
          background-color: #f2f2f2;
          border: 2px solid grey;
          border-collapse: collapse;
        }

        th, td {
          padding: 0.2em;
        }
        footer
        {
        text-align: center;
        border-top: 10px solid #81b14f;
        background-color: #451b04;
        position: static;
        padding: 15px;
        float: left;
        width: 100%;
        position:fixed;
        bottom:0;
        }
    </style>
    
</head>

<body>
    <h1>Database points of interest</h1>

    <?php if ($q) { ?>
        <h2>Showing contents of Locations table:</h2>
        <table border="1">
            <tr><th>Name</th><th>Northing</th><th>Easting</th></tr>
            <?php
            while($row = $q->fetch()){
              echo "<tr><td>".$row["Name"]."</td><td>".$row["north"]."</td><td>".$row["east"]."</td></tr>\n";
            }
            ?>
        </table>
    <?php } else { ?>
        <p>Error fetching data from the database.</p>
    <?php } ?>
    <footer><p>Return to <a href="index.php">home</a></p></footer>
</body>

</html>
