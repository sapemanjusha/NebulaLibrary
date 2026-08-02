<?php

/**
 * Redirect to another page
 */
function redirect($url)
{
    header("Location: $url");
    exit();
}

/**
 * Store a flash message
 */
function setFlash($type, $message)
{
    $_SESSION["flash"] = [
        "type" => $type,
        "message" => $message
    ];
}

/**
 * Display flash message
 */
function displayFlash()
{
    if (!isset($_SESSION["flash"])) {
        return;
    }

    $flash = $_SESSION["flash"];

    echo '
    <div class="alert ' . htmlspecialchars($flash["type"]) . '">
        ' . htmlspecialchars($flash["message"]) . '
    </div>';

    unset($_SESSION["flash"]);
}