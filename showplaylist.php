<html>
<head>
    <style>
        .playlist-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

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

        .movie-details {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Distribute items evenly */
        }

        .movie-card {
            width: calc(50% - 20px); /* Two items in a row with margin */
            margin-bottom: 20px;
            height:300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            display: flex;
            overflow: hidden; /* Hide overflowing content */
            cursor: pointer;
        }

        .movie-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .movie-card img {
            width: 60%; /* 60% width for the image */
            height: auto;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }

        .movie-card .details {
            width: 40%; /* 40% width for the content */
            padding: 10px;
            background-color: #fff; /* White background color */
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-size: 16px; /* Increase font size */
        }

        .movie-card .details h5 {
            margin-top: 0;
            font-size: 20px; /* Increase title font size */
        }

        .movie-card .details p {
            margin: 5px 0; /* Adjust paragraph margin */
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
// Include your database connection file
include "db.php";

// Retrieve email, visibility, and playlist_id parameters from the URL
$email = $_GET['email'];
$visibility = $_GET['visibility'];
$playlist_id = $_GET['playlist_id']; // Retrieve playlist_id from the URL

// Prepare and execute the query to fetch the playlist
$query = "SELECT * FROM playlists WHERE email = ? AND visibility = ? AND id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ssi", $email, $visibility, $playlist_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if a playlist with the provided email, visibility, and playlist_id exists and if visibility is public
if (mysqli_num_rows($result) > 0 && $visibility === 'public') {
    // Fetch and display the playlist
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2 class='playlist-name'>Playlist Name: " . $row['name'] . "</h2>";
        // Display other playlist details as needed

        // Fetch and display movie details from playlist_movies table
        $query_movies = "SELECT * FROM playlist_movies WHERE playlist_id = ?";
        $stmt_movies = mysqli_prepare($conn, $query_movies);
        mysqli_stmt_bind_param($stmt_movies, "i", $playlist_id);
        mysqli_stmt_execute($stmt_movies);
        $result_movies = mysqli_stmt_get_result($stmt_movies);

        echo "<div class='movie-details'>";
        while ($row_movie = mysqli_fetch_assoc($result_movies)) {
            echo "<div class='movie-card'>";
            echo "<img src='" . $row_movie['poster_url'] . "' alt='" . $row_movie['title'] . "'>";
            echo "<div class='details'>";
            echo "<h5 class='card-title'>" . $row_movie['title'] . "</h5>";
            echo "<p><strong>Actors:</strong> " . $row_movie['actors'] . "</p>";
            echo "<p><strong>Language:</strong> " . $row_movie['language'] . "</p>";
            echo "<p><strong>Director:</strong> " . $row_movie['director'] . "</p>";
            echo "<p><strong>Runtime:</strong> " . $row_movie['details'] . "</p>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }
} else {
    echo "<p class='no-playlist'>The playlist you're requesting is not made public by the author</p>";
}
?>
</body>
</html>
