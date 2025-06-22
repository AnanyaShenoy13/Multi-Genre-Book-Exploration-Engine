<?php
// Establish a database connection (replace these variables with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookusers";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve hashed password from the database
    $sql = "SELECT password FROM book_users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            echo "Login successful! Redirecting to s2.html...";
            // You can add a header redirect to s2.html here
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>
