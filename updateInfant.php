<?php 

include 'dbconnection.php';
include 'sql.php';
$sql = new sql();


if (isset($_POST['update'])) {
  $infant_ID = $_POST['infantID'];

  $updateInfant = $sql->updateInfant($_POST['infantName'], $_POST['infantbirthday'], $_POST['infantID']);

  if ($updateInfant[0] == true) {
    header("Location:index.php?page=editInfant&updated=updated&infant_ID=$infant_ID");
  } else {
    header("Location:index.php?page=editInfant&notupdated=notupdated&infant_ID=$infant_ID");
  }

}