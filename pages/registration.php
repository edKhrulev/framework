
<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 12.07.18
 * Time: 22:33
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/Helper.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/components/Authorize.php');
$link = require_once($_SERVER['DOCUMENT_ROOT'] . '/database/ConnectToDataBase.php');

session_start();

if (isset($_SESSION['login'])) {
    Helper::redirect('home');
}

if (isset($_POST['login']) && isset($_POST['pass']) && isset($_POST['passConfirm']) && isset($_POST['mail'])) {

    // get data
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $passConfirm = $_POST['passConfirm'];
    $mail = $_POST['mail'];

    // work with data
    $isUserRegistered = Authorize::checkUserRegistered($mail, $link);

    if ($isUserRegistered) {
         $emailMessage = "Пользователь с таким email существует, введите другой email!";
    } elseif ($pass == $passConfirm)  {
        $checkDbRequest = Authorize::saveNewUser($login, $mail, $pass, $link);
    } else {
        $failMessage = "Ошибка регистрации";
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
<a href="login.php">login</a>
<h1>Registration form</h1>


<?php if (isset($message)) { ?>
    <div class="alert alert-success" role="alert"><?php echo $message?></div>
<?php } ?>
<?php if (isset($failMessage)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $failMessage?></div>
<?php } ?>
<?php if (isset($emailMessage)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $emailMessage?></div>
<?php } ?>

<form action="registration.php" method="POST">
    <p>Your login<input type="text" name="login" value="<?php if(isset($login))echo $login ?>" required></p>
    <p>Your password<input type="password" name="pass" value="<?php if(isset($pass)) echo $pass?>" required></p>
    <p>Repeat password<input type="password" name="passConfirm" value="<?php if(isset($passConfirm)) echo $passConfirm?>" required></p>
    <p>Your email<input type="email" name="mail" value="<?php if(isset($mail)) echo $mail?>" required></p>
    <p><input type="submit" name="submit"></p>
</form>
</body>
</html>