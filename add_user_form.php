<?php
include "html_header.php";
?>
<body>
<div class="container" style="margin-top: 10px;">


<form>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Imię</label>
    <div class="col-sm-10">
      <input type="text"  class="form-control" id="name" placeholder="name" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="surname" class="col-sm-2 col-form-label">Nazwisko</label>
    <div class="col-sm-10">
     <input type="text" class="form-control" id="surname" placeholder="surname" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="login" class="col-sm-2 col-form-label">e-mail</label>
    <div class="col-sm-10">
     <input type="email"  class="form-control" id="login" placeholder="login" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="pass" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="pass" placeholder="pass" required>
    </div>
  </div>
    <div class="mx-auto" style="width: 100px;">
<button type="submit" class="btn btn-lg  btn-success" >Zapisz</button>
</div>
      
</form>
       
    </body>
</html>