<html>
<head><title>PHP CONNECTION TEST</title></head>
<body>

<?php
$servername = "mysql";
$database = "mysql";

$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

try {
    $dsn = "mysql:host=$servername;dbname=$database";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    print("<p>Succeded to connect MySQL.</p>");
} catch(PDOException $e) {
    print("<p>Failed to connect MySQL.</p>");
    echo $e->getMessage();
}

$conn = null; 
print('<p>Close connection.</p>');

?>
</body>
</html>