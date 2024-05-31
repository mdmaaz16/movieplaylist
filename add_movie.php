<?php
include "db.php";
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
$playlist_id = $_GET['playlist_id'];

$movieDetails = [];
$query = "SELECT email, visibility FROM playlists WHERE id = '$playlist_id'";
$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $visibility = $row['visibility'];
} else {
    die('Error fetching data: ' . mysqli_error($conn));
}

if (isset($_POST['movie'])) {
    $movie = $_POST['movie'];
    $apikey = "4f7229a0";
    $url = "http://www.omdbapi.com/?apikey=" . $apikey . "&t=" . $movie;
    $data = file_get_contents($url);
    $movieDetails = json_decode($data, true);
}

if (isset($_POST['add_to_playlist'])) {
    $title = $_POST['title'];
    $poster = $_POST['poster'];
    $actors = $_POST['actors'];
    $language = $_POST['language'];
    $director = $_POST['director'];
    $details = $_POST['details'];
    $email = $_SESSION['email'];

    $sql = "INSERT INTO playlist_movies (playlist_id, title, poster_url, actors, language, director, details, email) VALUES ('$playlist_id', '$title', '$poster', '$actors', '$language', '$director', '$details', '$email')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<script>alert('Movie added to playlist successfully');</script>";
    } else {
        echo "Error adding movie to playlist: " . mysqli_error($conn);
    }
}

// Retrieve existing movies in the playlist
$existingMovies = [];
$sql = "SELECT * FROM playlist_movies WHERE playlist_id = '$playlist_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $existingMovies[] = $row;
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Movie to Playlist</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles1.css">
<script>
        function generateURL(playlist_id) {
        var email = "<?php echo $email; ?>";
        var visibility = "<?php echo $visibility; ?>";
        var url = "http://localhost/fasal/showplaylist.php?email=" + encodeURIComponent(email) + "&visibility=" + encodeURIComponent(visibility) + "&playlist_id=" + encodeURIComponent(playlist_id);
        document.getElementById('generatedURL').innerHTML = url;
        generatedURL.style.display = 'block';
}



function copyToClipboard() {
    var url = "http://localhost/fasal/showplaylist.php?email=" + encodeURIComponent("<?php echo $email; ?>") + "&visibility=" + encodeURIComponent("<?php echo $visibility; ?>") + "&playlist_id=" + encodeURIComponent(<?php echo $playlist_id; ?>);
    var tempInput = document.createElement("input");
    tempInput.value = url;
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("URL copied to clipboard: " + tempInput.value);
    var generatedURL = document.getElementById('generatedURL');
    generatedURL.style.display = 'none'; // Hide the URL box
}

    </script>
    <style>
body {
    background: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), /* Light background color with less opacity */
        url('img1.jpg') left top no-repeat, 
        url('img2.jpg') center top no-repeat,
        url('img1.jpg') right top no-repeat; /* Add img2.jpg to the center */
    background-size: 33.33% 100%, 33.33% 100%, 33.33% 100%; /* Size of each background layer */
    background-attachment: fixed; /* Keep the background fixed */
    color: #495057; /* Text color */
    font-family: 'Playfair Display', serif; /* Use the font */
}


.card {
    border: 1px solid transparent; /* Removed black color border */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added box shadow */
}
/* Add hover effect to movie details */
.c1 {
    /* padding: 20px; */
    cursor: pointer;
}
.c1:hover {
    background-color: rgba(0, 0, 0, 0.05); /* Light grey background color on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow on hover */
    transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
}

.movie-card img {
    width: 250px; /* Set a constant width */
    height: 350px; /* Set a constant height */
    object-fit: cover; /* Ensure the image covers the entire container */
    border-radius: 10px 0 0 10px;
}

</style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Add Movies to the Playlist</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a> <!-- Link to the home page -->
                </li>
                <li class="nav-item">
                    <span class="nav-link"><?php echo $email; ?></span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</nav>

<div class="container">
    <?php if (!empty($existingMovies)): ?>
        <div class="mb-4">
            <h4>Existing Movies in Playlist</h4>
            <button onclick="generateURL(<?php echo $playlist_id; ?>)" class="btn btn-primary">Generate URL</button>
            <p id="generatedURL"></p>
            <button onclick="copyToClipboard()" class="btn btn-secondary">Copy URL</button>  <br><br>
            <div class="row">
                <?php foreach ($existingMovies as $index => $movie): ?>
                    <?php if ($index % 2 === 0): ?>
                        </div><div class="row">
                    <?php endif; ?>
                    <div class="col-md-6 c1">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-7">
                                    <img src="<?php echo $movie['poster_url']; ?>" alt="<?php echo $movie['title']; ?>" class="card-img">
                                </div>
                                <div class="col-md-5">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $movie['title']; ?></h5>
                                        <p class="card-text"><strong>Actors:</strong> <?php echo $movie['actors']; ?></p>
                                        <p class="card-text"><strong>Language:</strong> <?php echo $movie['language']; ?></p>
                                        <p class="card-text"><strong>Director:</strong> <?php echo $movie['director']; ?></p>
                                        <p class="card-text"><strong>Runtime:</strong> <?php echo $movie['details']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>


<form method="post">
<div class="input-group mb-3">
<input type="text" name="movie" class="form-control" placeholder="Enter movie name" aria-label="Movie name" aria-describedby="button-addon2">
<div class="input-group-append">
<button class="btn btn-danger" type="submit" id="button-addon2">Search movie</button>
</div>
</div>
</form>

<div class="search-results">
<?php if (!empty($movieDetails) && isset($movieDetails['Title'])): ?>
<div class="card movie-card">
<div class="card-body">
<h5 class="card-title">Movie Name: <?php echo $movieDetails['Title']; ?></h5>
<img src="<?php echo $movieDetails['Poster']; ?>" alt="<?php echo $movieDetails['Title']; ?>" class="img-fluid mb-2" style="border-radius: 10px; float: left;">
<div class="details">
<p><strong>Actors:</strong> <?php echo $movieDetails['Actors']; ?><br>
<strong>Language:</strong> <?php echo $movieDetails['Language']; ?><br>
<strong>Director:</strong> <?php echo $movieDetails['Director']; ?><br>
<strong>Runtime:</strong> <?php echo $movieDetails['Runtime']; ?></p>
<form method="post">
    <input type="hidden" name="title" value="<?php echo $movieDetails['Title']; ?>">
    <input type="hidden" name="poster" value="<?php echo $movieDetails['Poster']; ?>">
    <input type="hidden" name="actors" value="<?php echo $movieDetails['Actors']; ?>">
    <input type="hidden" name="language" value="<?php echo $movieDetails['Language']; ?>">
    <input type="hidden" name="director" value="<?php echo $movieDetails['Director']; ?>">
    <input type="hidden" name="details" value="<?php echo $movieDetails['Runtime']; ?>">
    <button class="btn btn-primary" type="submit" name="add_to_playlist">Add to Playlist</button>
</form>
</div>
</div>
</div>
<?php endif; ?>
</div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
