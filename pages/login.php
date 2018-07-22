<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 14.07.18
 * Time: 14:50
 */

require_once($_SERVER['DOCUMENT_ROOT'] . '/components/Helper.php');
$link = require_once($_SERVER['DOCUMENT_ROOT'] . '/database/ConnectToDataBase.php');

session_start();

if (isset($_SESSION['login'])) {
    Helper::redirect('home');
}

$select_db = mysqli_select_db( $link, 'users');

if (isset($_REQUEST['login']) and isset($_REQUEST['pass'])) {

    $username = $_REQUEST['login'];
    $password = $_REQUEST['pass'];
    $passEncode = md5($password);
var_dump(22);
    $query = "SELECT * FROM users WHERE login = '$username' AND password = '$passEncode'";

    $result = mysqli_query($link, $query) or die (mysqli_error($link));
    $user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив

    $count = mysqli_num_rows($result);

    if ($count == 1) {

        $_SESSION['login'] = $username;
        Helper::redirect('home');

    } else {

        $failMessage = 'Ошибка';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p><a href="registration.php">Registration</a></p>
<h1>Login</h1>

<form action="login.php" method="POST">
    <p>Your login<input type="text" name="login"></p>
    <p>Your password<input type="password" name="pass"></p>
    <p><input type="submit" name="submit"></p>

<!--    <p><a href="logOut.php">Log out</a></p>-->
    <?php if (isset($failMessage)) { ?>
        <div class="alert alert-danger" role="alert"><?php echo $failMessage?></div>
    <?php } ?>
</form>
</body>
</html>