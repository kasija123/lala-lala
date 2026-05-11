<?php
$movieName = trim($_POST["movie-name"] ?? "");
$category = trim($_POST["category"] ?? "");
$releaseDate = trim($_POST["release-date"] ?? "");
$rating = trim($_POST["rating"] ?? "");

if ($movieName === "" || $category === "" || $releaseDate === "" || $rating === "") {
header("Location: index.php");
exit();
}

$file = "data.json";
if (file_exists($file)) {
$data = file_get_contents($file);
$reviews = json_decode($data, true);
if (!is_array($reviews)) {
$reviews = [];
}
} else {
$reviews = [];
}

$newItem = [
"movie-name" => $movieName,
"category" => $category,
"release-date" => $releaseDate,
"rating" => $rating
];

$reviews[] = $newItem;
file_put_contents($file, json_encode($reviews, JSON_PRETTY_PRINT));
header("Location: index.php");
exit();
?>
