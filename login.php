<?php
session_start();
include "html_header.php";

if (isset($_POST['login'])){
    $config = include "config.php";
    $handleSDB = @mysql_connect($config['DB_HOST'],
                                $config['DB_USER'],
                                $config['DB_PASS']);
    @mysql_select_db($config['DB_NAME'], $handleSDB);
    $table = 'users';
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $sql = 'SELECT * FROM '.$table.' WHERE login = "'.$login.'"';  
    $result = mysql_query($sql);
    $user = mysql_fetch_array($result, MYSQL_ASSOC);
    if ($user['login'] == $login && $user['pass'] == $pass) {
        mysql_close ($handleSDB);
        $_SESSION['login'] = true;
        $_SESSION['admin'] = $user['admin'];
        header ('Location:show_products.php');
    } else {
        $_SESSION['login'] = false;
        $_SESSION['warning'] = 'Błędny login lub hasło';
        header ('Location:login_form.php');
    }
    mysql_close($handleSDB);
}
?>
        </div>
    </body>
</html>