<?php
include "db.php";
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home Page</title>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
$(function() {
    $('#home-link').click(function(e) {
        e.preventDefault();
        $('#home-content').show();
        $('#playlist-content').hide();
        $('#home-link').addClass('active');
        $('#show-playlist-link').removeClass('active');
    });

    $('#show-playlist-link').click(function(e) {
        e.preventDefault();
        $('#home-content').hide();
        $('#playlist-content').show();
        $('#show-playlist-link').addClass('active');
        $('#home-link').removeClass('active');
    });
});
</script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="styles.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<style>
body {
    background: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)),
        url('img1.jpg') left top no-repeat, 
        url('img2.jpg') center top no-repeat,
        url('img1.jpg') right top no-repeat;
    background-size: 33.33% 100%, 33.33% 100%, 33.33% 100%;
    background-attachment: fixed;
    color: #495057;
    font-family: 'Playfair Display', serif;
}

.form-control {
    border: 2px solid #ced4da;
    border-radius: 0.25rem;
    background-color: rgba(255, 255, 255, 0.8);
}

.btn-danger {
    border: 2px solid #dc3545;
}

.input-group {
    margin-bottom: 1rem;
}

h4, h6 {
    color: #333;
    margin-bottom: 1.5rem;
}

.navbar {
    background-color: rgba(244, 67, 54, 0.9);
    color: #fff; 
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
}

.nav-link {
    color: #fff;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #ffeb3b; 
}

.navbar-nav .nav-item:not(:last-child) {
    margin-right: 1rem; 
}

.navbar-nav .nav-link {
    padding: 0.5rem 1rem; 
}

.nav-link.active {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 0.25rem;
    color: grey;
}

.search-results {
    margin-top: 20px;
}

.playlist-card {
    margin-bottom: 1.5rem; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease; 
    background-color: rgba(255, 255, 255, 0.8); 
}

.playlist-card:hover {
    transform: translateY(-5px); 
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
}

.playlist-card .card-body {
    padding: 1.25rem; 
}

.playlist-card .card-title {
    font-size: 1.25rem;
    margin-bottom: 1rem; 
    color: #495057; 
}

.playlist-card .btn-block {
    background-color: rgba(244, 67, 54, 0.9); 
    border: none; 
    transition: background-color 0.3s ease;
    color: #fff;
}

.playlist-card .btn-block:hover {
    background-color: rgba(211, 47, 47, 0.9);
}

#playlist-content {
    padding-top: 2rem;
}

.movie-card {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.add-to-playlist {
    float: right;
}

.input-group input {
    border-radius: 0.25rem 0 0 0.25rem;
    border: 1px solid #ccc;
    padding: 0.5rem;
    transition: border-color 0.3s ease;
    background-color: rgba(255, 255, 255, 0.8);
}

.input-group input:focus {
    border-color: #f44336;
}

.input-group button {
    border-radius: 0 0.25rem 0.25rem 0;
    border: 1px solid #f44336;
    background-color: #f44336;
    color: #fff;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.input-group button:hover {
    background-color: #d32f2f;
    border-color: #d32f2f;
}

.btn-primary {
    background-color: #f44336;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #d32f2f;
}

.form-control {
    border-radius: 0.25rem;
    border: 1px solid #ccc;
    padding: 0.5rem;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #f44336;
}
body {
    background: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)),
        url('img1.jpg') left top no-repeat, 
        url('img2.jpg') center top no-repeat,
        url('img1.jpg') right top no-repeat;
    background-size: 33.33% 100%, 33.33% 100%, 33.33% 100%;
    background-attachment: fixed; 
    color: #495057;
    font-family: 'Playfair Display', serif;
}

.form-control {
    border: 2px solid #ced4da;
    border-radius: 0.25rem;
    background-color: rgba(255, 255, 255, 0.8);
}

.btn-danger {
    border: 2px solid #dc3545;
}

.input-group {
    margin-bottom: 1rem;
}

h4, h6 {
    color: #333;
    margin-bottom: 1.5rem;
}

.navbar {
    background-color: rgba(244, 67, 54, 0.9);
    color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
}

.nav-link {
    color: #fff;
    transition: color 0.3s ease;
}

.nav-link:hover {
    color: #ffeb3b;
}

.navbar-nav .nav-item:not(:last-child) {
    margin-right: 1rem;
}

.navbar-nav .nav-link {
    padding: 0.5rem 1rem;
}

.nav-link.active {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 0.25rem;
    color: grey;
}

.search-results {
    margin-top: 20px;
}

.playlist-card {
    margin-bottom: 1.5rem; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background-color: rgba(255, 255, 255, 0.8);
}

.playlist-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
}

.playlist-card .card-body {
    padding: 1.25rem; 
}

.playlist-card .card-title {
    font-size: 1.25rem; 
    margin-bottom: 1rem; 
    color: #495057; 
}

.playlist-card .btn-block {
    background-color: rgba(244, 67, 54, 0.9); 
    border: none; 
    transition: background-color 0.3s ease;
    color: #fff; 
}

.playlist-card .btn-block:hover {
    background-color: rgba(211, 47, 47, 0.9);
}

#playlist-content {
    padding-top: 2rem; 
}

.movie-card {
    margin-bottom: 20px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.add-to-playlist {
    float: right;
}

.input-group input {
    border-radius: 0.25rem 0 0 0.25rem;
    border: 1px solid #ccc;
    padding: 0.5rem;
    transition: border-color 0.3s ease;
    background-color: rgba(255, 255, 255, 0.8);
}

.input-group input:focus {
    border-color: #f44336;
}

.input-group button {
    border-radius: 0 0.25rem 0.25rem 0;
    border: 1px solid #f44336;
    background-color: #f44336;
    color: #fff;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.input-group button:hover {
    background-color: #d32f2f;
    border-color: #d32f2f;
}

.btn-primary {
    background-color: #f44336;
    border: none;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #d32f2f;
}

.form-control {
    border-radius: 0.25rem;
    border: 1px solid #ccc;
    padding: 0.5rem;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #f44336;
}
.f1{
    border: 1px solid black;
}


    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Movie Playlist</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" id="home-link">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="show-playlist-link">Show Playlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo $email; ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Home Content -->
<div class="container" id="home-content">
    <div class="container f1">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 class="mt-4">Search Movies</h4>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="movie" class="form-control" placeholder="Enter movie name" aria-label="Movie name" aria-describedby="button-addon2">
                        <button class="btn btn-danger" type="submit" id="button-addon2">Search movie</button>
                    </div>
                </form>
                <div class="search-results">
                    <?php
                    if (isset($_POST['movie'])) {
                        $movie = $_POST['movie'];
                        $apikey = "4f7229a0";
                        $url = "http://www.omdbapi.com/?apikey=" . $apikey . "&t=" . $movie;
                        $data = file_get_contents($url);
                        $movieDetails = json_decode($data, true);

                        if (isset($movieDetails['Title'])) {
                            echo '
                            <div class="card movie-card">
                                <div class="card-body">
                                    <h5 class="card-title">' . $movieDetails['Title'] . '</h5>
                                    <img src="' . $movieDetails['Poster'] . '" alt="' . $movieDetails['Title'] . '" class="img-fluid mb-2">
                                    <p class="card-text"><strong>Actors:</strong> ' . $movieDetails['Actors'] . '</p>
                                    <p class="card-text"><strong>Language:</strong> ' . $movieDetails['Language'] . '</p>
                                    <p class="card-text"><strong>Director:</strong> ' . $movieDetails['Director'] . '</p>
                                    <form method="post">
                                        <input type="hidden" name="movie_title" value="' . $movieDetails['Title'] . '">
                                        <input type="hidden" name="poster_url" value="' . $movieDetails['Poster'] . '">
                                        <input type="hidden" name="actors" value="' . $movieDetails['Actors'] . '">
                                        <input type="hidden" name="language" value="' . $movieDetails['Language'] . '">
                                        <input type="hidden" name="director" value="' . $movieDetails['Director'] . '">
                                        <p style="color: #f44336;"><b>To Add this movie go to the playlist in which you want to add</b></p>
                                    </form>
                                </div>
                            </div>
                            ';
                        } else {
                            echo '<p>No movie found.</p>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
   if(isset($_POST['create_playlist'])) {
    $playlist_name = $_POST['playlist_name'];
    $visibility = $_POST['visibility']; 

    $sql = "INSERT INTO playlists (name, email, visibility) VALUES ('$playlist_name', '$email', '$visibility')";
    $result = mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Playlist Created Successfully');</script>";
    } else {
        $error_message = mysqli_error($conn); 
        echo "<script>alert('Error Creating Playlist: $error_message');</script>"; // Display the error message in an alert box
    }
}
?>
    <div class="row mt-4 f2">
        <div class="col-md-6 offset-md-3">
            <h4>Create Playlist</h4>
            <form method="post">
                <div class="form-group">
                    <label for="playlist_name"><h5>Playlist Name</h5></label>
                    <input type="text" class="form-control" id="playlist_name" placeholder="Playlist Name" name="playlist_name" required>
                </div>
                <div class="form-group">
                <label for="visibility"><b>Visibility</b></label>
                <select class="form-control" id="visibility" name="visibility" required>
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </div>
                <button type="submit" class="btn btn-primary" name="create_playlist">Create Playlist</button>
            
            </form>
        </div>
    </div>
</div>

<!-- Playlist Content -->
<div class="container" id="playlist-content" style="display: none;">
    <h4>Your Playlists</h4>
    <div class="row">
        <?php
        $sql = "SELECT * FROM playlists WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-md-4">';
                echo '<div class="card playlist-card">';
                echo '<div class="card-body">';
                echo '<b><h5 class="card-title">' . $row['name'] . '</h5></b>';
                $playlistImageUrl = 'img1.jpg';
                echo '<img src="' . $playlistImageUrl . '" alt="' . $row['name'] . '" class="img-fluid mb-2">';

                
                echo '<form method="GET" action="add_movie.php">';
                echo '<input type="hidden" name="playlist_id" value="' . $row['id'] . '">';
                echo '<button type="submit" class="btn btn-primary btn-block">Open Playlist</button>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No playlists found.</p>';
        }
        ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
