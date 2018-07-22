<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 16.07.18
 * Time: 23:55
 */
require_once ('Helper.php');

class Authorize {

    public static function logOut() {
        session_start();
        session_destroy();
        Helper::redirect('login');
    }

    public static function checkUserRegistered($mail, $link) {
        $query = "SELECT * FROM users WHERE email = '$mail'";
        $result = mysqli_query($link, $query) or die (mysqli_error($link));
        if ( mysqli_num_rows($result)) {
            return true;
        } else {
            return false;
        }
    }

    public static function saveNewUser($login, $mail, $pass, $link) {

        $message = "Ошибка регистрации";

        $passEncode = md5($pass);
        $query = "INSERT INTO users (login, password,  email) VALUES ('$login', '$passEncode', '$mail')";
        $result = mysqli_query($link, $query) or die (mysqli_error($link));

        if ($result) {
            $message = "Регистрация прошла успешно";
            $_SESSION['login'] = $login;
            Helper::redirect('home');
        }

        return $message;
    }
}