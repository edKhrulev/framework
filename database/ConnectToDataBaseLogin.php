<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 22.07.18
 * Time: 17:18
 */

$db_config = require_once('configs/db.php');
$link = mysqli_connect($db_config['host'], $db_config['user'], $db_config['password'], $db_config['db_name'])
or die(mysqli_error($link));

return $link;