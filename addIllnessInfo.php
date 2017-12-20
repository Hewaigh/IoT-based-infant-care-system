<?php
include "dbconnection.php";

include "sql.php";

$sql = new sql();

if (isset($_POST['addMed'])) {


	// check for non expired ones
  $checkUnExpiredOne = $sql->UnExpiredMed($_POST['productID'], 1);


  if ($checkUnExpiredOne[2] < 1) {




    $insertMed = $sql->insertMed($_POST['LiqLevel'], $_POST['MPD'], $_POST['Morning'], $_POST['Afternoon'], $_POST['Night'], null, $_POST['productID'], $_POST['infant_ID'], 1);



    if ($insertMed[0] == true) {



      $infantID = $_POST['infant_ID'];
      header("Location:index.php?page=illness&medInserted&infant_ID=$infantID");

    } else {




      $infantID = $_POST['infant_ID'];
      header("Location:index.php?page=illness&medNotInserted&infant_ID=$infantID");




    }

  } else {


    $infantID = $_POST['infant_ID'];
    header("Location:index.php?page=illness&UnExpired&infant_ID=$infantID");



  }



}