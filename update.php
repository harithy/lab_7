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
$sql = "SELECT * FROM users WHERE matric='$matric'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h2>Update User</h2>
    <form action="update_action.php" method="post">
        <input type="hidden" name="matric" value="<?php echo $row['matric']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
        Role: <input type="text" name="role" value="<?php echo $row['role']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
$conn->close();
?>
