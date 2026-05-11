function validateForm() {
const movieName = document.getElementById("movie-name").value.trim();
const category = document.getElementById("category").value.trim();
const releaseDate = document.getElementById("release-date").value.trim();
const rating = document.getElementById("rating").value.trim();

if (movieName === "" || category === "" || releaseDate === "" || rating === "") {
alert("Please fill in all fields.");
return false;
}

if (parseFloat(rating) < 1 || parseFloat(rating) > 10) {
alert("Rating must be between 1 and 10.");
return false;
}

return true;
}

async function fetchMovieData() {
const movieName = document.getElementById("movie-name").value.trim();
if (movieName === "") return;

try {
const response = await fetch(`http://www.omdbapi.com/?t=${encodeURIComponent(movieName)}&apikey=YOUR_API_KEY`);
const data = await response.json();

if (data.Response === "True") {
document.getElementById("category").value = data.Genre || "";
document.getElementById("release-date").value = data.Released !== "N/A" ? new Date(data.Released).toISOString().split('T')[0] : "";
document.getElementById("rating").value = data.imdbRating !== "N/A" ? parseFloat(data.imdbRating) : "";
} else {
alert("Movie not found. Please try a different name.");
}
} catch (error) {
console.error("Error fetching movie data:", error);
alert("Error fetching movie data. Please enter details manually.");
}
}

// Color changing features
document.addEventListener('DOMContentLoaded', function() {
const textColorPicker = document.getElementById('text-color');
const bgColorPicker = document.getElementById('bg-color');
const outlineColorPicker = document.getElementById('outline-color');
const root = document.documentElement;

// Load saved colors from localStorage
const savedTextColor = localStorage.getItem('text-color') || '#333';
const savedBgColor = localStorage.getItem('bg-color') || '#f4f6f8';
const savedOutlineColor = localStorage.getItem('outline-color') || '#ccc';

textColorPicker.value = savedTextColor;
bgColorPicker.value = savedBgColor;
outlineColorPicker.value = savedOutlineColor;

changeTextColor(savedTextColor);
changeBgColor(savedBgColor);
changeOutlineColor(savedOutlineColor);

// Change colors on input
textColorPicker.addEventListener('input', function() {
const color = this.value;
changeTextColor(color);
localStorage.setItem('text-color', color);
});

bgColorPicker.addEventListener('input', function() {
const color = this.value;
changeBgColor(color);
localStorage.setItem('bg-color', color);
});

outlineColorPicker.addEventListener('input', function() {
const color = this.value;
changeOutlineColor(color);
localStorage.setItem('outline-color', color);
});

function changeTextColor(color) {
root.style.setProperty('--text-color', color);
}

function changeBgColor(color) {
root.style.setProperty('--bg-color', color);
}

function changeOutlineColor(color) {
root.style.setProperty('--outline-color', color);
}
});
