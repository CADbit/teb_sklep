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
    $products = [];
    while ($row = mysql_fetch_row($result)) {
        $products[] = $row;
    }
    mysql_close($handleSDB);
?>
        <h3>Lista produktów</h3>
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
            $tr = '';
            for ($i = 0; $i < count($products); $i++) {
                $tr .= "<tr>
                <th scope=\"row\">".($i+1)."</th>
                <td>".$products[$i][1]."</td>
                <td>".$products[$i][2]."</td>
                <td><img src=\"".$products[$i][3]."\" alt=\"Brak zdjęcia\"></td>
            </tr>";
            }
            echo($tr);
            ?>
            </tbody>
        </table>
    </body>
</html>
