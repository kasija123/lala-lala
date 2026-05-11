<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Note App</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Student Note App</h1>
<p class="subtitle">Enter a student name and a short note.</p>

<form action="save.php" method="post" onsubmit="return validateForm();">
<label for="name">Student Name</label>
<input type="text" id="name" name="name" placeholder="Enter name">

<label for="note">Note</label>
<input type="text" id="note" name="note" placeholder="Enter short note">

<button type="submit">Save Note</button>
</form>

<h2>Saved Notes</h2>
<div class="list-box">
<?php
$file = "data.json";

if (file_exists($file)) {
$data = file_get_contents($file);
$notes = json_decode($data, true);

if (!empty($notes)) {
echo "<ul>";
foreach ($notes as $item) {
$safeName = htmlspecialchars($item["name"]);
$safeNote = htmlspecialchars($item["note"]);
echo "<li><strong>$safeName</strong>: $safeNote</li>";
}
echo "</ul>";
} else {
echo "<p>No notes yet.</p>";
}
} else {
echo "<p>No notes yet.</p>";
}
?>
</div>
</div>

<script src="script.js"></script>
</body>
</html>
