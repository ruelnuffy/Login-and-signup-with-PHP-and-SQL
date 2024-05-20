<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("Location: test.php");
        } else {
            $_SESSION['login_error'] = "Invalid username or password.";
            header('Location: index.php');
    
        }
    } else {
        $_SESSION['login_error'] = "Invalid username or password.";
        header('Location: index.php');
     
    }

    $stmt->close();
}

$conn->close();
?>

