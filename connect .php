<?php
$servername = "localhost";
$username = "root";
$password = "";
$databese = "shop";

$conn = new mysqli($servername, $username, $password, $databese);

if ($conn->connect_error) {
    die("Conn Fail". $conn->connect_error);
}
echo"Connected successfully";
?>