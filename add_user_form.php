<?php
    include "html_header.php";
?>
    <!-- Content here -->
    <a href="index.php"><-- Wstecz</a> <br><br>
    <form action="add_user.php" method="post">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Imię</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="surname" class="col-sm-2 col-form-label">Nazwisko</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="surname" name="surname">
            </div>
        </div>
        <div class="form-group row">
            <label for="login" class="col-sm-2 col-form-label">e-Mail</label>
            <div class="col-sm-4">
                <input type="email" class="form-control" id="login" name="login" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="pass" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="pass" name="pass" required>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-success">Zapisz</button>
    </form>
</div>
</body>
</html>