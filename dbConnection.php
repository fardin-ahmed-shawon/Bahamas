<?php
session_start();

$site_url = "http://localhost/test/bahamas/";
$host = "localhost";
$user = "root"; 
$pass = "";     
$dbname = "bahamas";

// $site_url = "https://easytechsolutions.xyz/easy_data/bahamas/";
// $host = "localhost";
// $user = "easytec3"; 
// $pass = "T9y9*5uO2kwU#G";     
// $dbname = "easytec3_bahamas";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>