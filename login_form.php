<?php
session_start();

include "html_header.php";
?>
    <div class="row col-12">
        <?php
        if (!empty($_SESSION['warning'])) {
            echo "<div  class=\"col-12 alert alert-warning\" role=\"alert\">" . $_SESSION['warning'] . "</div>";
            $_SESSION['warning'] = null;
        }
        ?>
    </div>
    <div class="col-12">
    <form action="login.php" method="POST">
        <div class="form-group row">
            <label for="login" class="col-sm-2 col-form-label">e-mail</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="login" name="login" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="pass" class="col-sm-2 col-form-label"> Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
        </div>
        <div class="mx-auto" style="width: 100px">
            <button type="submit" class="btn btn-lg btn-success"> Zaloguj</button>
        </div>
    </form>
    </div>
</div>
</body>
</html>

