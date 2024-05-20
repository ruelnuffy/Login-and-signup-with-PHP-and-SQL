<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = "Passwords do not match.";
        header('Location: signup.php');
        exit();
    }

    // Check if the user exists with the given email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "A user with this email already exists.";
        header('Location: signup.php');
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (fullname, phone, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $phone, $email, $hashed_password);

    if ($stmt->execute() === TRUE) {
        $_SESSION['success_message'] = "New record created successfully";
        header("Location: test.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
        header('Location: signup.php');
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
