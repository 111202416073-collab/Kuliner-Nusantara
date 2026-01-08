<?php
date_default_timezone_set('Asia/Jakarta');

$servername = "localhost";
$username = "root";
$password = "";
$db = "webdailyjornal";

// create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// check connection
if (!$conn) {
    die("Connaction failed: " .mysqli_connect_error());
}
//echo "Connection successfully<hr>";
?>