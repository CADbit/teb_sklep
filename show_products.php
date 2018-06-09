<?php
session_start();
if ($_SESSION ['login'] == false) {
    header ('Location:index.php');  
}
if (isset($_GET['add'])) {
   if(isset($_SESSION['shop'])) {
       $arr =  $_SESSION['shop'];
   }
    $arr[] = ['product_id' => $_GET['add'], 'qty' => 1];
    $_SESSION ['shop'] = $arr;
}
    include "html_header.php";
    
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
    $products = [];
    while ($row = mysql_fetch_row($result)) {
        $products[] = $row;
    }
    mysql_close($handleSDB);
?>
    <div class="row">
        <?php
             if (!empty($_SESSION['msg'])){
             echo "<div class=\"col-12 alert alert-success role=alert\">".$_SESSION['msg']."</div>";
             $_SESSION['msg'] = null;
            }
             if (!empty($_SESSION['error'])){
             echo "<div class=\"col-12 alert alert-danger role=alert\">".$_SESSION['error']."</div>";
             $_SESSION['error'] = null;
            }
        ?>
    </div>
        <div class="row">
            <div class="col-sm-8">
                <?php
                if($_SESSION['admin'] == true) {
                    echo "<a href ='add_product_form.php' class = 'btn btn-success'>Dodaj nowy produkt<a>";
                }
                ?>
            </div>
            
            <div class="col-sm-4" style=" text-align: right;">
                <?php
                if (isset($_SESSION['shop']) && count($_SESSION['shop']) != 0) {
                    echo "<i class=\"fas fa-cart-arrow-down\">koszykpełny</i>";
                    echo "(".count($_SESSION['shop']).")";
                } else {
                    echo "<i class=\"fas fa-shopping-cart\">koszykpusty</i>";
                }
                ?>
                <a href="logout.php" class=" btn btn-danger">Wyloguj</a></div>
        </div>
        <h3>Lista produktów</h3>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Opis</th>
                <th scope="col">Grafika</th>
                <th scope="col">Opcje</th>
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
                <td><a href='?add=".$products[$i][0]."'><i class=\"fas fa-cart-plus\"></i>Koszyk</a></td>
            </tr>";
            }
            echo($tr);
            ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
