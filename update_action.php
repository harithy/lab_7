<?php
session_start();
if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab_7";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$matric = $_POST['matric'];
$name = $_POST['name'];
$role = $_POST['role'];

$sql = "UPDATE users SET name='$name', role='$role' WHERE matric='$matric'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Location: display.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
