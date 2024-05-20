<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}
?>

<h1>Welcome, <?php echo $_SESSION['email']; ?></h1>
<a href="logout.php">Logout</a>
