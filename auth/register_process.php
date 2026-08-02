<?php

session_start();

require_once "../includes/config.php";
require_once "../includes/functions.php";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../register.php");
    exit();
}

// Get form data
$full_name = trim($_POST["full_name"]);
$email = trim($_POST["email"]);
$phone = trim($_POST["phone"]);
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Basic validation
if (empty($full_name) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
    setFlash("error","Please fill in all fields.");

    redirect("../register.php");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setFlash("error","Invalid email address.");

    redirect("../register.php");
}

if ($password !== $confirm_password) {
    setFlash("error","Passwords do not match.");

    redirect("../register.php");
}

// Check if email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    dsetFlash("error","Email already registered.");

    redirect("../register.php");
}

$check->close();

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the user
$stmt = $conn->prepare("
    INSERT INTO users
    (full_name, email, phone, password)
    VALUES (?, ?, ?, ?)
");

$stmt->bind_param(
    "ssss",
    $full_name,
    $email,
    $phone,
    $hashed_password
);

if ($stmt->execute()) {

    setFlash("success", "Registration successful! Please login.");

    redirect("../index.php");

} else {

    setFlash("error", "Registration failed. Please try again.");

    redirect("../register.php");

}

$stmt->close();
$conn->close();

?>