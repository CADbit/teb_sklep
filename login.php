
<?php
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
        header ('Location:add_product_form.php');
    } else {
        echo '<h4 class="text-warning">Błędny login lub hasło.</h4>';
    }
    mysql_close($handleSDB);
}
?>