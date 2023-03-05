<?php
define("LOCALHOST", "localhost");
define("USER", "helloworlduser");
define("PASSWORD", "HelloWorld");
define("DB", "helloworlddb");

//Adatbázis kapcsolat
$link = mysqli_connect(LOCALHOST, USER, PASSWORD, DB);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>