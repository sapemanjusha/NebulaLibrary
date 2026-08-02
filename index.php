<?php

session_start();

require_once "includes/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nebula Library</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">

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

    <div class="login-card">

        <h1>Nebula Library</h1>

        <p class="subtitle">
            Explore Stories Beyond the Stars
        </p>

        <?php displayFlash(); ?>

        <form action="auth/login.php" method="POST">

            <label>Email</label>

            <input
            id="loginEmail"
            name="email"
            type="email"
            placeholder="Enter your email"
            required>

            <label>Password</label>

            <input
            id="loginPassword"
            name="password"
            type="password"
            placeholder="Enter your password"
            required>

            <div class="options">

                <label class="remember">

                    <input type="checkbox">

                    Remember Me

                </label>

                <a href="#">Forgot Password?</a>

            </div>

            <button type="submit">

            Login

            </button>

            Login

            </button>

        </form>

        <p class="bottom-text">

            New here?

            <a href="register.php">

                Create Account

            </a>

        </p>

    </div>

</div>

<script src="assets/js/script.js"></script>

</body>
</html>