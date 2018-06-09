<?php

session_start();

//$_SESSION['login'] = false;
//unset($_SESSION);
session_destroy();

header ('Location:index.php');

?>