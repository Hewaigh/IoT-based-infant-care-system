<?php
include "dbconnection.php";
include 'sql.php';
session_start();
$sql = new sql();

if (isset($_POST['deleteAccount'])) {



  $deleteAccount = $sql->deleteAccount($_SESSION['username']);


  if ($deleteAccount[0] == true) {

    unset($_SESSION['username']);
    session_destroy();
    header("Location:login.php?accountDeleted=accountDeleted");


  } else {


    header("Location:index.php?page=deleteAccount&notDeleted=notDeleted");

  }


}