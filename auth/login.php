<?php

require_once "../includes/config.php";
require_once "../includes/functions.php";

session_start();

// Allow only POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit();
}

$email = trim($_POST["email"]);
$password = $_POST["password"];

// Check if email exists
$stmt = $conn->prepare("
SELECT id,
       full_name,
       email,
       password,
       role
FROM users
WHERE email = ?
");

$stmt->bind_param("s", $email);

$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows == 1){

    $user = $result->fetch_assoc();

    if(password_verify($password,$user["password"])){

        $_SESSION["user_id"] = $user["id"];

        $_SESSION["full_name"] = $user["full_name"];

        $_SESSION["email"] = $user["email"];

        $_SESSION["role"] = $user["role"];

        setFlash(
            "success",
            "Welcome back, " . $user["full_name"] . "!"
        );

        redirect("../home.php");

    }

    else{

        setFlash("error", "Invalid email or password.");

        redirect("../index.php");

    }

}

else{

    setFlash("error", "Invalid email or password.");

    redirect("../index.php");

}

?>