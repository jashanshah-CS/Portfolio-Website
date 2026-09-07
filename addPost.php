<?php
session_start();

require_once 'config.php';

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Database Connection Failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $connection->real_escape_string($_POST["title"]);
    $body = $connection->real_escape_string($_POST["content"]);
    $sql = "INSERT INTO BLOG_POSTS(title , body , created_at) VALUES('$title' , '$body' , NOW())";
    if ($connection->query($sql) === TRUE) {
        echo "<h1> Registration Successful </h1>";
    } else {
        echo "<h1> Error in Registration </h1>";
    }
} else {

}
$connection->close();
header('Location:viewBlog.php');
?>