<?php
    include "html_header.php";
?>

<?php
function mysql_fetch_all($res) {
   while($row=mysql_fetch_array($res)) {
       $return[] = $row;
   }
   return $return;
}
    $config = include "config.php";
    $handleSDB = @mysql_connect($config['DB_HOST'],
        $config['DB_USER'],
        $config['DB_PASS']);
    @mysql_select_db($config['DB_NAME'], $handleSDB);

    $table = 'product';

    $sql = 'SELECT * FROM '.$table;
    $result = mysql_query($sql);
    $products = mysql_fetch_all($result);
    var_dump($products);
?>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Opis</th>
                <th scope="col">Grafika</th>
            </tr>
            </thead>
            <tbody>
            <?php
           for ($i = 0; $i<count($products); $i++){
                $tr = "tr>
                <th scope=\"row\">$i</th>
                <td>$products[1]</td>
                <td>$products[2]</td>
                <td><img src=\"$products[3]\" alt=\"Brak zdjęcia\"></td>
                </tr>";
            }
            ?>
            </tbody>
        </table>
    </body>
</html>
