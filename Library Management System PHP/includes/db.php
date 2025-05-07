<?php
// Database credentials
$host = 'localhost';      // Server name (keep as is for XAMPP)
$user = 'root';           // MySQL username (default in XAMPP is 'root')
$pass = '';               // MySQL password (leave empty in XAMPP)
$db = 'library';          // Your database name (we created 'library')

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
