<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Movie Review App</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Movie Review App</h1>
<p class="subtitle">Enter movie details and a review.</p>

<div class="color-picker">
<label for="text-color">Text Color:</label>
<input type="color" id="text-color" value="#333">

<label for="bg-color">Background Color:</label>
<input type="color" id="bg-color" value="#f4f6f8">

<label for="outline-color">Fields Outline Color:</label>
<input type="color" id="outline-color" value="#ccc">
</div>

<form action="save.php" method="post" onsubmit="return validateForm();">
<label for="movie-name">Movie Name</label>
<input type="text" id="movie-name" name="movie-name" placeholder="Enter movie name" onblur="fetchMovieData()">

<label for="category">Movie Category</label>
<input type="text" id="category" name="category" placeholder="Enter category">

<label for="release-date">Release Date</label>
<input type="date" id="release-date" name="release-date">

<label for="rating">Movie Rating</label>
<input type="number" id="rating" name="rating" placeholder="Rating (1-10)" min="1" max="10" step="0.1">

<button type="submit">Save Review</button>
</form>

<h2>Saved Reviews</h2>
<div class="list-box">
<?php
$file = "data.json";

if (file_exists($file)) {
$data = file_get_contents($file);
$reviews = json_decode($data, true);

if (!empty($reviews)) {
echo "<ul>";
foreach ($reviews as $item) {
$safeName = htmlspecialchars($item["movie-name"]);
$safeCategory = htmlspecialchars($item["category"]);
$safeDate = htmlspecialchars($item["release-date"]);
$safeRating = htmlspecialchars($item["rating"]);
echo "<li><strong>$safeName</strong> ($safeCategory) - Released: $safeDate - Rating: $safeRating/10</li>";
}
echo "</ul>";
} else {
echo "<p>No reviews yet.</p>";
}
} else {
echo "<p>No reviews yet.</p>";
}
?>
</div>
</div>

<script src="script.js"></script>
</body>
</html>
