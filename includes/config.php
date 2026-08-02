<?php

// Database Configuration

$host = "localhost";
$username = "root";
$password = "";
$database = "nebula_library";

// Create Connection

$conn = new mysqli($host, $username, $password, $database);

// Check Connection

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

?>