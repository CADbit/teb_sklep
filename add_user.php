<?php
/**
 * Created by PhpStorm.
 * User: Michał Kazula
 * Date: 2018-05-26
 * Time: 11:58
 */

if (isset($_POST['login'])) {
    $config = include "config.php";
    $handleSDB = @mysql_connect($config['DB_HOST'],
        $config['DB_USER'],
        $config['DB_PASS']);
    @mysql_select_db($config['DB_NAME'], $handleSDB);
    $table = 'users';
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $sql = 'INSERT INTO '.$table.' values(null, "'.$name.'", "'.$surname.'", "'.$login.'", "'.$pass.'")';
    $result = mysql_query($sql) or die(mysql_error());
    mysql_close($handleSDB);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TEB - sklep</title>
</head>
<body>
    <a href="index.html"><-- Wstecz</a> <br><br>
    <h3>Dodano nowego użytkownika</h3>
</body>
</html>
