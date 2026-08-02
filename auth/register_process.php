<?php

require_once "../includes/config.php";

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
    die("All fields are required.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

if ($password !== $confirm_password) {
    die("Passwords do not match.");
}

// Check if email already exists
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    die("An account with this email already exists.");
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

    header("Location: ../index.php?registered=1");
    exit();

} else {

    die("Registration failed. Please try again.");

}

$stmt->close();
$conn->close();

?>