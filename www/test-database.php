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

    $q = $pdo->query("SELECT * FROM papers");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die(); // Terminate the script
}
?>

<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
    <title>Database test page</title>
    <style>
        th { text-align: left; }

        table, th, td {
          border: 2px solid grey;
          border-collapse: collapse;
        }

        th, td {
          padding: 0.2em;
        }
    </style>
</head>

<body>
    <h1>Database test page</h1>

    <?php if ($q) { ?>
        <p>Showing contents of papers table:</p>
        <table border="1">
            <tr><th>Paper code</th><th>Paper name</th></tr>
            <?php
            while($row = $q->fetch()){
              echo "<tr><td>".$row["code"]."</td><td>".$row["name"]."</td></tr>\n";
            }
            ?>
        </table>
    <?php } else { ?>
        <p>Error fetching data from the database.</p>
    <?php } ?>
</body>
</html>
