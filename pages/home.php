<?php

require_once('components/Helper.php');

session_start();

if (isset($_SESSION['login'])) {
    var_dump($_SESSION['login']);
} else {
    Helper::redirect('login');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <p><a href="logOut.php">Log out</a></p>

    <h1>home-page</h1>
    <p>Welcome</p>
</body>

