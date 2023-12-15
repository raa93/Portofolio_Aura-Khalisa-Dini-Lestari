<?php

$host = 'localhost';
$user = 'root';
$pwd = ''; 
$dbname = 'pert4_db'; 

$conn = new mysqli($host, $user, $pwd, $dbname);

if($conn->connect_error){
    die('Connection Failed: ' . $conn->connect_error);
}
