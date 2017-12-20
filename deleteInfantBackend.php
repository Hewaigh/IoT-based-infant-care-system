<?php 
  //include 'dbconnection.php';
 // include 'sql.php';
$sql = new sql();






$CheckInfantAssignment = $sql->CheckInfantAssignment($_GET['infant_ID'], $_SESSION['username']);


if($CheckInfantAssignment[1] > 0){



    $infant_ID = $_GET['infant_ID'];
    header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&infantIsAssigned");


    


}
else{



$deleteInfant = $sql->deleteInfant($_GET['infant_ID']);



if ($deleteInfant[0] == true) {

  header("Location:index.php?page=home&infant_ID=0&infantIsDeleted");


} else {


    $infant_ID = $_GET['infant_ID'];
    header("Location:index.php?page=infantAccount&infant_ID=$infant_ID&infantNotDeleted");

 

}


	
}



