<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 16.07.18
 * Time: 23:20
 */

class Helper {


    public static function redirect($path) {

        header("location: $path.php");
        exit();

    }

}