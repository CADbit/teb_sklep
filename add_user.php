<?php
include "html_header.php";
?>
    <a href="index.php"><-- Wstecz</a> <br><br>

<?php
if (isset($_POST['login'])){
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

    //Walidacja
    $sql = 'SELECT COUNT(`login`) FROM '.$table.' WHERE login = "'.$login.'"';
    $result = mysql_query($sql);

    if (mysql_fetch_array($result, MYSQL_NUM)[0] != "0") {
    //        mysql_close($handleSDB);
    //        die("W bazie już istnieje użytkownik o podanym loginie!");
    //        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo  '<h4 class="text-warning">W bazie już istnieje użytkownik o podanym loginie!</h4>';
    } else {
        $sql = 'INSERT INTO '.$table.' values(null, "'.$name.'","'.$surname.'","'.$login.'","'.$pass.'")';
        $result = mysql_query($sql) or die (mysql_error());
        echo '<h4 class="text-success">Dodano nowego użytkownika</h4>';
    }
    mysql_close($handleSDB);
}
?>
    </body>
</html>
