<?php
session_start();
if ($_SESSION ['login'] == false && $_SESSION['admin'] == true) {
    header ('Location:index.php');  
}
    include "html_header.php";
?>
<?php
if (isset($_POST['name'])) {
    $config = include "config.php";
    $handleSDB = @mysql_connect ($config['DB_HOST'],
                                 $config['DB_USER'],
                                 $config['DB_PASS']);
    @mysql_select_db($config['DB_NAME'], $handleSDB);
    $table = 'product';
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $url = $_POST['url'];
    
    $sql = 'SELECT COUNT(`name`) FROM ' .$table.' WHERE name = "'.$name.'"';
    $result = mysql_query($sql);
    
    if (mysql_fetch_array($result,MYSQL_NUM)[0] !="0") {
       $_SESSION['error'] = 'W bazie już istnieje ten produkt!';
    } else {    
       $sql = 'INSERT INTO '.$table.' values(null,"'.$name.'","'.$desc.'","'.$url.'")';
       $result = mysql_query($sql) or die(mysql_error());
       $_SESSION['msg'] = 'Dodano nowy produkt';
    }
    mysql_close ($handleSDB);

}
 header ('Location:show_products.php');
?>
    </body>
</html>

   