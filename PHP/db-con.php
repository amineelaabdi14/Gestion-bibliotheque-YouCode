<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youcode_library";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
    // echo'<p class="text-white">';
    // echo "Connected successfully";
    // echo '</p>';
}

       