![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/c0db90e7-8a61-48ed-9d43-ba5ac8fcc8b7)# Movie Playlist Maker

## Description
Movie Playlist Maker is a web application that allows users to create and manage their own movie playlists. It utilizes the OMDB API to fetch movie details and stores user information, playlists, and movies in a MySQL database. The application is built with HTML, CSS, JavaScript, AJAX, jQuery, and PHP, and is hosted on the InfinityFree cloud platform.

Website Link hosted in infinity Free Cloud Hosting Platform 

**(Please Note that if have the website is showing like Dangerous Site, Go to Details->this unsafe site  The site will be visible**
http://movieplaylist.infinityfreeapp.com/fasal/index.php

**Set up the environment:**

Install XAMPP from Apache Friends.
Start Apache and MySQL from the XAMPP control panel.


**Database Setup:**

Open phpMyAdmin through the XAMPP control panel.
Create a new database named movies.
Import the movies.sql file from the database folder to set up the tables: user, playlists, and playlist_movies.

**Deploy the application:**

Place the project files in the htdocs directory of your XAMPP installation.
Access the application in your browser at http://localhost/index.php.

Usage
Sign Up/Login:
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/6099b988-ca25-44d5-89bd-87052ea6691e)
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/d2afa386-69d5-4676-b55a-2198e2ebf8cc)

Register a new user account or log in with existing credentials.
Create a Playlist:
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/cbde28c3-0d8f-4c8f-b9e6-4b073028c628)

![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/0216e6c6-25b4-4be6-8385-5a36a38fd49d)

Navigate to the playlist creation page and provide a name for your new playlist.
Add Movies:
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/9c494aa8-50e2-4219-8859-8478330c2c6d)


Use the search function to find movies via the OMDB API.
Add selected movies to your created playlists.
Manage Playlists:
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/da300330-ad05-4f43-88a3-43a7f016a641)

If the playlist is made Public anyone with the url can access them
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/b74de551-c137-43e7-ba89-322dd9e0a5f6)

Url pasted in different tab
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/5d3b046c-41e7-49f1-96c8-ec34ffb55458)

User can add Multiple Movies
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/1983e158-80e1-406f-9bbc-8e925dd2f1ef)

The Final Result after adding
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/27e5b44e-1d48-44ed-8bb9-fbe972e47615)

Movie details stored in Database (Email is the primary key which will act as a foreign key in all the tables) Playlist_id is primary key which will act as foreign key in playlist_movies table. 
![image](https://github.com/mdmaaz16/movieplaylist/assets/171310868/a7658340-fdf9-454b-acdd-072622a09da9)

**OMDB API Key:**
Obtain an API key from OMDB API.





