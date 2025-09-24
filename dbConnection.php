<?php
session_start();

$site_url = "http://localhost/test/bahamas/";
$host = "localhost";
$user = "root"; 
$pass = "";     
$dbname = "bahamas";

// $site_url = "";
// $host = "localhost";
// $user = ""; 
// $pass = "";     
// $dbname = "";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>