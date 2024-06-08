<?php
session_start();
if (isset($_SESSION['matric'])) {
    header("Location: display.php");
} else {
    header("Location: login.php");
}
?>
