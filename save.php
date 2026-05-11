<?php
$name = trim($_POST["name"] ?? "");
$note = trim($_POST["note"] ?? "");
if ($name === "" || $note === "") {
header("Location: index.php");
exit();
}
$file = "data.json";
if (file_exists($file)) {
$data = file_get_contents($file);
$notes = json_decode($data, true);
if (!is_array($notes)) {
$notes = [];
}
} else {
$notes = [];
}
$newItem = [
"name" => $name,
"note" => $note
];
$notes[] = $newItem;
file_put_contents($file, json_encode($notes, JSON_PRETTY_PRINT));
header("Location: index.php");
exit();
?>
