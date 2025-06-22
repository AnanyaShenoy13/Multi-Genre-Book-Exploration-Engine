<?php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (!empty($username) && !empty($password)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "bookusers";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $SELECT = "SELECT username FROM book_users WHERE username = ?";
    $INSERT = "INSERT INTO `book_users` (username, password) VALUES (?, ?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($existingUsername);
    $stmt->fetch();
    $stmt->close();

    if ($existingUsername) {
        echo "Username already exists";
    } else {
        $stmt = $conn->prepare($INSERT);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $username, $hashedPassword);

        if ($stmt->execute()) {
            echo "New record inserted successfully";
            header("Location: s2.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
} else {
    echo "All fields are required";
    die();
}
?>
