<?php
include('includes/db.php');
$sql = "SELECT * FROM users";
$result = $conn->query($sql);


    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->store_result();
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            echo "Login successful! Welcome, " . htmlspecialchars($username) . ".";
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Username not found.";
    }

    $stmt->close();
    $conn->close();

?>
