<?php

session_start();

require_once "includes/book_functions.php";

$books = getAllBooks($conn);

if(!isset($_SESSION["user_id"])){

    header("Location: index.php");

    exit();

}

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

<link rel="stylesheet" href="assets/css/home.css">

</head>

<body>

<nav>

<div class="logo">
Nebula Library
</div>

<ul>

<li><a href="#">Home</a></li>

<li><a href="#">Categories</a></li>

<li><a href="#">Trending</a></li>

<li><a href="#">Contact</a></li>

</ul>

<div class="profile">

    👋 Welcome
    <?php echo htmlspecialchars($_SESSION["full_name"]); ?>

    |

    <a href="auth/logout.php">Logout</a>

</div>

</nav>

<section class="hero">

    <h1>Discover Your Next Great Read</h1>

    <p>
        Explore thousands of books from every genre.
        From programming to fiction,
        Nebula Library has something for everyone.
    </p>

    <div class="search-box">

        <input
            type="text"
            placeholder="🔍 Search books...">

        <button>Search</button>

    </div>

    <button class="hero-btn">
        Browse Collection
    </button>

</section>

<section class="books">

<h2>

<section class="stats">

    <div class="stat">
        <h2>50K+</h2>
        <p>Books</p>
    </div>

    <div class="stat">
        <h2>120+</h2>
        <p>Authors</p>
    </div>

    <div class="stat">
        <h2>25+</h2>
        <p>Genres</p>
    </div>

    <div class="stat">
        <h2>98%</h2>
        <p>Happy Readers</p>
    </div>

</section>

Trending Books

</h2>

<div class="book-grid">

<?php while($book = $books->fetch_assoc()): ?>

<div class="card">

<img
src="<?php echo htmlspecialchars($book["image"]); ?>"
alt="<?php echo htmlspecialchars($book["title"]); ?>">

<h3>

<?php echo htmlspecialchars($book["title"]); ?>

</h3>

<p>

<?php echo htmlspecialchars($book["author"]); ?>

</p>

<div class="rating">

⭐ <?php echo htmlspecialchars($book["rating"]); ?>

</div>

<button class="read-btn">

Read More

</button>

</div>

<?php endwhile; ?>

</div>

</section>

<section class="categories">

<h2>

Categories

</h2>

<div class="category-grid">

<div>Programming</div>

<div>Science</div>

<div>History</div>

<div>Self Help</div>

<div>Fiction</div>

<div>Technology</div>

</div>

</section>

<footer>

© 2026 Nebula Library • Read Beyond the Stars

</footer>

</body>
</html>