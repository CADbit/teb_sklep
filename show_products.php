<?php
    include "html_header.php";
?>

<?php
    $config = include "config.php";
    $handleSDB = @mysql_connect($config['DB_HOST'],
        $config['DB_USER'],
        $config['DB_PASS']);
    @mysql_select_db($config['DB_NAME'], $handleSDB);

    $table = 'product';

    $sql = 'SELECT * FROM '.$table;
    $result = mysql_query($sql);
    $products = mysql_fetch_array($result, MYSQL_ASSOC);

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
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <?php
            for ($i = 0; $i <= count($products); $i++) {
                $tr = "tr>
                <th scope=\"row\">($i+1)</th>
                <td>$products[$i]['name']</td>
                <td>$products[$i]['desc']</td>
                <td><img src=\"$products[$i]['url']\" alt=\"Brak zdjęcia\"></td>
            </tr>";
            }
            ?>
            </tbody>
        </table>
    </body>
</html>
