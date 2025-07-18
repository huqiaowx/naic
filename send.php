<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "praktika";
$table = "feedback";

$connection = mysqli_connect($host, $user, $password, $database);
if (!$connection) die("Ошибка подключения к БД");

$name = mysqli_real_escape_string($connection, $_POST['sirname'] ?? '');
$email = mysqli_real_escape_string($connection, $_POST['email'] ?? '');
$msg = mysqli_real_escape_string($connection, $_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($msg)) {
    header("Location: error.html");
    exit();
}

$sql = "INSERT INTO `$table` (name, email, msg) VALUES ('$name', '$email', '$msg')";

if (mysqli_query($connection, $sql)) {
    header("Location: success.html");
    exit();
} else {
    header("Location: error.html");
    exit();
}

mysqli_close($connection);
?>