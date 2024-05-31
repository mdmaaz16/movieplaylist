<?php
include "db.php"; 

$sql = "SELECT * FROM playlists WHERE user_email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<p>' . $row['name'] . '</p>';
    }
} else {
    echo '<p>No playlists found.</p>';
}
?>
