<?php

require_once "config.php";

function getAllBooks($conn)
{

    $sql = "
        SELECT *
        FROM books
        ORDER BY created_at DESC
    ";

    return $conn->query($sql);

}

?>