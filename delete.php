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

$matric = $_GET['matric'];

$sql = "DELETE FROM users WHERE matric='$matric'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: display.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
