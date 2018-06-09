<?php
session_start();

if ($_SESSION['login'] == false && $_SESSION['admin'] == true) {
    header ('Location:index.php');
}

include "html_header.php";
?>

<form action="add_product.php" method="POST">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label"> Nazwa produktu</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
    </div>
        <div class="form-group row">
        <label for="desc" class="col-sm-2 col-form-label"> Opis</label>
        <div class="col-sm-10">
            <textarea rows="10" class="form-control" id="desc" name="desc" required> </textarea>
        </div>
    </div>
        <div class="form-group row">
        <label for="url" class="col-sm-2 col-form-label"> Adres url</label>
        <div class="col-sm-10">
            <input type="url" class="form-control" id="url" name="url" required>
        </div>
    </div>
        <div class="mx-auto" style="width: 100px">
            <button type="submit" class="btn btn-lg btn-success"> Zapisz</button>
        </div>   
</form>
</body>
</html>
