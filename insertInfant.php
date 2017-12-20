<?php
include "dbconnection.php";
include 'sql.php';
$sql = new sql();
session_start();


if (isset($_POST['insertInfant'])) {

  $listInfants = $sql->listInfantsBasedOnUser($_SESSION['username']);


  if($listInfants[2] < 5){


      $birthday = new DateTime($_POST['infantbirthday']);
      $diff = $birthday->diff(new DateTime());
      $months = $diff->format('%m') + 12 * $diff->format('%y');

  if ($months <= 16) {

            $insertInfant = $sql->insertInfant($_POST['infantName'], $_POST['infantbirthday'], $_SESSION['username']);


            if ($insertInfant[0] == true) {
                  header("Location:index.php?page=addInfant&infant_ID=0&inserted=inserted");
            }else {
                  header("Location:index.php?page=addInfant&infant_ID=0&notinserted=notinserted");
             }

  }else {

           header("Location:index.php?page=addInfant&infant_ID=0&oldAge=oldAge");

  }

  }else{


         header("Location:index.php?page=addInfant&infant_ID=0&limitedNo=limitedNo");


  }




}






