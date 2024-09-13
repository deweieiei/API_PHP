<?php

$hostname = '192.168.0.126';
$username = 'pairojdew';
$password = '1234';
$database = 'pcj';

 $conn = new mysqli($hostname, $username, $password, $database);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
echo "Connected successfully";

?>