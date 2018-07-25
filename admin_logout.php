<?php
$_SESSION["login"]=false;
    if($_SESSION["login"]==false){
    header("Location: admin.php");
//   var_dump ($_SESSION["login"]);
    }