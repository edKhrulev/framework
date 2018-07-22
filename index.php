<?php

/**
 * Router
 *
 * command: php -S localhost:9090 index.php
 */

$currentRoute = $_SERVER['REQUEST_URI'];
var_dump($currentRoute);

switch ($currentRoute) {
    case '/registration.php':
        require_once('pages/registration.php');
        die;
    case '/login.php':
        require_once('pages/login.php');
        die;
    case '/home.php':
        require_once('pages/home.php');
        die;
    case '/logOut.php':
        require_once('pages/logOut.php');
        die;
    default:
        require_once('pages/404.php');
        die;
}