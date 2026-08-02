<?php

session_start();

require_once "includes/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account | Nebula Library</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/register.css">

</head>

<body>

<div class="stars">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>

<div class="background">

<div class="register-card">

<h1>Nebula Library</h1>

<p class="subtitle">
Begin Your Reading Journey
</p>

<?php displayFlash(); ?>

<form action="auth/register_process.php" method="POST">

<label>Full Name</label>
<input
id="fullName"
name="full_name"
type="text"
placeholder="Enter your full name"
required>

<label>Email</label>
<input
id="registerEmail"
name="email"
type="email"
placeholder="Enter your email"
required>

<label>Phone Number</label>
<input
id="phone"
name="phone"
type="tel"
placeholder="Enter your phone number"
required>

<label>Password</label>

<div class="password-box">

<input
id="password"
name="password"
type="password"
placeholder="Create a password"
required>

<span class="toggle"
onclick="togglePassword('password', this)">
👁
</span>

</div>

<label>Confirm Password</label>

<div class="password-box">

<input
id="confirmPassword"
name="confirm_password"
type="password"
placeholder="Confirm password"
required>

<span class="toggle"
onclick="togglePassword('confirmPassword', this)">
👁
</span>

</div>

<label class="terms">

<input
id="terms"
type="checkbox"
required>

I agree to the Terms & Conditions

</label>

<button type="submit">
    Create Account
</button>

Create Account

</button>

</form>

<p class="bottom-text">

Already have an account?

<a href="index.php">

Login

</a>

</p>

</div>

</div>

<script src="assets/js/script.js"></script>

</body>
</html>