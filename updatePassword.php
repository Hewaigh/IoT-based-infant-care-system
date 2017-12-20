<?php 

session_start();
include 'dbconnection.php';
include 'sql.php';
$sql = new sql();





if (isset($_POST['changePassword'])) {





  $changePassword = $sql->getLogin($_SESSION['username'], $_POST['oldPassword']);

  if ($changePassword[2] > 0) {







    $updatedPassword = $sql->updatePassword($_POST['newPassword'], $_SESSION['username']);

    if ($updatedPassword[0] == true) {


      header("Location:index.php?page=userAccount&infant_ID=0&changed=changed");


    } else {


      header("Location:index.php?page=userAccount&infant_ID=0&notchanged=notchanged");

    }


  } else {



    header("Location:index.php?page=userAccount&infant_ID=0&wrongOldPassword=wrongOldPassword");


  }







}


 