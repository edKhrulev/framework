<?php

//Устанавливаем доступы к базе данных:
//$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
//$user = 'root'; //имя пользователя, по умолчанию это root
//$password = '123321'; //пароль, по умолчанию пустой
//$db_name = 'myBase'; //имя базы данных
//
//$link = mysqli_connect($host, $user, $password, $db_name);
//
//$selectDb = mysqli_select_db( $link, 'users' );


$dataBase = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '123321',
    'db_name' => 'myBase'
];

return $dataBase;

