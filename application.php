<?php
$servername = "localhost";
$username = "root";
$password = "jam1313anne_";
$dbname = "application";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = $_POST['first_name'] ?? '';
    $last_name  = $_POST['last_name'] ?? '';

    if ($first_name && $last_name) {
        $stmt = $conn->prepare("INSERT INTO volunteers (first_name, last_name) VALUES (?, ?)");
        $stmt->bind_param("ss", $first_name, $last_name);

        if ($stmt->execute()) {
            header("Location: application.html?success=1");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Please fill in both First Name and Last Name.";
    }
}
$conn->close();
?>
