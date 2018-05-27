<?php
    include "html_header.php";
?>
<a href="add_product_form.php"><-- Wstecz</a> <br><br>
<?php
if (isset($_POST['name'])) {
    $config = include "config.php";
    $handleSDB = @mysql_connect ($config['DB_HOST'],
                                 $config['DB_USER'],
                                 $config['DB_PASS']);
    @mysql_select_db($config['DB_NAME'], $handleSDB);
    $table = 'produkt';
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $url = $_POST['url'];
    
    $sql = 'SELECT COUNT(`name`) FROM ' .$table.' WHERE name = "'.$name.'"';
    $result = mysql_query($sql);
    
    if (mysql_fetch_array($result,MYSQL_NUM)[0] !="0") {
       echo '<h4 class="text-warning">W bazie już istnieje ten produkt!</h4> ';
    } else {    
       $sql = 'INSERT INTO '.$table.' values(null,"'.$name.'","'.$desc.'","'.$url.'")';
       $result = mysql_query($sql) or die(mysql_error());
       echo '<h4 class="text-succes">Dodano nowy produkt</h4>';
    }
    mysql_close ($handleSDB);

}

?>
    </body>
</html>

   