<?php
include('includes/db.php');
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // Check if passwords match
    if ($password !== $repassword) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "<script>alert('Registration successful. You can now login.'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }
    }
}
?>