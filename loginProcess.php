<?php
session_start();
require_once 'config.php';

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Database Connection Failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $connection->real_escape_string($_POST["email"]);
    $password = $connection->real_escape_string($_POST["password"]);
    $sql = "SELECT ID FROM LOGIN_INFO WHERE email = '$email' AND password = '$password'";
    $result = $connection->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION["UserId"] = $row['ID'];
    } else {
        header('Location:login.php?error');
    }
}
$connection->close();
if (isset($_SESSION["UserId"])) {

    header('Location:viewBlog.php');
}
?>